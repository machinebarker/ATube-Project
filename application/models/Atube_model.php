<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atube_model extends CI_Model
{
    public function insert_user()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)),
            'date_created' => date('F d, Y'),
            'user_url' => $this->input->post('user_url'),
            'image' => 'default.jpg'
        ];
        $this->db->insert('user', $data);
    }

    public function addVideo($videos, $user)
    {
        $data = [
            'video' => $videos,
            'title' => htmlspecialchars($this->input->post('title')),
            'uploader_name' => $user['username'],
            'uploader_image' => $user['image'],
            'upload_date' => date('F d, Y'),
            'views' => 0,
            'video_url' => $this->input->post('video_url'),
            'thumbnail' => $this->input->post('thumbnail'),
            'hashtags' => $this->input->post('hashtags')
        ];
        $this->db->insert('video', $data);
    }

    public function addMusic($musics, $user)
    {
        $data = [
            'music' => $musics,
            'title' => htmlspecialchars($this->input->post('title')),
            'album' => htmlspecialchars($this->input->post('album')),
            'cover' => htmlspecialchars($this->input->post('cover')),
            'artist' => htmlspecialchars($this->input->post('artist')),
            'hashtags' => htmlspecialchars($this->input->post('hashtags')),
            'uploader_name' => $user['username'],
            'uploader_image' => $user['image'],
            'upload_date' => date('F d, Y'),
            'music_url' => $this->input->post('music_url')
        ];
        $this->db->insert('music', $data);
    }

    public function randomVideo($video)
    {
        $this->db->limit(8, 0);
        $this->db->order_by("RAND ()");
        return $this->db->get_where('video', ['hashtags' => $video['hashtags']])->result_array();
    }

    public function getMusic()
    {
        $this->db->limit(8, 0);
        $this->db->order_by("RAND ()");
        return $this->db->get('music')->result_array();
    }
}
