<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Multipleupload_model');
        $this->load->model("subkualitas_model");
        $this->load->model("Pesanan_model");
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/index.php', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function profil()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/profil.php', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function editProfil()
    {
        $data['title'] = 'Sunting Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/client_header', $data);
            $this->load->view('client/edit_profil.php', $data);
            $this->load->view('templates/client_footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $telp = $this->input->post('telp');
            $company_name = $this->input->post('company_name');
            $alamat = $this->input->post('alamat');

            // cek kalo ada gambar yg diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('telp', $telp);
            $this->db->set('company_name', $company_name);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil anda sudah diperbarui
            </div>');
            redirect('client/profil');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Sekarang', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('manager/changepassword', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password sekarang salah!
                </div>');
                redirect('manager/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan yang sebelumnya! 
                    </div>');
                    redirect('manager/changepassword');
                } else {
                    //password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah
                    </div>');
                    redirect('manager');
                }
            }
        }
    }

    public function cetakCustom()
    {
        $data['title'] = 'Cetak Custom';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('projek_pesanan', 'Nama Jenis Box', 'required|trim');
        $this->form_validation->set_rules('jenis_box', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('spesifikasi', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('jumlah_pesanan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('alamat_pengiriman', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/clientt_header', $data);
            $this->load->view('client/cetak_custom.php', $data);
            $this->load->view('templates/clientt_footer', $data);
        } else {
            $projek_pesanan = $this->input->post('projek_pesanan');
            $jenis_box = $this->input->post('jenis_box');
            $spesifikasi = $this->input->post('spesifikasi');
            $jumlah_pesanan = $this->input->post('jumlah_pesanan');
            $alamat_pengiriman = $this->input->post('alamat_pengiriman');

            // cek kalo ada gambar yg diupload
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/drawing_client/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('projek_pesanan', $projek_pesanan);
            $this->db->set('jenis_box', $jenis_box);
            $this->db->set('spesifikasi', $spesifikasi);
            $this->db->set('jumlah_pesanan', $jumlah_pesanan);
            $this->db->set('alamat_pengiriman', $alamat_pengiriman);
            $this->db->insert('pesanan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pesanan berhasil dibuat
            </div>');
            redirect('client/cetakCustom');
        }
    }

    public function multipleUpload()
    {
        $data['title'] = 'Multiple upload';
        $data['groupImage'] = $this->Multipleupload_model->getDAtaGroup();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/multipleupload_view', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function upload()
    {
        $upload = $_FILES['image']['name'];
        if ($upload) {
            $numberOfFiles = sizeof($upload);
            $files = $_FILES['image'];
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/drawing_client/';
            $this->load->library('upload', $config);

            for ($i = 0; $i < $numberOfFiles; $i++) {
                $_FILES['image']['name'] = $files['name'][$i];
                $_FILES['image']['type'] = $files['type'][$i];
                $_FILES['image']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['image']['error'] = $files['error'][$i];
                $_FILES['image']['size'] = $files['size'][$i];

                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $data = $this->upload->data();
                    $imageName = $data['file_name'];
                    $cek = $this->Multipleupload_model->cekData();
                    if (!$cek) {
                        $groupImage = 1;
                    } else {
                        $groupImage = $cek['group_image'] + 1;
                    }
                    $insert[$i]['image'] = $imageName;
                    $insert[$i]['group_image'] = $groupImage;
                    $insert[$i]['date_created'] = time();
                }
            }
            if (!$insert && !$data) {
                $this->session->set_flashdata('status', 'tidak ada data yang tersimpan');
                redirect('client/multipleupload');
            } else {
                if ($this->Multipleupload_model->upload($insert, $data['file_name']) > 0) {
                    $this->session->set_flashdata('status', 'data berhasil disimpan');
                    redirect('client/multipleupload');
                } else {
                    $this->session->set_flashdata('status', 'error data tidak berhasil terupload');
                    redirect('client/multipleupload');
                }
            }
        }
    }

    public function detail($group)
    {
        $data['title'] = 'Group Image';
        $data['images'] = $this->Multipleupload_model->getDataImage($group);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/multipleupload_detail', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function multiplesave()
    {
        $data['title'] = 'Multiple save';

        $data['groupImage'] = $this->Multipleupload_model->getDataGroup();
        $data['kualitas'] = $this->subkualitas_model->fetch_kualitas();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        var_dump($data['user']);

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang', 'required');
        $this->form_validation->set_rules('lebar', 'Lebar', 'required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('kualitas', 'Material', 'required');
        $this->form_validation->set_rules('subkualitas', 'Material', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required');
        $this->form_validation->set_rules('alamat_pengiriman', 'Alamat Tujuan Pengriman', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/client_header', $data);
            $this->load->view('client/multiplesave_view', $data);
            $this->load->view('templates/client_footer', $data);
        } else {
            //validasinya sukses
            $this->db->trans_start();

            $pesanan = array(
                'user_id' => $data['user']['id'],
                'nama_barang' => $this->input->post('nama_barang'),
                'panjang' => $this->input->post('panjang'),
                'lebar' => $this->input->post('lebar'),
                'tinggi' => $this->input->post('tinggi'),
                'kualitas' => ($this->input->post('kualitas')),
                'subkualitas' => ($this->input->post('subkualitas')),
                'deskripsi' => ($this->input->post('deskripsi')),
                'kuantitas' => ($this->input->post('kuantitas')),
                'alamat_pengiriman' => ($this->input->post('alamat_pengiriman')),
                'po_tgl' => ($this->input->post('po_tgl')),
                'deliv_tgl' => ($this->input->post('deliv_tgl')),
                'status' => 0,
            );
            $this->db->insert('pesanan', $pesanan);

            $id_pesanan = $this->db->insert_id();

            $upload = $_FILES['image']['name'];
            if ($upload) {
                $numberOfFiles = sizeof($upload);
                $files = $_FILES['image'];
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/drawing_client/';
                $this->load->library('upload', $config);

                for ($i = 0; $i < $numberOfFiles; $i++) {
                    $_FILES['image']['name'] = $files['name'][$i];
                    $_FILES['image']['type'] = $files['type'][$i];
                    $_FILES['image']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['image']['error'] = $files['error'][$i];
                    $_FILES['image']['size'] = $files['size'][$i];

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('image')) {
                        $data = $this->upload->data();
                        $imageName = $data['file_name'];
                        $cek = $this->Multipleupload_model->cekData();
                        if (!$cek) {
                            $groupImage = 1;
                        } else {
                            $groupImage = $cek['group_image'] + 1;
                        }
                        $insert[$i]['id_pesanan'] = $id_pesanan;
                        $insert[$i]['image'] = $imageName;
                        $insert[$i]['group_image'] = $groupImage;
                        $insert[$i]['date_created'] = time();
                    }
                }
                $this->Multipleupload_model->upload($insert, $data['file_name']) > 0;
            }

            $transaksi = [
                'id_pesanan' => $id_pesanan
            ];
            $this->db->insert('transaksi', $transaksi);

            $poImage = [
                'pesanan_id' => $id_pesanan
            ];
            $this->db->insert('po_image', $poImage);

            $buktiTf = [
                'pesanan_id' => $id_pesanan
            ];
            $this->db->insert('bukti_tf', $buktiTf);

            $this->db->trans_complete();
            $this->session->set_flashdata('status', 'data berhasil disimpan');
            redirect('client/daftarPesanan');
        }
    }
    public function fetch_subkualitas()
    {
        if ($this->input->post('id_kualitas')) {
            echo $this->subkualitas_model->fetch_subkualitas($this->input->post('id_kualitas'));
        }
    }

    public function menuProduk()
    {
        $data['title'] = 'Produk';

        $data['groupImage'] = $this->Multipleupload_model->getDAtaGroup();

        $data['box'] = $this->db->get('jenis_box')->result_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/menu_produk', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function daftarPesanan()
    {
        $data['title'] = 'Daftar Transaksi';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->get_kualitas(FALSE, $data['user']['id']);

        $status = null;
        if ($data['pesanan'] == false) {
            $status = "Silahkan untuk membuat pesanan terlebih dahulu";
        } else {
            switch ($data['pesanan'][0]->status) {
                case 0: {
                        $status = "Menunggu Input Harga";
                        break;
                    }
                case 1: {
                        $status = "Menunggu Pembayaran";
                        break;
                    }
                case 2: {
                        $status = "Menunggu Konfirmasi";
                        break;
                    }
            }
        }
        $data['status'] = $status;

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/daftar_pesanan', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function detailPesanan($id)
    {
        $data['title'] = 'Detail Pesanan';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Pesanan_model->detail_pesanan($id);
        $data['images'] = $this->Pesanan_model->getDataImage($id);
        $status = null;
        switch ($data['pesanan'][0]->status) {
            case 0: {
                    $status = "Menunggu Input Harga";
                    break;
                }
            case 1: {
                    $status = "Menunggu Pembayaran";
                    break;
                }
            case 2: {
                    $status = "Menunggu konfirmasi dari admin. Setelah terkonfirmasi, pesanan anda segera diproses";
                    break;
                }
        }
        $data['status'] = $status;
        $this->load->view('templates/client_header', $data);
        $this->load->view('client/detail_pesanan', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function uploadPO()
    {
        $idPesanan =  $this->input->post('pesanan_id');
        // cek kalo ada gambar yg diupload
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|pdf|xls';
            $config['max_size'] = '10000';
            $config['upload_path'] = './assets/po_client/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('pesanan_id', $idPesanan);
        $this->db->update('po_image');

        $this->db->set('status', 2);
        $this->db->where('id', $idPesanan);
        $this->db->update('pesanan');
        redirect('client/daftarPesanan');
    }

    public function uploadBuktiTf()
    {
        $idPesanan =  $this->input->post('pesanan_id');
        // cek kalo ada gambar yg diupload
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|pdf|xls';
            $config['max_size'] = '10000';
            $config['upload_path'] = './assets/bukti_tf/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('pesanan_id', $idPesanan);
        $this->db->update('bukti_tf');

        $this->db->set('status', 2);
        $this->db->where('id', $idPesanan);
        $this->db->update('pesanan');
        redirect('client/daftarPesanan');
    }
}
