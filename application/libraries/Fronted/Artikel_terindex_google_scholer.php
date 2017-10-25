<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Artikel_terindex_google_scholer {
    
    public function __construct() {
        $this->controller = & get_instance();
    }
    public function view(){
        $data = array(
                    'url'=> current_url(),
                    'alert' => $this->controller->input->get('n'),
                    'departemen' => $this->controller->input->get('str'),
                    'jenis_artikel' => $this->controller->input->get('jenis_artikel'),
                    'levelArtikel' => $this->controller->input->get('levelArtikel')
        );
        $this->controller->smartyci->assign('data',$data);
        $this->controller->smartyci->display('frontend/view/artikel_terindex_google_scholer.tpl');
    }
    public function list_(){
        $this->controller->load->model("model_wcu_reserach_publication_artikel_terindex_google_scholer");
        $departemen = $this->controller->input->get('d');
        $jenis_artikel = $this->controller->input->get('j');
        $levelArtikel = $this->controller->input->get('l');
        $list = $this->controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->get_datatables_listartikel($departemen,$jenis_artikel,$levelArtikel);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel) {
            $no++;
            $row = array();
            $row[] = $artikel->judul;
            $row[] = $artikel->JenisArtikelID;
            $row[] = $artikel->NamaArtikel;
            $row[] = $artikel->TahunTerbit;
            // $row[] = $artikel->BulanTerbitAwal;
            // $row[] = $artikel->BulanTerbitAkhir;
            $row[] = $artikel->KotaTerbit;
            // $row[] = $artikel->Url;
            $row[] = $artikel->ISSN;
            $row[] = $artikel->ISBN;
            // $row[] = $artikel->Volume;
            // $row[] = $artikel->Halaman;
            // $row[] = $artikel->Nomor;
            // $row[] = $artikel->Akreditasi;
            // $row[] = $artikel->MediaPenerbit;
            // $row[] = $artikel->IndexScopus;
            $row[] = "<a href='javascript:void()' onclick='viewStucent(this)' class='viewOnceGoogle ".$artikel->ID."' ><i class='fa fa-file'></i> view</a>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->count_allStudent($departemen,$jenis_artikel,$levelArtikel),
            "recordsFiltered" => $this->controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->count_filteredStudent($departemen,$jenis_artikel,$levelArtikel),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function once($id){
        $this->controller->load->model("model_wcu_reserach_publication_artikel_terindex_google_scholer");
        $data   = $this->controller->model_wcu_reserach_publication_artikel_terindex_google_scholer->getOnes($id);
        $row    = $data->row();
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
                'Tingkat' => $row->Tingkat
            );
        echo json_encode($arr);
    }
}


 