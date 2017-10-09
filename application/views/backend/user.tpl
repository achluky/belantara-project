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
                
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">User List</h3>
                    <a href="{base_url()}user/add"class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add User</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="300px;">Username</th>
                          <th>Terakhir Login</th>
                          <th>Status</th>
                          <th>Group</th>
                          <th width="100px;">Acton</th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach $data.user -> result() as $row}
                        <tr>
                          <td>{$row->username}</td>
                          <td>{$row->last_login}</td>
                          <td>
                              {($row->is_active == 1)?"Aktif":"Tidak Aktif &nbsp;<span class=\"glyphicon glyphicon-share-alt\"></span> Aktif
                              <a href=\"{base_url()}user/active/{$row->id}\"><span class=\"glyphicon glyphicon-ok-circle\"></span></a> "}
                          </td>
                          <td>{groups($row->is_super_admin)}</td>
                          <td>
                              <a href="{base_url()}user/edit/{$row->id}"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                              <a href="{base_url()}user/delete/{$row->id}" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>
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
<script src="{base_url()}assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="{base_url()}assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <script>
      $(function () {
        $("#example1").DataTable({

          "order": [[ 3, "desc" ]]

        });
      });
    </script>
{/block}