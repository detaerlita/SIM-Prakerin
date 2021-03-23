<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pem_join', '', TRUE);
    }

    public function index()
    {
        $data['title'] = 'Peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->peserta($this->session->userdata('email'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

        public function log()
    {
        $data['title'] = 'Log harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->peserta($this->session->userdata('email'));

        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('des', 'des', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('log/log', $data);
            $this->load->view('templates/footer');
        } else {

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|DOC|DOCX';
                $config['max_size']      = '30000';
                $config['upload_path'] = './assets/file/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/file/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

             $data = [
                'id_peserta' => $this->input->post('id'),
                'tanggal' => $this->input->post('tgl'),
                'deskripsi' => $this->input->post('des'),
                'file_download' => $new_image
                ];
                $this->db->insert('periksa_log_harian', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil upload!</div>');
                redirect('user');

        }
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->Pem_join->peserta($this->session->userdata('email'));

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('nonik', 'Nomor Induk', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required');
        $this->form_validation->set_rules('alamat_kos', 'Alamat kos', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('nama');
            $email = $this->input->post('email');
            $id = $this->input->post('id');
            $tempat = $this->input->post('tempat');
            $tgl_lhr = $this->input->post('tgl_lhr');
            $sekolah = $this->input->post('sekolah');
            $jurusan = $this->input->post('jurusan');
            $kelas = $this->input->post('kelas');
            $agama = $this->input->post('agama');
            $alamat_sekolah = $this->input->post('alamat_sekolah');
            $alamat_rumah = $this->input->post('alamat_rumah');
            $nomor = $this->input->post('nomor');
            $alamat_kos = $this->input->post('alamat_kos');
            $nonik = $this->input->post('nonik');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '30000';
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

            $this->db->set('p.asal_sekolah', $sekolah);
            $this->db->set('p.jurusan', $jurusan);
            $this->db->set('p.nomor_induk', $nonik);
            $this->db->set('p.agama', $agama);
            $this->db->set('p.alamat_sekolah', $alamat_sekolah);
            $this->db->set('p.alamat_rumah', $alamat_rumah);
            $this->db->set('p.no_telp', $nomor);
            $this->db->set('p.alamat_kos', $alamat_kos);
            $this->db->set('p.tanggal_lahir', $tgl_lhr);
            $this->db->set('p.kelas', $kelas);
            $this->db->where('p.id_username', $id);
            $this->db->update('peserta as p');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diperbarui</div>');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
