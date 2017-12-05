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
                <div class="box box-primary">
                  <div class="box-body box-primary">
                    {if isset($data.alert) and ($data.alert != '')}
                    <div class="callout callout-info">
                      <h4>Info!</h4>
                      <p>{$data.alert}</p>
                    </div>
                    {/if}
                    <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/edit/3/{$data.grant_risalah->id_grant}/save" name="" method="POST" >

                        <div class="box-header">
                            <h3 class="box-title">3. Risalah <small>Input Proposal Baru</small> </h3>
                            <hr/>
                        </div>
                        <div class="box-body">
                            <input type="hidden" class="form-control" id="id_biodata" name="id_grant" placeholder="" value="{$data.grant_risalah->id_grant}" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Latar Belakang</label>
                                            <textarea class="form-control" id="judul" name="risalah_latar_belakang" placeholder="Latar Belakang Proyek" value="" required rows="30">{(isset($data.grant_risalah->risalah_latar_belakang) )?$data.grant_risalah->risalah_latar_belakang:''}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Tujuan</label>
                                            <textarea class="form-control" id="judul" name="risalah_tujuan" placeholder="Tujuan Proyek" value="" required rows="3">{(isset($data.grant_risalah->risalah_tujuan) )?$data.grant_risalah->risalah_tujuan:''}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Perubahan Yang Diharapkan</label>
                                            <textarea class="form-control" id="judul" name="risalah_perubahan" placeholder="Perubahan yang diharapkan atas dampak dari Proyek" value="" required rows="3">{(isset($data.grant_risalah->risalah_perubahan) )?$data.grant_risalah->risalah_perubahan:''}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Metode</label>
                                            <textarea class="form-control" id="judul" name="risalah_metode" placeholder="Metode Implementasi proyek" value="" required rows="3">{(isset($data.grant_risalah->risalah_metode) )?$data.grant_risalah->risalah_metode:''}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <br/>
                            <div class="btn-group pull-right">
                                <a href="{base_url()}grant/aplikasi/edit/2/{$data.grant_risalah->id_grant}" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-chevron-left"></i> Sebelumnya</a>
                                <button type="submit" class="btn btn-info pull-right"><i class="glyphicon glyphicon-floppy-saved"></i> Update</button>
                            </div>
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
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{base_url()}assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script>
    $(function () {
        CKEDITOR.replace('risalah_latar_belakang', {
             height: 200
        }); 
        CKEDITOR.replace('risalah_tujuan'); 
        CKEDITOR.replace('risalah_perubahan'); 
        CKEDITOR.replace('risalah_metode'); 
    });
</script>
{/block}