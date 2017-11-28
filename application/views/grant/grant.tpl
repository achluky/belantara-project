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

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="col-md-12"> -->
                                        <div class="form-group">
                                            <p>Selamat datang {$data.profil->lembaga_nama}</p>
                                            <a href="{base_url()}grant/aplikasi/create/1"><button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-plus"></i>  Buat Proposal</button></a>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <br/>
                <div class="box box-primary">
                  <div class="box-body box-primary">

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width="500px;">Judul Proposal</th>
                                            <th>Tanggal Simpan</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                            <th>Tanggapan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-listener">

                                        {foreach $data.grant -> result() as $row}
                                        <tr>
                                            <td>{$data.no++}</td>
                                            <td>{$row->proyek_judul}</td>
                                            <td>{$row->date_simpan}</td>
                                            <td>{$row->date_kirim}</td>
                                            <td>{$row->status}</td>
                                            <td>
                                            <a href="{base_url()}grant/aplikasi/edit/1" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> &nbsp; sunting</a>
                                            <a  href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".dok_lampiran"><i class="glyphicon glyphicon-remove"></i> &nbsp; hapus</a>
                                            </td>
                                            <td></td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
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
{/block}