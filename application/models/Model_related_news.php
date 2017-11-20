<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_related_news extends CI_Model {
    

    var $column = array('waktu','judul','id_bahasa');
    var $order = array('waktu' => 'DESC');

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listrelated_news($limit)
    {
        if ($limit==null) {
            $l = 10;
        }else{
            $l=$limit;
        }

    	$sql = "select * from berita_ini WHERE id_bahasa = '".$this->session->userdata('site_lang')."' and kategori='related_news' ORDER BY waktu DESC";
        echo $sql;
    	$result = $this->db->query($sql);
    	return $result;
    }

    public function _get_datatables_query()
    {
        $this->db->where("id_bahasa",$this->session->userdata('site_lang'));
        $this->db->where("kategori", 'related_news');
        $this->db->order_by('waktu','desc');
        $this->db->from("berita_ini");
        $i = 0;
        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }
        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_related_news()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        $this->db->from("berita_ini");
        $this->db->where("kategori", "related_news");
        return $this->db->count_all_results();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_related_news($id, $id_bahasa="EN")
    {
    	$sql = "select * from berita_ini WHERE id_bahasa= '".$id_bahasa."' and id_berita='".$id."'  and kategori='related_news' ";
    	$result = $this->db->query($sql);
    	return $result->row();
    }

    public function get_related_news_front($slug, $id_bahasa="EN")
    {
        $sql = "select * from berita_ini WHERE id_bahasa= '".$id_bahasa."' and slug='".$slug."'  and kategori='related_news' ";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function update_related_news($data, $id_bahasa)
    {
        $update = array(
            'judul'=>$data['judul'],
            'ringkasan'=>$data['ringkasan'],
            'isi'=>$data['isi'],
            'keyword'=>$data['keyword'],
            'slug'=>$data['slug']
        );
        $this->db->where('id_berita',$data['id']);
        $this->db->where('id_bahasa',$id_bahasa);
        $this->db->update('berita_ini',$update);
        return TRUE;
    }

    public function save_related_news($data, $image)
    {

        $id_berita = generateId();
        $data_indonesia = array(
            'id'=>generateId(),
            'id_berita'=> $id_berita,
            'id_bahasa'=> 'ID',
            'waktu'=>date('Y-m-d H:i:s'),
            'judul'=>$data['judul_id'],
            'ringkasan'=>$data['ringkasan_id'],
            'isi'=>$data['isi_id'],
            'keyword'=>$data['keyword_id'],
            'kategori'=>'related_news',
            'file_pdf'=>url_title($data['judul_id']),
            'slug'=>$data['slug'],
        );
        $data_english = array(
            'id'=>generateId(),
            'id_berita'=> $id_berita,
            'id_bahasa'=> 'EN',
            'waktu'=>date('Y-m-d H:i:s'),
            'judul'=>$data['judul_en'],
            'ringkasan'=>$data['ringkasan_en'],
            'isi'=>$data['isi_en'],
            'keyword'=>$data['keyword_en'],
            'kategori'=>'related_news',
            'file_pdf'=>url_title($data['judul_en']),
            'slug'=>$data['slug'],
        );

        $insert_indonesia = $this->db->insert('berita_ini',$data_indonesia);
        $insert_english = $this->db->insert('berita_ini',$data_english);
        
        if($insert_indonesia && $insert_english){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id){
        $this->db->where('id_berita',$id);
        if($this->db->delete('berita_ini'))
            return TRUE;
        else
            return FALSE;
    }

    public function get_related_news_all($id_bahasa="EN"){
        $sql = "select * from berita_ini where kategori='related_news' and id_bahasa = '".$id_bahasa."'";
        $result = $this->db->query($sql);
        return $result;
    }
    
    function get_feeds() {
        $query = $this->db->get('berita_ini');
        return $query->result();
    }
}
