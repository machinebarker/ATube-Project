<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uploader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Atube_model', 'atube');
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['videos'] = $this->db->order_by('id', 'DESC')->get_where('video', ['uploader_name' => $data['user']['username']])->result_array();
        $data['title'] = 'Upload Video';
        $this->load->view('layout/header', $data);
        $this->load->view('view/uploader', $data);
        $this->load->view('layout/footer');
    }

    public function upload()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Upload Video';

        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('thumbnail', 'thumbnail', 'required|trim');
        $this->form_validation->set_rules('hashtags', 'hashtags', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('view/upload', $data);
            $this->load->view('layout/footer');
        } else {
            $upload_file = $_FILES['video']['name'];
            if ($upload_file) {
                $config['allowed_types'] = '*';
                $config['max_size'] = '200048';
                $config['encrypt_name'] = true;
                $config['upload_path'] = './assets/video/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('video')) {
                    $video = $this->upload->data();
                    $videos = $video['file_name'];

                    $this->atube->addVideo($videos, $user);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Your video has been uploaded.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                    redirect('uploader');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }

    public function upload_music()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Upload Music';

        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('cover', 'cover url', 'required|trim');
        $this->form_validation->set_rules('artist', 'artist', 'required|trim');
        $this->form_validation->set_rules('album', 'album', 'required|trim');
        $this->form_validation->set_rules('hashtags', 'hashtags', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('view/upload_music', $data);
            $this->load->view('layout/footer');
        } else {
            $upload_file = $_FILES['music']['name'];
            if ($upload_file) {
                $config['allowed_types'] = '*';
                $config['max_size'] = '100048';
                $config['encrypt_name'] = true;
                $config['upload_path'] = './assets/music/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('music')) {
                    $music = $this->upload->data();
                    $musics = $music['file_name'];

                    $this->atube->addMusic($musics, $user);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Your music has been uploaded.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                    redirect('uploader');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }

    public function manage_video()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['videos'] = $this->db->get('video')->result_array();
        $data['title'] = 'Manage Uploaded Files';
        $this->load->view('layout/header', $data);
        $this->load->view('view/manage', $data);
        $this->load->view('layout/footer');
    }

    public function manage_music()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['music'] = $this->db->get('music')->result_array();
        $data['title'] = 'Manage Uploaded Song';
        $this->load->view('layout/header', $data);
        $this->load->view('view/manage_music', $data);
        $this->load->view('layout/footer');
    }
}
