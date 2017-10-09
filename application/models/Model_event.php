<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_event extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_listevent() {
        $sql = "select * from event WHERE id_bahasa = '" . $this->session->userdata('site_lang') . "' ORDER BY waktu DESC LIMIT 20 ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_news($id, $id_bahasa = "EN") {
        $sql = "select * from event WHERE id_bahasa= '" . $id_bahasa . "' and id_event='" . $id . "' ";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function update_event($data, $image, $id_bahasa)
    {
        $waktu  = explode(" - ", $data['waktu']);
        $update = array(
            'judul'=>$data['judul'],
            'ringkasan'=>$data['ringkasan'],
            'isi'=>$data['isi'],
            'waktu'=>DateTime::createFromFormat('d/m/Y', $waktu[0])->format('Y-m-d H:i:s'),
            'berakhir'=>DateTime::createFromFormat('d/m/Y', $waktu[1])->format('Y-m-d H:i:s'),
            'image'=>$image,
            'keyword'=>$data['keyword'],
        );
        $this->db->where('id_event',$data['id']);
        $this->db->where('id_bahasa',$id_bahasa);
        if($this->db->update('event',$update))
            return TRUE;
        else
            return FALSE;
    }

    public function save_event($data, $image) {

        $id_event = generateId();
        $waktu  = explode(" - ", $data['waktu']);
        $data_indonesia = array(
            'id'=>generateId(),
            'id_event'=> $id_event,
            'id_bahasa'=>'ID',
            'waktu'=>DateTime::createFromFormat('d/m/Y', $waktu[0])->format('Y-m-d H:i:s'),
            'berakhir'=>DateTime::createFromFormat('d/m/Y', $waktu[1])->format('Y-m-d H:i:s'),
            'ringkasan'=> $data['ringkasan_id'],
            'judul'=> $data['judul_id'],
            'isi'=> $data['isi_id'],
            'image'=> $image,
            'keyword'=>$data['keyword_id'],
        );
        $data_english = array(
            'id'=>generateId(),
            'id_event'=> $id_event,
            'id_bahasa'=>'EN',
            'waktu'=>DateTime::createFromFormat('d/m/Y', $waktu[0])->format('Y-m-d H:i:s'),
            'berakhir'=>DateTime::createFromFormat('d/m/Y', $waktu[1])->format('Y-m-d H:i:s'),
            'ringkasan'=> $data['ringkasan_en'],
            'judul'=> $data['judul_en'],
            'isi'=> $data['isi_en'],
            'image'=> $image,
            'keyword'=>$data['keyword_en'],
        );
        $this->db->insert('event',$data_indonesia);
        $this->db->insert('event',$data_english);
        return TRUE;
    }

    public function delete($id) {
        $this->db->where('id_event',$id);
        if($this->db->delete('event'))
            return TRUE;
        else
            return FALSE;
    }

    function get_feeds() {
        $query = $this->db->get('event');
        return $query->result();
    }

}
