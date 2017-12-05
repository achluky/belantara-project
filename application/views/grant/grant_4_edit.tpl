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

                    <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/edit/4/{$data.id_grant}/save" method="POST" >
                        <div class="box-header">
                            <h3 class="box-title">4. Indikator Ketercapaian Keberhasilan <small>Input Proposal Baru</small> </h3>
                            <hr/>
                        </div>
                        <div class="box-body">
                            <input type="hidden" class="form-control" id="id_biodata" name="id_grant" placeholder="" value="{$data.id_grant}" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">                                        
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Indikator</th>
                                                    <th width="100px;">Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_indikator">
                                              {foreach $data.grant_indikator->result() as $row}
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="indikator_nama[]"  class="form-control" id="indikator_nama"   value="{$row->indikator_nama}">
                                                        {$row->indikator_nama}
                                                    </td>
                                                    <td><a href=""><i class="glyphicon glyphicon-remove"></i> &nbsp; hapus</a></td>
                                                </tr>
                                              {/foreach}
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#add_indikator"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <br/>
                            <div class="btn-group pull-right">
                                <a href="{base_url()}grant/aplikasi/edit/3/{$data.id_grant}" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-chevron-left"></i> Sebelumnya</a>
                                <button type="submit" class="btn btn-info pull-right"><i class="glyphicon glyphicon-floppy-saved"></i> Update</button>
                            </div>

                        </div><!-- /.box-footer -->
                        <br/><br/>
                    </form>



                            <div class="modal fade" id="add_indikator">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Indikator Ketercapaain Keberhasilan</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Indikator</label>
                                      <textarea class="form-control" id="indikator" name="indikator" rows="7"></textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary add_indikator">Simpan</button>
                                  </div>
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
<script src="{base_url()}assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

        var editor = CKEDITOR.replace('indikator'); 

        $(".add_indikator").click(function(){
            var value = editor.getData();
            var data = "<tr>"+
                            "<td>"+
                            " <input type=\"hidden\" name=\"indikator_nama[]\" value=\""+ value +"\">"+
                            " "+ value +""+
                            "</td>"+
                            "<td>  "+
                            "<a href=\"\"><i class=\"glyphicon glyphicon-remove\"></i> &nbsp; hapus</a>"+
                            "</td>"+
                        "</tr>";
            $("#list_indikator").append(data);
            $("#add_indikator").modal('hide');
        });

  });    
</script>
{/block}