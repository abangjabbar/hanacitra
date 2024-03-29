<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Multipleupload_model');
        $this->load->model('Order_model');
        $this->load->model("subkualitas_model");
        $this->load->model("Pesanan_model");
        $this->load->model("Sales_model");
        $this->load->model("Barang_model");
        $this->load->model("Notifikasi_model");
        $this->load->helper('tgl_indo');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->session->userdata('user');

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/index.php', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function profil()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->session->userdata('user');

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/profil.php', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function editProfil()
    {
        $data['title'] = 'Sunting Profil';
        $data['user'] = $this->session->userdata('user');

        $user = $data['user'];

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

            $user['name'] = $name;
            $user['telp'] = $telp;
            $user['company_name'] = $company_name;
            $user['alamat'] = $alamat;
            if (isset($new_image)) {
                $user['image'] = $new_image;
            }
            $this->session->set_userdata('user', $user);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil anda sudah diperbarui
            </div>');
            redirect('client/profil');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->session->userdata('user');

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
                    $this->db->where('email', $this->session->userdata('user')['email']);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah
                    </div>');
                    redirect('manager');
                }
            }
        }
    }

    public function multipleUpload()
    {
        $data['title'] = 'Multiple upload';
        $data['groupImage'] = $this->Multipleupload_model->getDataGroup();

        $data['user'] = $this->session->userdata('user');

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

        $data['user'] = $this->session->userdata('user');

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/multipleupload_detail', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function tambahOrder()
    {
        $data['title'] = 'Tambah Order';

        $data['user'] = $this->session->userdata('user');


        $order = array(
            'user_id' => $data['user']['id'],
            'order_nomor' => $this->Order_model->nomor_order(),
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman'),
            'tgl_order' => $this->input->post('tgl_order'),
            'tgl_pengiriman' => $this->input->post('tgl_pengiriman'),
            'status' => "Menunggu Submit"
        );
        $this->db->insert('order', $order);

        $orderId = $this->db->insert_id();

        redirect('client/order/' . $orderId);
    }


    public function order($orderId)
    {
        $data['title'] = 'Order';

        $data['user'] = $this->session->userdata('user');
        $data['order'] = $this->Order_model->getOrder($orderId);
        $data['barang'] = $this->Barang_model->getBarang($data['order'][0]->id);
        $data['history'] = $this->Sales_model->get_history($orderId);

        $status = null;
        if ($data['order'] == false) {
            $status = "Silahkan untuk membuat pesanan terlebih dahulu";
        } else {
            switch ($data['order'][0]->status) {
                case "Menunggu Submit": {
                        $status = "Silahkan selesaikan order anda, agar kami bisa proses";
                        break;
                    }
                case "Menunggu Konfirmasi Admin": {
                        $status = "Silahkan tunggu konfirmasi dari admin, untuk mendapatkan informasi harga dari order anda";
                        break;
                    }
                case "Menunggu Submit Revisi": {
                        $status = "Order ditolak, silahkan perbaiki order anda, agar kami bisa proses";
                        break;
                    }
                case "Order Berhasil, Menunggu Bukti Pembayaran": {
                        $status = "Silahkan melakukan pembayaran,<br>lalu unggah bukti pembayaran dan surat purchase order anda";
                        break;
                    }
                case "Menunggu Konfirmasi Pembayaran Dari Admin": {
                        $status = "Mohon tunggu konfrimasi pembayaran dari admin, sebelum order diproses";
                        break;
                    }
                case "Pembayaran Terkonfirmasi": {
                        $status = "Pembayaran anda sudah terkonfirmasi, order akan segera diproses";
                        break;
                    }
                case "Order Sedang Diproses": {
                        $status = "Order anda sedang kami proses";
                        break;
                    }
                case "Order Dikirim": {
                        $status = "Order anda sedang dalam proses pengiriman";
                        break;
                    }
            }
        }
        $data['status'] = $status;

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/order_view.php', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function updateOrder()
    {
        $this->Order_model->proses_edit_order($this->input);
    }

    public function submitOrder()
    {
        $data['user'] = $this->session->userdata('user');

        $this->Order_model->submit_order($data['user']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Order Berhasil Ditambahkan
                    </div>');
        redirect('client/daftarpesanan');
    }

    public function daftarPesanan()
    {
        $data['title'] = 'Daftar Transaksi';

        $data['user'] = $this->session->userdata('user');

        if ($this->input->post('updateFilter') == true) {
            $filter = array(
                'order_nomor' => $this->input->post('order_nomor'),
                'status' => $this->input->post('status')
            );
            $this->session->set_userdata('filter', $filter);
        }
        if ($this->session->userdata('filter') != null) {
            $data['filter'] = $this->session->userdata('filter');
        } else {
            $filter = array(
                'order_nomor' => null,
                'status' => ''
            );
            $data['filter'] = $filter;
        }
        //konfigurasi pagination
        $config['base_url'] = base_url('client/daftarPesanan'); //site url
        $config['total_rows'] = $this->Order_model->countall($this->session->userdata('filter'), $data['user']['id']); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['order'] = $this->Order_model->getOrderList($config["per_page"], $data['page'], $this->session->userdata('filter'), $data['user']['id']);

        $data['pagination'] = $this->pagination->create_links();

        $barang = [];
        $harga = [];
        $status = [];

        if ($data['order'] == false) {
            $status = "Belum pernah bertransaksi";
        } else {
            foreach ($data['order'] as $order) {
                $barang[$order->id] = $this->Barang_model->getBarang($order->id);
                $harga[$order->id] = $this->Order_model->getOrder($order->id);
                $currentStatus = null;
                switch ($order->status) {
                    case 'Menunggu Submit': {
                            $currentStatus = "Silahkan selesaikan pesanan anda, agar kami bisa proses";
                            break;
                        }
                    case 'Menunggu Konfirmasi Admin': {
                            $currentStatus = "Silahkan tunggu konfirmasi dari admin untuk mendapatkan informasi harga dari order anda";
                            break;
                        }
                    case 'Menunggu Submit Revisi': {
                            $currentStatus = "Order ditolak, silahkan perbaiki order anda, agar kami bisa proses";
                            break;
                        }
                    case "Order Berhasil, Menunggu Bukti Pembayaran": {
                            $currentStatus = "Silahkan melakukan pembayaran,<br>lalu unggah bukti pembayaran dan surat purchase order anda";
                            break;
                        }
                    case 'Menunggu Konfirmasi Pembayaran Dari Admin': {
                            $currentStatus = "Mohon tunggu konfrimasi pembayaran dari admin, sebelum order diproses";
                            break;
                        }
                    case 'Pembayaran Terkonfirmasi': {
                            $currentStatus = "Pembayaran anda sudah terkonfirmasi, order akan segera diproses";
                            break;
                        }
                    case 'Order Sedang Diproses': {
                            $currentStatus = "Order anda sedang kami proses";
                            break;
                        }
                    case 'Order Dikirim': {
                            $currentStatus = "Order anda sedang dalam proses pengiriman";
                            break;
                        }
                }
                $status[$order->id] = $currentStatus;
            }
        }

        $data['barang'] = $barang;
        $data['harga'] = $harga;

        $data['status'] = $status;

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/daftar_pesanan', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function tambahBarang($orderId)
    {
        $data['title'] = 'Tambah Barang';

        $data['groupImage'] = $this->Multipleupload_model->getDataGroup();
        $data['kualitas'] = $this->subkualitas_model->fetch_kualitas();

        $data['user'] = $this->session->userdata('user');
        $data['orderId'] = $orderId;

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang', 'required');
        $this->form_validation->set_rules('lebar', 'Lebar', 'required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('kualitas', 'Material', 'required');
        $this->form_validation->set_rules('subkualitas', 'Material', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required');
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('image', 'Document', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/client_header', $data);
            $this->load->view('client/barang_tambah', $data);
            $this->load->view('templates/client_footer', $data);
        } else {
            //validasinya sukses
            $this->db->trans_start();

            $barang = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'panjang' => $this->input->post('panjang'),
                'lebar' => $this->input->post('lebar'),
                'tinggi' => $this->input->post('tinggi'),
                'kualitas' => ($this->input->post('kualitas')),
                'subkualitas' => ($this->input->post('subkualitas')),
                'deskripsi' => ($this->input->post('deskripsi')),
                'kuantitas' => ($this->input->post('kuantitas')),
                'order_id' => $orderId,
            );
            $this->db->insert('barang', $barang);

            $barang_id = $this->db->insert_id();

            $upload = $_FILES['image']['name'];
            if ($upload) {
                $numberOfFiles = sizeof($upload);
                $files = $_FILES['image'];
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '3000';
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
                        $insert[$i]['barang_id'] = $barang_id;
                        $insert[$i]['image'] = $imageName;
                        $insert[$i]['group_image'] = $groupImage;
                        $insert[$i]['date_created'] = time();
                    }
                }
                if (isset($insert)) {
                    $this->Multipleupload_model->upload($insert, $data['file_name']);
                }
            }

            $this->db->trans_complete();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Barang Berhasil Ditambahkan
                    </div>');
            redirect('client/order/' . $orderId);
        }
    }

    public function editBarang($barangId)
    {
        $data['title'] = 'Detail Harga Transaksi';
        $data['user'] = $this->session->userdata('user');

        $data['barang'] = $this->Barang_model->get_id_barang($barangId);
        $data['kualitas'] = $this->subkualitas_model->fetch_kualitas();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/barang_edit', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function proses_edit_barang()
    {
        $this->db->trans_start();

        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'panjang' => $this->input->post('panjang'),
            'lebar' => $this->input->post('lebar'),
            'tinggi' => $this->input->post('tinggi'),
            'kualitas' => ($this->input->post('kualitas')),
            'subkualitas' => ($this->input->post('subkualitas')),
            'deskripsi' => ($this->input->post('deskripsi')),
            'kuantitas' => ($this->input->post('kuantitas')),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('barang', $data);

        $this->Multipleupload_model->delete($this->input->post('id'));

        $barang_id = $this->input->post('id');

        $upload = $_FILES['image']['name'];
        if ($upload) {
            $numberOfFiles = sizeof($upload);
            $files = $_FILES['image'];
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '3000';
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
                    $insert[$i]['barang_id'] = $barang_id;
                    $insert[$i]['image'] = $imageName;
                    $insert[$i]['group_image'] = $groupImage;
                    $insert[$i]['date_created'] = time();
                }
            }
            if (isset($insert)) {
                $this->Multipleupload_model->upload($insert, $data['file_name']);
            }
        }

        $this->db->trans_complete();
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil diubah');</script>";
        }
        echo "<script>window.location='" . site_url('client/order/' . $this->input->post('order_id')) . "';</script>";
    }

    public function hapusBarang()
    {
        $barangId = $this->input->post('id');
        $this->Barang_model->hapus_barang($barangId);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('client/order/' . $this->input->post('order_id')) . "';</script>";
    }

    public function detailDesain($barangId)
    {
        $data['title'] = 'Detail Harga Transaksi';
        $data['user'] = $this->session->userdata('user');

        $data['barang'] = $this->Barang_model->get_id_barang($barangId);
        $data['images'] = $this->Barang_model->getDataImage($barangId);

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/detail_desain', $data);
        $this->load->view('templates/client_footer', $data);
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

        $data['user'] = $this->session->userdata('user');

        $data['groupImage'] = $this->Multipleupload_model->getDAtaGroup();
        $data['box'] = $this->db->get('jenis_box')->result_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/menu_produk', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function uploadPO()
    {
        $user = $this->session->userdata('user');
        $status = "Menunggu Konfirmasi Pembayaran Dari Admin";

        $this->db->trans_start();

        $upload = $_FILES['image']['name'];
        if ($upload) {
            $numberOfFiles = sizeof($upload);
            $files = $_FILES['image'];
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '3000';
            $config['upload_path'] = './assets/po_client/';
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
                    $cek = $this->Order_model->cekData();
                    if (!$cek) {
                        $groupImage = 1;
                    } else {
                        $groupImage = $cek['group_image'] + 1;
                    }
                    $insert[$i]['order_id'] = $this->input->post('order_id');
                    $insert[$i]['image'] = $imageName;
                    $insert[$i]['group_image'] = $groupImage;
                    $insert[$i]['date_created'] = time();
                }
            }
            $this->Order_model->upload($insert, $data['file_name']) > 0;
        }

        $this->db->set('status', $status);
        $this->db->where('id', $this->input->post('order_id'));
        $this->db->update('order');

        $notifikasi = array(
            'order_id' => $this->input->post('order_id'),
            'executor' =>  $user['id'],
            'recipient_role_id' =>  4,
            'status' => $status
        );
        $this->db->insert('notifikasi', $notifikasi);

        $this->db->trans_complete();
        redirect('client/daftarPesanan');
    }

    public function queryNotif()
    {
        $data['user'] = $this->session->userdata('user');

        echo json_encode($this->Notifikasi_model->query_notif($data['user']));
    }

    public function deleteNotif()
    {
        $orderId = $this->input->post('id');

        $this->Notifikasi_model->hapus_notif($orderId);
    }

    public function invoice($id)
    {
        $data['title'] = 'INVOICE';

        $data['user'] = $this->session->userdata('user');
        $this->load->view('templates/client_header', $data);
        $this->load->view('client/invoice_view', $data);
        $this->load->view('templates/client_footer', $data);
    }
}
