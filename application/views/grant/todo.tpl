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
                        <div class="box-body">
                            <div class="row">

                                <div class="box-header">
                                  <h3 class="box-title">Todo List Proposal</h3>
                                </div>

                                <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width="350px;">Judul Proposal</th>
                                            <th>Tanggal Diterima</th>
                                            <th>On Status</th>
                                            <th>Tindakan</th>
                                            <th width="200px;">Tanggapan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-listener">
                                        {if $data.grant != NULL}
                                          {foreach $data.grant -> result() as $row}
                                          <tr>
                                              <td>{$data.no++}</td>
                                              <td>{$row->proyek_judul}</td>
                                              <td>{date("d-m-Y", strtotime($row->t_date))}</td>
                                              <td>{$row->status}</td>
                                              <td>
                                                  <div class="btn-group pull-left">

                                                    <a href="{base_url()}grant/aplikasi/view/{$row->id_grant}"><span class="badge bg-red">view detail</span></a>
                                                  </div>
                                              </td>
                                              <td>{(isset($row->t_tanggapan))?$row->t_tanggapan:"-"}</td>
                                          </tr>
                                          {/foreach}
                                        {else}
                                          <tr>
                                            <td>Anda Tidak Memiliki Proposal</td>
                                        </tr>
                                        {/if}
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