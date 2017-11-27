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

                    <form role="form" data-toggle="validator" action="{base_url()}grant/profil/lanjut/save" name="" method="POST" >
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="id" value="{($data.email->id != '')?$data.email->id:''}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Alamat Email</label>
                                            <input type="input" class="form-control" id="username" name="username" placeholder="" value="{($data.email->username != '')?$data.email->username:''}" required>
                                            <p class="text-danger">Misal: direktur@sumatera.abadi.org</p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger"> Ubah Email</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                            <hr>
                    <form role="form" data-toggle="validator" action="{base_url()}grant/profil/lanjut/save" name="" method="POST" >
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Password</label>
                                            <input type="password" class="form-control" id="judul" name="lembaga_nama" placeholder="" value="{($data.email->password != '')?$data.email->password:''}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Password Baru</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_nama" placeholder="" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Ulangi Password Baru</label>
                                            <input type="input" class="form-control" id="judul" name="lembaga_provinsi" placeholder="" value="" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger"> Ubah Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
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
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
{/block}