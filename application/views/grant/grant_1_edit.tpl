{extends file="admin/template_dashboard_grant.tpl"} 


{block name="addon_styles"}
{/block}

{block name="breadcrumb"}
      <i class="glyphicon glyphicon-home"></i> &nbsp;
	  {$stopbreadcrumb = 0}
      {foreach $data.breadcrumb as $label => $value}
		{if $stopbreadcrumb++ < count($data.breadcrumb)-1}
			<li><a href="{$value}">{$label}</a></li>
		{else}
			<li>{$label}</li>
		{/if}
      {/foreach}
{/block}


{block name="content"}
      <div class="row"> 
          <div class="col-xs-12">
                
                {if isset($data.alert) and ($data.alert != '')}
                <div class="callout callout-info">
                  <h4>Info!</h4>
                  <p>{$data.alert}</p>
                </div>
                {/if}


                <div class="box box-primary">
                  <div class="box-body box-primary">

                    {if isset($data.error_msg) and ($data.error_msg != '')}
                    <div class="callout callout-info">
                      <h4>Info!</h4>
                      <p>{$data.error_msg}</p>
                    </div>
                    {/if}

                    <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/edit/1/{$data.grant->id_grant}/save" name="" method="POST" >

                        <div class="box-header">
                            <h3 class="box-title">1. INFORMASI PENGAJU <small>Input Proposal Baru</small> </h3>
                            <hr/>
                        </div>

                        <div class="box-body">
                            <input type="hidden" class="form-control" id="id_grant" name="id_grant" placeholder="" value="{(isset($data.grant->id_grant))?$data.grant->id_grant:''}" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Nama Lembaga</label>
                                            <p>{$data.profil->lembaga_nama}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Alamat Lembaga</label>
                                            <p>{$data.profil->lembaga_alamat}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Tahun Pendirian</label>
                                            <p>{$data.profil->lembaga_tahun_berdiri}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="control-label tooltip-demo">Dokumen Lampiran</label>

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="20px"></th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Nama Berkas</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list_doc">
                                                    {foreach $data.document->result() as $row}
                                                    <tr>
                                                        <td><input type='checkbox' name='record'></td>
                                                        <td>
                                                            <input type="hidden" name="grant_dokumen[dokumen_nama][]" value="{$row->dokumen_nama}">
                                                            {$row->dokumen_nama}</td>
                                                        <td>
                                                            <input type="hidden" name="grant_dokumen[dokumen_file][]" value="{$row->dokumen_file}">
                                                            {$row->dokumen_file}</td>
                                                    </tr>
                                                    {/foreach}
                                                </tbody>
                                            </table>
                                            
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".dok_lampiran"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah</button>
                                            <button type="button" class="btn btn-danger btn-sm" id="delete_doc"><i class="glyphicon glyphicon-remove"></i> &nbsp; Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Nama Pejabat Utama</label>
                                            <input type="input" class="form-control" id="judul" name="pengaju_pejabat_utama" placeholder="" value="{(isset($data.grant->pengaju_pejabat_utama) )?$data.grant->pengaju_pejabat_utama:''}" required>
                                            <p class="text-danger">Misal: ahmad luky ramdani</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Jabatan</label>
                                            <input type="input" class="form-control" id="judul" name="pengaju_pejabat_utama_jabatan" placeholder="" value="{(isset($data.grant->pengaju_pejabat_utama_jabatan) )?$data.grant->pengaju_pejabat_utama_jabatan:''}" required>
                                            <p class="text-danger">Misal: Asisten ahli</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Nama Pelaksana Kegiatan</label>
                                            <input type="input" class="form-control" id="judul" name="pengaju_pejabat_kegiatan" placeholder="" value="{(isset($data.grant->pengaju_pejabat_kegiatan) )?$data.grant->pengaju_pejabat_kegiatan:''}" required>
                                            <p class="text-danger">Misal: Taufik ahmad</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Jabatan</label>
                                            <input type="input" class="form-control" id="judul" name="pengaju_pejabat_kegiatan_jabatan" placeholder="" value="{(isset($data.grant->pengaju_pejabat_kegiatan_jabatan) )?$data.grant->pengaju_pejabat_kegiatan_jabatan:''}" required>
                                            <p class="text-danger">Misal: Asisten peneliti</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label for="inputEmail3" class="control-label">Portofolio Pengaju</label>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th width=20px;></th>
                                                    <th>Project/Program/Kegiatan</th>
                                                    <th>Dana Yang Dikelola</th>
                                                    <th>Sumber</th>
                                                    <th>Periode</th>
                                                    <th>Durasi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="add_portofolio">
                                                {foreach $data.portofolio->result() as $row}
                                                <tr>
                                                    <td><input type='checkbox' name='record_portofolio'></td>
                                                    <td>
                                                        <input type="hidden" name="grant_portofolio[portofolio_project][]" value="{$row->portofolio_project}">{$row->portofolio_project}</td>
                                                    <td>
                                                        <input type="hidden" name="grant_portofolio[portofolio_dana][]" value="{$row->portofolio_dana}">Rp. {$row->portofolio_dana|number_format:2:",":"."}</td>
                                                    <td>
                                                        <input type="hidden" name="grant_portofolio[portofolio_sumber][]" value="{$row->portofolio_sumber}">{$row->portofolio_sumber}</td>
                                                    <td>
                                                        <input type="hidden" name="grant_portofolio[portofolio_periode][]" value="{$row->portofolio_periode}">{$row->portofolio_periode}</td>
                                                    <td>
                                                        <input type="hidden" name="grant_portofolio[portofolio_durasi][]" value="{$row->portofolio_durasi}">{$row->portofolio_durasi} Tahun</td>
                                                </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>

                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".dok_portofolio"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah</button>
                                        <button type="button" class="btn btn-danger btn-sm" id="delete_portofolio"><i class="glyphicon glyphicon-remove"></i> &nbsp; Hapus</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <div class="btn-group pull-right">
                                <a href="{base_url()}grant/aplikasi"  class="btn btn-danger"><i class="glyphicon glyphicon-list"></i> List Proposal</a>
                                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                            </div>
                        </div><!-- /.box-footer -->
                        <br/><br/>
                    </form>

                    <!-- Modal  -->
                    <div class="modal fade dok_lampiran" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <form role="form" id="form_add_document" action="#">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <h4 class="modal-title" id="mySmallModalLabel">Tambahkan Dokumen Lampiran</h4>
                                </div>
                                <div class="modal-body">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Dokumen</label>
                                            <input type="input" class="form-control" id="nama_doc" name="nama_doc" placeholder="Nama Doc">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputPassword1">File Dokumen</label>
                                            <input type="file" class="form-control" id="file_doc" name="file_doc" placeholder="">
                                          </div>

                                            <div id="notif_form_add_document"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary add_doc">Update</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <!-- End modal  --> 

                    <!-- Modal  -->
                    <div class="modal fade dok_portofolio" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content modal-sm">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <h4 class="modal-title" id="mySmallModalLabel">Portofolio Pengaju</h4>
                                </div>
                                <div class="modal-body">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Project/Program/Kegiatan</label>
                                            <input type="input" class="form-control" id="portofolio_project" placeholder="Project/Program/Kegiatan">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Dana Yang Dikelola</label>
                                            <input type="input" class="form-control" id="portofolio_dana" placeholder="Dana Yang Dikelola">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Sumber</label>
                                            <input type="input" class="form-control" id="portofolio_sumber" placeholder="Sumber">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Periode</label>
                                            <input type="input" class="form-control" id="portofolio_periode" placeholder="Periode">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Durasi</label>
                                            <input type="input" class="form-control" id="portofolio_durasi" placeholder="Durasi">
                                          </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary add_portofolio">Update</button>
                                </div>
                        </div>
                      </div>
                    </div>
                    <!-- End modal  -->

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click','.add_doc',function(e){
            e.preventDefault();
            var name = $("#nama_doc").val();
            if (name == ''){
                $('#notif_form_add_document').html('<p><div class="alert alert-warning alert-dismissible fade in" role="alert" id="notif_form_add_document">Nama Dokumen Kosong</div></p>');
                return;
            }
            var file = $("#file_doc").val().replace(/C:\\fakepath\\/i, '');
            var data = "<tr>"+
                            "<td><input type='checkbox' name='record' ></td>"+
                            "<td>"+
                            " <input type=\"hidden\" name=\"grant_dokumen[dokumen_nama][]\" value=\""+ name +"\">"+
                            " "+ name +""+
                            "</td>"+
                            "<td>"+
                            "    <input type=\"hidden\" name=\"grant_dokumen[dokumen_file][]\" value=\""+ file +"\">"+
                            "    "+ file +""+
                            "</td>"+
                        "</tr>";
            var file_data = $('#file_doc').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: '{base_url()}grant/aplikasi/upload_doc',
                type: 'POST',
                data: form_data,
                dataType: 'JSON',
                processData: false, 
                contentType: false,
                success: function(rst, status){
                    if(rst.status != 'error')
                    {   
                        $("#list_doc").append(data);
                        $(".dok_lampiran").modal('hide');
                    } else {
                        $('#notif_form_add_document').html('<p><div class="alert alert-warning alert-dismissible fade in" role="alert" id="notif_form_add_document">'+rst.msg+'</div></p>');
                    }
                }
            });     
        });
        $("#delete_doc").click(function(){
           $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
        $(".add_portofolio").click(function(){
            var portofolio_project = $("#portofolio_project").val();
            var portofolio_dana = $("#portofolio_dana").val();
            var portofolio_sumber = $("#portofolio_sumber").val();
            var portofolio_periode = $("#portofolio_periode").val();
            var portofolio_periode = $("#portofolio_periode").val();
            var portofolio_durasi = $("#portofolio_durasi").val();
            var data = "<tr>"+
                            "<td><input type='checkbox' name='record_portofolio' ></td>"+
                            "<td>"+
                            "  <input type=\"hidden\" name=\"grant_portofolio[portofolio_project][]\" value=\""+portofolio_project+"\">"+
                            " "+portofolio_project+""+
                            "</td>"+
                            "<td>"+
                            "    <input type=\"hidden\" name=\"grant_portofolio[portofolio_dana][]\" value=\""+portofolio_dana+"\">"+
                            " "+portofolio_dana+""+
                            "</td>"+
                            "<td>"+
                            "    <input type=\"hidden\" name=\"grant_portofolio[portofolio_sumber][]\" value=\""+portofolio_sumber+"\">"+
                            " "+portofolio_sumber+""+
                            "</td>"+
                            "<td>"+
                            "    <input type=\"hidden\" name=\"grant_portofolio[portofolio_periode][]\" value=\""+portofolio_periode+"\">"+
                            " "+portofolio_periode+""+
                            "</td>"+
                            "<td>"+
                            "    <input type=\"hidden\" name=\"grant_portofolio[portofolio_durasi][]\" value=\""+portofolio_durasi+"\">"+
                            "  "+portofolio_durasi+""+
                            "</td>"+
                        "</tr>";
            $("#add_portofolio").append(data);
            $(".dok_portofolio").modal('hide');
        });
        $("#delete_portofolio").click(function(){
           $("table tbody").find('input[name="record_portofolio"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
{/block}