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

                    <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/create/3/save" name="" method="POST" >
                        <div class="box-body">
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="col-md-12">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget cursus turpis, nec tristique turpis. Nulla finibus sit amet purus commodo lobortis. Nam molestie elit ac nunc scelerisque, vel accumsan ipsum rutrum. Phasellus eget lectus accumsan, vehicula ante vitae, accumsan arcu. Mauris at diam nec elit tristique aliquet. Nulla vel ex euismod, aliquet turpis lacinia, dignissim nunc. Curabitur placerat feugiat cursus. Vivamus id neque dignissim, facilisis libero eget, pretium leo. Pellentesque in massa scelerisque libero mattis porttitor. Nulla facilisi. Nullam eget odio at velit finibus congue et non orci. Nullam ligula augue, vestibulum auctor ullamcorper cursus, tempor at tortor. Nullam efficitur rutrum turpis non commodo. Ut et malesuada enim. Etiam vulputate laoreet tellus. Mauris ullamcorper ipsum in orci tempor, at accumsan augue sagittis.
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="col-md-12">
                                          <table class="table table-striped">
                                              <tr>
                                                  <td>1</td>
                                                  <td>Informasi pengaju</td>
                                                  <td>{7/$data.session_all['grant']|count * 100}%</td>
                                              </tr>
                                              <tr>
                                                  <td>2</td>
                                                  <td>Ringkasan Proyek</td>
                                                  <td>{12/$data.session_all['grant_proyek']|count * 100}%</td>
                                              </tr>
                                              <tr>
                                                  <td>3</td>
                                                  <td>Risalah</td>
                                                  <td>{4/$data.session_all['grant_risalah']|count * 100}%</td>
                                              </tr>
                                              <tr>
                                                  <td>4</td>
                                                  <td>Indikator Ketercapaian Keberhasilan</td>
                                                  <td>{(isset($data.session_all['grant_indikator']) )?'100':''}%</td>
                                              </tr>
                                              <tr>
                                                  <td>5</td>
                                                  <td>Kegiatan Dan Dana</td>
                                                  <td>{3/$data.session_all['grant_kegiatan_dana']|count * 100}%</td>
                                              </tr>
                                              
                                          </table>
                                      </div>
                                  </div>
                            </div>
                            <div class="box-footer">
                                <div class="btn-group pull-right">
                                    <a href="{base_url()}grant/aplikasi/create/5" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-chevron-left"></i> Sebelumnya</a>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#konfirmasi"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi"><i class="glyphicon glyphicon-send"></i> &nbsp; Kirim</button>

                                </div>
                            </div><!-- /.box-footer -->
                            <br/><br/>
                        </div>
                    </form>


                    <div class="modal fade" id="konfirmasi">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/save" id="" method="POST" >
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Info</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <p>Apakan anda yakin akan <b>Menyimpan</b> atau <b>Mengirimkan</b> data ini ?</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary submit_data">Ya</button>
                          </div>
                          </form>

                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <!-- <pre>
                      {print_r($data.session_all)}
                    </pre> -->
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

        $(".submit_data").click(function(){
          $( "#target" ).submit();
        });

  });    
</script>
{/block}







