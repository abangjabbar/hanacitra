<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasinya sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {

                    $role = '';

                    if ($user['role_id'] == 1) {
                        $role = 'admin';
                    } else if ($user['role_id'] == 2) {
                        $role = 'administrator';
                    } else if ($user['role_id'] == 3) {
                        $role = 'produksi';
                    } else  if ($user['role_id'] == 4) {
                        $role = 'sales';
                    } else if ($user['role_id'] == 5) {
                        $role = 'manager';
                    } else {
                        $role = 'client';
                    }
                    $user['role'] = $role;
                    $data = [
                        'user' => $user
                    ];
                    $this->session->set_userdata($data);
                    redirect($role);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum diaktifasi!
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar
            </div>');
            redirect('auth');
        }
    }



    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah pernah didaftarkan!'
        ]);
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu singkat'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'telp' => htmlspecialchars($this->input->post('telp', true)),
                'company_name' => htmlspecialchars($this->input->post('company_name', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 6,
                'is_active' => 0,
                'date_created' => time()
            ];

            //token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun anda sudah dibuat. Tolong aktivasi akun anda terlebih dahulu melalui email
            </div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'jakasyarif13o@gmail.com',
            'smtp_pass' => 'yftkkhfooyhfzghc',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('jakasyarif13o@gmail.com', 'Hana Citra Buana');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . site_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . site_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    ' . $email . ' telah diaktivasi! Tolong Login!
                    </div>');
                    redirect('auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi akun gagal! Token telah expired.
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi akun gagal! Token salah.
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi akun gagal! Email salah.
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('filter');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Log out
            </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Tolong cek email anda untuk mengatur ulang password!
                </div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum terdaftar atau belum aktif
                </div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Atur ulang password gagal! Token salah
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Atur ulang password gagal! Email salah
            </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubang Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password berhasil diubah! Tolong login
            </div>');
            redirect('auth');
        }
    }
}
