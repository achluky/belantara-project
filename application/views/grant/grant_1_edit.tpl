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


                    <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/create/1/save" name="" method="POST" >

                        <div class="box-header">
                            <h3 class="box-title">1. INFORMASI PENGAJU <small>Input Proposal Baru</small> </h3>
                            <hr/>
                        </div>

                        <div class="box-body">
                            <input type="hidden" class="form-control" id="id_grant" name="id_grant" placeholder="" value="{(isset($data.grant->id_grant))?$data.grant->id_grant:''}" >
                            <input type="hidden" class="form-control" id="id_biodata" name="id_biodata" placeholder="" value="{$data.profil->id_biodata}" >
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
                                                        <th>No</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Nama Berkas</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="add-listener">
                                                </tbody>
                                            </table>
                                            
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".dok_lampiran"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah</button>

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
                                                    <th>No</th>
                                                    <th>Project/Program/Kegiatan</th>
                                                    <th>Dana Yang Dikelola</th>
                                                    <th>Sumber</th>
                                                    <th>Periode</th>
                                                    <th>Durasi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="add-listener">
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <br/>
                            <button type="submit" class="btn btn-info pull-right"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                        </div><!-- /.box-footer -->
                        <br/><br/>
                    </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}

<div class="modal fade dok_lampiran" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <form role="form" data-toggle="validator" action="{base_url()}grant/profil/save" name="" method="POST" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="mySmallModalLabel">Tambahkan Dokumen Lampiran</h4>
            </div>
            <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Dokumen</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">File Dokumen</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </form>

    </div>
  </div>
</div>



<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
{/block}