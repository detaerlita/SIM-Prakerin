<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pem_join', '', TRUE);
    }

    public function index()
    {
        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit(){
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

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
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('admin');
        }
    }

    public function tambah_peserta(){
        $data['title'] = 'Tambah Peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('mulai', 'Tanggal mulai', 'required');
        $this->form_validation->set_rules('akhir', 'Tanggal akhir', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('password1', 'Confirm New Password', 'required|trim|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_peserta', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'image' => "default.jpg",
            'role_id' => 2
            ];
            $this->db->insert('user', $data);            

            $dataa = [
            'id_username' => $this->db->insert_id(),
            'tanggal_pelaksanaan' => $this->input->post('mulai'),
            'tanggal_berakhir' => $this->input->post('akhir')
            ];
            $this->db->insert('peserta', $dataa);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil tambah peserta</div>');
            redirect('admin/tambah_peserta');
        }
    }

    public function view_peserta(){
        $data['title'] = 'Daftar peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->all_peserta();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view_peserta', $data);
        $this->load->view('templates/footer');
    }

        public function edit_peserta(){
        $data['title'] = 'Edit peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->peserta($this->input->get('email'));

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_peserta', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $id = $this->input->post('id');
            $awal = $this->input->post('mulai');
            $akhir = $this->input->post('akhir');

            $this->db->set('u.name', $name);
            $this->db->where('u.email', $email);
            $this->db->update('user as u');

            $this->db->set('p.tanggal_berakhir', $awal);
            $this->db->set('p.tanggal_pelaksanaan', $akhir);
            $this->db->where('p.id_username', $id);
            $this->db->update('peserta as p');            

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil berubah</div>');
            redirect('admin/view_peserta');
        }
    }

    public function view_pembimbing(){
        $data['title'] = 'Daftar pembimbing';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->all_pembimbing();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/view_pembimbing', $data);
        $this->load->view('templates/footer');
    }

    public function delete(){
        $id = $this->uri->segment(3);
        if ($this->uri->segment(4) == "view_peserta") {
            $this->db->delete('user', array('id' => $id));
            $this->db->delete('peserta', array('id_username' => $id));
            redirect('admin/view_peserta');
            } else{
            $this->db->delete('user', array('id' => $id));
            $this->db->delete('pembimbing', array('id_username_pembimbing' => $id));
            redirect('admin/view_pembimbing');
        }
        
        
    }


    public function tambah_pembimbing(){
        $data['title'] = 'Tambah Pembimbing';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('password1', 'Confirm New Password', 'required|trim|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_pembimbing', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'image' => "default.jpg",
            'role_id' => 3
            ];
            $this->db->insert('user', $data);            

            $dataa = [
            'id_username_pembimbing' => $this->db->insert_id()
            ];
            $this->db->insert('pembimbing', $dataa);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil tambah pembimbing</div>');
            redirect('admin/tambah_pembimbing');
        }
    }
}
