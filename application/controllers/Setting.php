<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Setting extends CI_Controller {

	public $url;
    public $sess; 
	public function __construct() 
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect($this->config->item('base_url'), 'refresh');            
        }
        $this->load->library('navbar');
        $this->navbar->setMenuActive('setting');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        
	    $this->url = current_url();
        $this->sess = $this->session->userdata('logged_in');

        $this->load->model('Model_pengaturansistem');
    }

    public function index(){
         $data = array(
            'url'=> $this->url,
            'alert' => isset($_GET['n'])?$_GET['n']:'',
            'breadcrumb' => array(
                'Dashboard'=>base_url().'admin',
                'Setting' => base_url().'setting'
            ),
            'title'=> 'Import User <small>management</small>',
            'last_login' => $this->sess['last_login'],
            'session' => $this->sess['username']
        );
        $this->smartyci->assign('data',$data);
        $this->smartyci->display('admin/setting.tpl');

    }

    public function import_user($param=NULL, $c=NULL){
        $this->navbar->setSubMenuActive('import_user');
		$this->smartyci->assign('navbar',$this->navbar->getMenu());
        if ($param=='act') {

            if ($c=='true') {
                $username = $this->input->post("username", TRUE);
                
                $this->load->model("model_user");
                if ( $this->model_user->import_user($username) ) {
                    $alert = url_title("Import succses !");
                    redirect('setting/import_user?n='.$alert,'refresh');
                } else {
                    $alert = url_title("Import failed !");
                    redirect('setting/import_user?n='.$alert,'refresh');
                }

            } else {
                $extention = array("xlsx","xls");
                if (!$_FILES["filexls"]["error"]) {
                    if ( in_array(pathinfo($_FILES["filexls"]["name"], PATHINFO_EXTENSION), $extention) ) 
                    {
                        
                        if(move_uploaded_file($_FILES["filexls"]["tmp_name"], FCPATH."document/xls/".$_FILES["filexls"]["name"]))
                        {

                            $this->load->library("excel_php");
                            $arr_xls = $this->excel_php->read(FCPATH."document/xls/".$_FILES["filexls"]["name"]);


                            $data = array(
                                'url'=> $this->url,
                                'breadcrumb' => array(
                                    'Dashboard'=>base_url().'admin',
                                    'Setting' => base_url().'setting',
                                    'Import User' => base_url().'setting/import_user'
                                ),
                                'data_xls' => $arr_xls["values"],
                                'title'=> 'Import User <small>management</small>',
                                'last_login' => $this->sess['last_login'],
                                'session' => $this->sess['username']
                            );
                            $this->smartyci->assign('data',$data);
                            $this->smartyci->display('admin/setting_user_import_confirm.tpl');

                            
                        }

                    } else {
                        $data = array(
                        'url'=> $this->url,
                        'alert' => "Exstention File Is Not suport",
                        'breadcrumb' => array(
                            'Dashboard'=>base_url().'admin',
                            'Setting' => base_url().'setting',
                            'Import User' => base_url().'setting/import_user'
                        ),
                        'title'=> 'Import User <small>management</small>',
                        'last_login' => $this->sess['last_login'],
                        'session' => $this->sess['username']
                        );
                        $this->smartyci->assign('data',$data);
                        $this->smartyci->display('admin/setting_user_import.tpl');
                    }
                } 
            }

        } else {
            $data = array(
                'url'=> $this->url,
                'alert' => isset($_GET['n'])?$_GET['n']:'',
                'breadcrumb' => array(
                    'Dashboard'=>base_url().'admin',
                    'Setting' => base_url().'setting',
                    'Import User' => base_url().'setting/import_user'
                ),
                'title'=> 'Import User <small>management</small>',
                'last_login' => $this->sess['last_login'],
                'session' => $this->sess['username']
            );
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/setting_user_import.tpl');
        }
    }

    public function upload_file(){
        $config = array(
            'upload_path' => FCPATH.'document/xls/',
            'allowed_types' => 'csv|xls|xlsx',
            'file_name' => 'file_'.date('dmYHis'),
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE,
            'max_size' => 100,
            'max_width' => 1024,
            'max_height' => 768,           
            'min_width' => 10,
            'min_height' => 7,     
            'max_filename' => 0,
            'remove_spaces' => TRUE
        );

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $hasil = $this->upload->display_errors();
            ?>
                <h3><label class="label label-danger msg">Upload file gagal, Detail informasi</label></h3>
                <table class="table table-hover table-bordered">
                    <?php echo "<tr><td><strong>".$hasil."</strong></td></tr>"; ?>
                </table>
                <?php
        }
        else
        {
                $hasil = $this->upload->data();
                ?>
                <h2><label class="label label-success msg">Upload file berhasil, Detail informasi</label></h2>
                <table class="table table-hover table-bordered table-striped">
                    <tr>
                        <td colspan="2">
                            <img src="<?php echo base_url('uploadfiles/'.$hasil['orig_name']);?>" />
                        </td>
                    </tr>
                    <?php
                        foreach($hasil as $res => $value){
                            echo "<tr><td>".$res."</td>";
                            echo "<td>".$value."</td></tr>";
                        }
                    ?>
                </table>
                <?php
        }
    }

    function pengaturan_sistem($param=NULL){
        $this->navbar->setSubMenuActive('pengaturan_sistem');
        $this->smartyci->assign('navbar',$this->navbar->getMenu());

        if($param != 'act'){
            $data = array(
                'url'=> $this->url,
                'alert' => isset($_GET['n'])?$_GET['n']:'',
                'breadcrumb' => array(
                    'Dashboard'=>base_url().'admin',
                    'Setting' => base_url().'setting',
                    'General'=> base_url().'setting/pengaturan_sistem',
                ),
                'title'=> 'Pengaturan Umum <small>management</small>',
                'last_login' => $this->sess['last_login'],
                'session' => $this->sess['username'],
                'list_pengaturan'=> $this->Model_pengaturansistem->get_listpengaturan()->result()
            );
            $this->smartyci->assign('data',$data);
            $this->smartyci->display('admin/setting_pengaturan_sistem.tpl');
        }else{
            $pengaturansistem = $this->input->post('pengaturan_sistem');
            if(!empty($pengaturansistem)){
                $this->Model_pengaturansistem->update_pengaturansistem($pengaturansistem);
                $alert = url_title("Saved Success! ");
                redirect('setting/pengaturan_sistem?n='.$alert,'refresh');
            }else{
                $alert = url_title("Failed Saved! ");
            }
        }
    }
}
