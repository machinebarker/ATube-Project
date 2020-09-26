<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atube extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Atube_model', 'atube');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['videos'] = $this->db->order_by('id', 'DESC')->get('video')->result_array();
        $data['title'] = 'Atube';

        $this->load->view('layout/header', $data);
        $this->load->view('view/index', $data);
        $this->load->view('layout/footer');
    }

    public function watch($video_url = null)
    {
        if (count($this->uri->segment_array()) > 3) {
            redirect('atube');
        }

        if (!isset($video_url)) {
            redirect('atube');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['video'] = $this->db->get_where('video', ['video_url' => $video_url])->row_array();
        $data['random'] = $this->atube->randomVideo($data['video']);
        $data['title'] = $data['video']['title'];
        $this->load->view('layout/header', $data);
        $this->load->view('view/watch');
        $this->load->view('layout/footer');
    }

    public function hashtags($hashtags = null)
    {
        if (count($this->uri->segment_array()) > 3) {
            redirect('atube');
        }

        if (!isset($hashtags)) {
            redirect('atube');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['hashtags'] = $this->db->order_by('id', 'DESC')->get_where('video', ['hashtags' => $hashtags])->result_array();
        $data['hashtag'] = $this->db->get_where('video', ['hashtags' => $hashtags])->row_array();
        $data['title'] = 'Atube';
        $this->load->view('layout/header', $data);
        $this->load->view('view/hashtags', $data);
        $this->load->view('layout/footer');
    }

    public function music()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['category'] = $this->db->order_by("rand ()")->get('music_category')->result_array();
        $data['title'] = 'Atube Music';
        $this->load->view('layout/header', $data);
        $this->load->view('view/music', $data);
        $this->load->view('layout/footer');
    }

    public function musics($category = null)
    {
        if (count($this->uri->segment_array()) > 3) {
            redirect('atube');
        }

        if (!isset($category)) {
            redirect('atube/music');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['playlist'] = $this->db->get_where('music_category', ['category' => $category])->row_array();
        $data['songs'] = $this->db->order_by("RAND ()")->get_where('music', ['hashtags' => $category])->result_array();
        $data['countSong'] = $this->db->get_where('music', ['hashtags' => $category])->num_rows();
        $data['title'] = $data['playlist']['slug'] . ' Playlist';
        $this->load->view('layout/header', $data);
        $this->load->view('view/musics', $data);
        $this->load->view('layout/footer');
    }

    public function play($hashtags = null, $music_url = null)
    {
        if (count($this->uri->segment_array()) > 4) {
            redirect('atube');
        }

        if (!isset($music_url)) {
            redirect('atube/music');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['song'] = $this->db->get_where('music', ['music_url' => $music_url])->row_array();
        $data['next'] = $this->db->order_by("rand ()")->get('music')->row_array();
        $data['songs'] = $this->atube->getMusic();
        $data['title'] = $data['song']['title'];
        $this->load->view('layout/header', $data);
        $this->load->view('view/play_music', $data);
        $this->load->view('layout/footer');
    }
}
