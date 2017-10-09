<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_announcement extends CI_Model {
    

    var $column = array('judul','waktu','id_bahasa');
    var $order = array('waktu' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }

    public function get_listannouncement($limit)
    {
        if ($limit==null) {
            $l = 10;
        }else{
            $l=$limit;
        }

    	$sql = "select * from pengumuman WHERE id_bahasa = '".$this->session->userdata('site_lang')."' ORDER BY waktu DESC";
    	$result = $this->db->query($sql);
    	return $result;
    }

    public function _get_datatables_query()
    {
        $this->db->where("id_bahasa",$this->session->userdata('site_lang'));
        $this->db->from("pengumuman");
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

    public function get_datatables_announcement()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        $this->db->from("pengumuman");
        return $this->db->count_all_results();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_announcement($id, $id_bahasa="EN")
    {
    	$sql = "select * from pengumuman WHERE id_bahasa= '".$id_bahasa."' and id_pengumuman='".$id."' ";
    	$result = $this->db->query($sql);
    	return $result->row();
    }

    public function update_announcement($data, $image, $id_bahasa)
    {
        $update = array(
            'judul'=>$data['judul'],
            'ringkasan'=>$data['ringkasan'],
            'isi'=>$data['isi'],
            'image'=>$image,
            'keyword'=>$data['keyword'],
            'condolence_greetings'=>$data['type'],
        );
        $this->db->where('id_pengumuman',$data['id']);
        $this->db->where('id_bahasa',$id_bahasa);
        $this->db->update('pengumuman',$update);

        return TRUE;
    }

    public function save_announcement($data, $image)
    {
        $id_pengumuman = generateId();
        $data_indonesia = array(
            'id'=>generateId(),
            'id_pengumuman'=>$id_pengumuman,
            'id_bahasa'=>'ID',
            'waktu'=> date('Y-m-d H:i:s'),
            'berakhir'=> date('Y-m-d H:i:s'),
            'judul'=>$data['judul_id'],
            'ringkasan'=>$data['ringkasan_id'],
            'isi'=> $data['isi_id'],
            'keyword'=> $data['keyword_id'],
            'image'=>$image,
            'condolence_greetings'=> $data['type']
        );
        $data_english = array(
            'id'=>generateId(),
            'id_pengumuman'=>$id_pengumuman,
            'id_bahasa'=>'EN',
            'waktu'=> date('Y-m-d H:i:s'),
            'berakhir'=> date('Y-m-d H:i:s'),
            'judul'=>$data['judul_en'],
            'ringkasan'=>$data['ringkasan_en'],
            'isi'=> $data['isi_en'],
            'keyword'=> $data['keyword_en'],
            'image'=>$image,
            'condolence_greetings'=> $data['type']
        );
        $this->db->insert('pengumuman',$data_indonesia);
        $this->db->insert('pengumuman',$data_english);
        return TRUE;
    }

    public function delete($id){
        $this->db->where('id_pengumuman',$id);
        if($this->db->delete('pengumuman'))
            return TRUE;
        else
            return FALSE;
    }
    
    function get_feeds() {
        $query = $this->db->get('pengumuman');
        return $query->result();
    }
}
