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
                    <h3 class="box-title">Employee Category List</h3>
                    <a href="" class="btn btn-primary" style="float:right;" disabled><i class="glyphicon glyphicon-plus-sign"></i> Add Category</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="20px;">#id</th>
                          <th width="400px;">Kategori</th>
                          <th width="80px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach $data.category_person_list -> result() as $row}
                        <tr>
                          <td>{$row->id}</td>
                          <td>{$row->category}</td>
                          <td>
                              <a href="" class="btn btn-xs" disabled><i class="fa fa-edit fa-fw"></i> Edit</a>
                              <a href="" class="btn btn-xs" disabled><i class="fa fa-remove fa-fw"></i> Delete</a>
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
        $("#example1").DataTable();
      });
    </script>
{/block}