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
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4>Info!</h4>
                  <p>{$data.alert}</p>
                </div>
                {/if}

                <div class="box box-primary">
                  <div class="box-body box-primary">
                        <div class="box-body">
                            <div class="row">

                                <div class="box-header">
                                  <h3 class="box-title">List Proposal</h3>
                                </div>

                                <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Proposal</th>
                                            <th>Tanggal Simpan</th>
                                            <th>Tanggal Kirim</th>
                                            {* <th>Status</th> *}
                                        </tr>
                                    </thead>
                                    <tbody id="add-listener">
                                        {if $data.grant != NULL}
                                          {foreach $data.grant -> result() as $row}
                                          <tr>
                                              <td>{$data.no++}</td>
                                              <td>{$row->proyek_judul}</td>
                                              <td>{date("d/m/Y", strtotime($row->date_simpan))}</td>
                                              <td>{date("d/m/Y", strtotime($row->date_kirim))}</td>
                                              {* {$status_grant = get_grant_status_by_id($row->t_type)} *}
                                              {* <td>{$status_grant->status}</td> *}
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