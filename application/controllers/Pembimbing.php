<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembimbing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
         $this->load->model('Pem_join', '', TRUE);
    }

    public function index()
    {
        $data['title'] = 'Pembimbing';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->duaTable($this->session->userdata('email'));
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembimbing/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit(){
        $data['title'] = 'Ubah Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->duaTable($this->session->userdata('email'));
        
        $this->form_validation->set_rules('nonik', 'Nomer Induk', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tlp', 'Nomor telp', 'required');

        if ($this->form_validation->run() == false) {            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembimbing/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('nama');
            $email = $this->input->post('email');
            $id = $this->input->post('id');
            $tempat_lahir = $this->input->post('tempat');
            $tanggal_lahir = $this->input->post('tgl');
            $nomor_induk = $this->input->post('nonik');
            $agama = $this->input->post('agama');
            $alamat_rumah = $this->input->post('alamat');
            $no_telp = $this->input->post('tlp');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('u.image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('u.name', $name);
            $this->db->where('u.email', $email);
            $this->db->update('user as u');

            $this->db->set('p.tempat_lahir', $tempat_lahir);
            $this->db->set('p.tanggal_lahir', $tanggal_lahir);
            $this->db->set('p.nomor_induk', $nomor_induk);
            $this->db->set('p.agama', $agama);
            $this->db->set('p.alamat_rumah', $alamat_rumah);
            $this->db->set('p.no_telp', $no_telp);
            $this->db->where('p.id_username_pembimbing', $id);

            $this->db->update('pembimbing as p');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil diperbarui</div>');
            redirect('pembimbing');
        }
        
    }

    function log(){
        $data['title'] = 'Log Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['log_data'] = $this->db->query('SELECT periksa_log_harian.id_periksa,periksa_log_harian.id_peserta,periksa_log_harian.tanggal,periksa_log_harian.deskripsi,periksa_log_harian.file_download, user.id,user.name FROM periksa_log_harian INNER JOIN user ON periksa_log_harian.id_peserta=user.id ')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('log/index', $data);
        $this->load->view('templates/footer');
    }

     function pdf(){
        $data['asd']= $this->db->get_where('periksa_log_harian', ['id_periksa' => $this->uri->segment(3)])->row_array();
        $this->load->view('log/pdf',$data);
    }
}
