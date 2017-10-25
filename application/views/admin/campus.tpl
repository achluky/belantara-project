{extends file="admin/template.tpl"} 

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
                <br>
                <div class="block">
                  <div class="block-title">
                    <h3>Campus List</h3>
                  </div>
                  <!-- /.box-header -->
                  <a href="{base_url()}campus/add"class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add campus</a>
                  <br><hr>
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="50px;">No</th>
                          <th width="500px;">Nama</th>
                          <th width="500px;">Alamat</th>
                          <th width="500px;">Isi</th>
                          <th width="150px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach $data.campus_list ->result() as $row}
                          <tr>
                              <td>
                                  {$row->id}
                              </td>
                              <td>
                                {if $data.lang eq 'EN'}
                                  {$row->nama_en}
                                {else}
                                  {$row->nama}
                                {/if}
                              </td>
							  <td>
                                {if $data.lang eq 'EN'}
                                  {$row->alamat_en}
                                {else}
                                  {$row->alamat}
                                {/if}
                              </td>
							  <td>
                                {if $data.lang eq 'EN'}
                                  {$row->isi_en}
                                {else}
                                  {$row->isi}
                                {/if}
                              </td>
							  
                              <td>
                                <a href="{base_url()}campus/detail/{$row->id}"  class="btn btn-xs">
                                    <i class="fa fa-eye fa-fw">
                                    </i>
                                    Details
                                </a>
                                <a href="{base_url()}campus/edit/{$row->id}"  class="btn btn-xs">
                                    <i class="fa fa-edit fa-fw">
                                    </i>
                                    Edit
                                </a>
                                <a href="{base_url()}campus/delete/{$row->id}" class="btn btn-xs">
                                    <i class="fa fa-remove fa-fw">
                                    </i>
                                    Delete
                                </a>
                              </td>
                          </tr>
                        {/foreach}
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}
<!-- DATA TABELS SCRIPT -->
<script src="{base_url()}assets/plugins/datatables/jquery.dataTables.js" type="text/javascript">
</script>
<script src="{base_url()}assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript">
</script>
<script>
    $(function () {
    $("#example1").DataTable();
    });
</script>
{/block}