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
                    <form role="form" data-toggle="validator" action="{base_url()}grant/aplikasi/edit/5/{$data.grant_kegiatan_dana->id_grant}/save" name="" method="POST" >
                        <div class="box-header">
                            <h3 class="box-title">5. Kegiatan dan Dana <small>Input Proposal Baru</small> </h3>
                            <hr/>
                        </div>
                        <div class="box-body">
                            <input type="hidden" class="form-control" id="id_grant" name="id_grant" placeholder="" value="{$data.grant_kegiatan_dana->id_grant}" >
                            <input type="hidden" class="form-control" id="id_kegiatan_dana" name="id_kegiatan_dana" placeholder="" value="{$data.grant_kegiatan_dana->id_kegiatan_dana}" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="control-label">Jenis Kegiatan</label>
                                            <textarea class="form-control" id="judul" name="kegiatan_dana_jenis" placeholder="Deskripsi Jenis Kegiatan" value="" required rows="5">{(isset($data.grant_kegiatan_dana->kegiatan_dana_jenis) )?$data.grant_kegiatan_dana->kegiatan_dana_jenis:''}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">                                        
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Kegiatan</th>
                                                    <th width="200px;">Dana</th>
                                                    <th width="100px;">Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_keg">
                                              {foreach $data.grant_kegiatan_dana_lanjut->result() as $row}
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="kegiatan_dana_nama[]" value="{$row->nama}">
                                                        {$row->nama}
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="kegiatan_dana_jumlah[]" value="{$row->jumlah}">
                                                        Rp. {$row->jumlah|number_format:2:",":"." }
                                                    </td>
                                                    <td><a href=""><i class="glyphicon glyphicon-remove"></i> &nbsp; hapus</a></td>
                                                </tr>
                                              {/foreach}
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#add_kegiatan_dana"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <br/>
                            <div class="btn-group pull-right">
                                <a href="{base_url()}grant/aplikasi/edit/4/{$data.grant_kegiatan_dana->id_grant}" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-chevron-left"></i> Sebelumnya</a>
                                <button type="submit" class="btn btn-info pull-right"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                            </div>
                        </div><!-- /.box-footer -->
                        <br/><br/>
                    </form>

                    <!-- <pre> -->
                      <!-- {print_r($data.session_all)} -->
                    <!-- </pre> -->

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}

<div class="modal fade" id="add_kegiatan_dana">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Kegiatan dan Dana</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Kegiatan</label>
          <input type="input" name="kegiatan_dana_nama" class="form-control" id="kegiatan_dana_nama" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Dana</label>
          <input type="input" name="kegiatan_dana_jumlah" class="form-control" id="kegiatan_dana_jumlah">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_keg">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

  $(document).ready(function(){
        $(".add_keg").click(function(){
            var kegiatan_dana_nama = $("#kegiatan_dana_nama").val();
            var kegiatan_dana_jumlah = $("#kegiatan_dana_jumlah").val();
            var data = "<tr>"+
                            "<td>"+
                            " <input type=\"hidden\" name=\"kegiatan_dana_nama[]\" id=\"kegiatan_dana_nama\" value=\""+kegiatan_dana_nama+"\">"+
                            " "+ kegiatan_dana_nama +""+
                            "</td>"+
                            "<td>"+
                            " <input type=\"hidden\" name=\"kegiatan_dana_jumlah[]\" id=\"kegiatan_dana_jumlah\" value=\""+kegiatan_dana_jumlah+"\">"+
                            " Rp. "+ kegiatan_dana_jumlah +""+
                            "</td>"+
                            "<td>  "+
                            "<a href=\"\"><i class=\"glyphicon glyphicon-remove\"></i> &nbsp; hapus</a>"+
                            "</td>"+
                        "</tr>";
            $("#list_keg").append(data);
            $("#add_kegiatan_dana").modal('hide');
        });

  });    
</script>
{/block}