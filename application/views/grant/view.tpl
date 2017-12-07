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

                <div class="notifikasi">
                </div>
                
                <div class="box box-primary">
                  <div class="box-body box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12"> 
                              <input type="hidden" name="id_user" value="{$data.id_user}" class="id_user">
                              <input type="hidden" name="id_grant" value="{$data.grant->id_grant}" class="id_grant">
                              
                              <table class="table table-bordered affix-top">
                                  <tbody>
                                    <tr>
                                      <th scope="row" width="300px;">Berikan Tanggapan dan Keputusan</th>
                                      <td colspan="3" class="tanggapan">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#add_tanggapan"><i class="glyphicon glyphicon-plus"></i> &nbsp; Berikan Tanggapan</button>
                                        <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-gavel"></i> &nbsp; Pilih Keputusan
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                            {foreach $data.grant_status -> result() as $row}
                                            {if $row->id_status != 5}
                                            <li value="{$row->id_status}"><a href="#">{$row->status}</a></li>
                                            {/if}
                                            {/foreach}
                                          </ul>
                                        </div>
                                        <button type="button" class="btn btn-info" id="pdf" ><i class="fa fa-file-pdf-o"></i> &nbsp;<i class="fa fa-spinner fa-1x fa-spin loading"></i>&nbsp; PDF</button>
                                        
                                        <br/>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th scope="row" width="300px;">Ringkasan</th>
                                      <td colspan="3" id="ringkasan">
                                        <div id="tanggapan">
                                        <label>Tanggapan : </label>
                                        {$data.grant->t_tanggapan}
                                        </div>
                                        <div id="keputusan">
                                        <label>Keputusan Terhadap Grant : </label>
                                        {$rst_status = get_grant_status_by_id($data.grant->t_type)}
                                        <p>{$rst_status->status}</p>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                              </table>
                              
                              <div class="box-header">
                                <h3 class="box-title">Detail Proposal</h3>
                              </div>
                              
                              <hr/>

                              <table class="table table-bordered">
                                  <tbody>
                                    <tr>
                                      <th scope="row" width="300px;">Judul Proposal</th>
                                      <th colspan="3">{$data.grant->proyek_judul}</th>
                                    </tr>
                                    <tr>
                                      <th>Lembaga Pengusul</th>
                                      <td width="300px;">{$data.grant->lembaga_nama}</td>
                                      <td>Tanggal proposal diterima</td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Alamat</th>
                                      <td></td>
                                      <td>Tanggal Final Proposal diperiksa Technical Committee</td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Landscape</th>
                                      <td>{$data.grant->proyek_lansekap}</td>
                                      <td>Tanggal direview Investment Committee</td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Lokasi Kegiatan</th>
                                      <td colspan="3">Desa {$data.grant->proyek_desa}, Kecamatan {$data.grant->proyek_kecamatan}, Kabupaten {$data.grant->proyek_kota}, Provinsi {$data.grant->proyek_provinsi} </td>
                                    </tr>
                                    <tr>
                                      <th>Penerima Manfaat</th>
                                      <td colspan="3">{$data.grant->proyek_manfaat}</td>
                                    </tr>
                                    <tr>
                                      <th>Indikator Capaian Keberhasilan</th>
                                      <td colspan="3">{$data.grant->indikator_nama}</td>
                                    </tr>
                                    <tr>
                                      <th>Durasi Project</th>
                                      <td colspan="2">{$data.grant->proyek_durasi} tahun</td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Jumlah dana</th>
                                      <td colspan="2">
                                          {$dana= get_grant_kegiatan_dana_jumlah($data.grant->id_kegiatan_dana)}
                                          RP. {number_format ($dana->jumlah_dana, 2, ',', '.')}
                                        </td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Dana Per Kegiatan</th>
                                      <td colspan="2">
                                        <ul>
                                          {$rst =  get_grant_kegiatan_dana_lanjut($data.grant->id_kegiatan_dana)}
                                          {foreach $rst->result() as $row}
                                            <li>{$row->nama} : Rp. {number_format ($row->jumlah, 2, ',', '.')} </li>
                                          {/foreach}
                                        </ul>
                                      </td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Jenis Kegiatan</th>
                                      <td colspan="3">{$data.grant->kegiatan_dana_jenis}</td>
                                    </tr>

                                    <tr>
                                      <th>Risalah Proposal</th>
                                      <td colspan="3">
                                        <b>Latar Belakang</b>
                                        <p>{$data.grant->risalah_latar_belakang}</p>
                                        <b>Tujuan</b>
                                        <p>{$data.grant->risalah_tujuan}</p>
                                        <b>Perubahan</b>
                                        <p>{$data.grant->risalah_latar_belakang}</p>
                                        <b>Metode</b>
                                        <p>{$data.grant->risalah_metode}</p>
                                      </td>
                                    </tr>
                                  </tbody>
                              </table>

                              <div class="modal fade" id="add_tanggapan">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <h4 class="modal-title">Berikan Tanggapan</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <textarea class="form-control" id="t_tanggapan" name="t_tanggapan" rows="7"></textarea>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary add_tanggapan">Simpan</button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

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
        $(".loading").hide();
        var editor=CKEDITOR.replace('t_tanggapan'); 
        $(".add_tanggapan").click(function(){
            var value = editor.getData();
            var id_user = $(".id_user").val();
            var id_grant = $(".id_grant").val();
            var data =  " <textarea style=\"display:none;\" name=\"t_tanggapan[]\">"+value+" </textarea>"+
                        " <br/>"+ value +"";
            $.post("{base_url()}grant/todo/save_tanggapan",
            { 
              id_user:id_user,
              id_grant:id_grant,
              t_tanggapan:value
            },
            function(response,status){
              if (response == 1){
                $(".notifikasi").append("<div class=\"callout callout-info\"><h4><span class=\"label label-info\">"+
                "<i class=\"fa fa-check-circle\"></i> &nbsp; Data berhasi disimpan</span></h4></div>");
                $("#ringkasan #tanggapan").html("<label>Tanggapan : </label>"+value);
              } else {
                $(".tanggapan").append("<span class=\"label label-info\">"+
                "<i class=\"fa fa-info-circle\"></i> &nbsp; Data gagal disimpan</span>");
              }
            });
            $("#add_tanggapan").modal('hide');
        });

        $('.dropdown-menu li').click(function(){
          var id_user = $(".id_user").val();
          var id_grant = $(".id_grant").val();
          var type_text = $(this).text();
          var type = $(this).val();
          $.post("{base_url()}grant/todo/save_status",
          { 
            id_user:id_user,
            id_grant:id_grant,
            t_type:type
          },
          function(response,status){
            if (response == 1){
              $(".notifikasi").append("<div class=\"callout callout-info\"><h4><span class=\"label label-info\">"+
              "<i class=\"fa fa-check-circle\"></i> &nbsp; Data berhasi disimpan</span></h4></div>");
              $("#ringkasan #keputusan").html("<label>Keputusan Terhadap Grant :</label> <p>"+type_text+"</p>");
            } else {
              $(".tanggapan").append("<span class=\"label label-info\">"+
              "<i class=\"fa fa-info-circle\"></i> &nbsp; Data gagal disimpan</span>");
            }
          });

          return;
        });


        $('#pdf').click(function(){
          $(".loading").show();
        });
    });
  </script>
{/block}