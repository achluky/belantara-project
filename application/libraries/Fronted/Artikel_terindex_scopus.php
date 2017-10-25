<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Artikel_terindex_scopus {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'year' => $this->controller->input->get('y')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/artikel_terindex_scopus.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_reserach_publication_artikel_terindex_scopus");
        $year = $this->controller->input->get('y');
        $list = $this->controller->model_wcu_reserach_publication_artikel_terindex_scopus->get_datatables_listartikel($year);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel) {
            $no++;
            $row = array();
            $row[] = $artikel->Judul;
            $row[] = $artikel->TahunTerbit;
            $row[] = getJenisArtikel($artikel->JenisArtikelID);
            $row[] = "<a href='javascript:void()' onclick='view(this)' class='view ".$artikel->ID."' ><i class='fa fa-file'></i> view</a>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_reserach_publication_artikel_terindex_scopus->count_all($year),
            "recordsFiltered" => $this->controller->model_wcu_reserach_publication_artikel_terindex_scopus->count_filtered($year),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_reserach_publication_artikel_terindex_scopus");
        $row   = $this->controller->model_wcu_reserach_publication_artikel_terindex_scopus->getOnes($id);
        $arr = array(
                'ID' =>$row->ID,
                'judul' => $row->Judul,
                'Nama' => $row->JenisArtikelID,
                'NamaArtikel' => $row->NamaArtikel,
                'TahunTerbit' => $row->TahunTerbit,
                'BulanTerbitAwal' => $row->BulanTerbitAwal,
                'BulanTerbitAkhir' => $row->BulanTerbitAkhir,
                'KotaTerbit' => $row->KotaTerbit,
                'Url' => $row->Url,
                'ISSN' => $row->ISSN,
                'ISBN' => $row->ISBN,
                'Volume' => $row->Volume,
                'Halaman' => $row->Halaman,
                'Nomor' => $row->Nomor,
                'Akreditasi' => $row->Akreditasi,
                'MediaPenerbit' => $row->MediaPenerbit,
                'IndexScopus'  => $row->IndexScopus,
                'Tingkat' => getLingkup($row->LevelArtikel)
            );
        echo json_encode($arr);
    }
}


 