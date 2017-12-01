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
                    <h3 class="box-title">Page Widget List</h3>

                    <div class="btn-group pull-right">

                        <a href="{base_url()}page/add" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-plus-sign"></i> Add Page</a> 
                        <a href="{base_url()}page/widget/add" class="btn btn-danger" type="button" ><i class="glyphicon glyphicon-plus-sign"></i> Add Widget</a>

                    </div>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="20px;">#id</th>
                          <th width="200px;">Name</th>
                          <th width="30px;">Tipe</th>
                          <th width="200px;">Content</th>
                          <th width="20px;">Urutan</th>
                          <th width="20px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach $data.widget -> result() as $row}
                        <tr>
                          <td>{$row->id_widget}</td>
                          <td>{$row->name}</td>
                          <td>{$row->tipe}</td>
                          <td>{if $data.site_lang eq 'EN'}
                                {$row->content_EN}
                              {else}
                                {$row->content_ID}
                              {/if}
                          </td>
                          <td>
                            {$row->urutan}
                          </td>
                          <td>
                              <a href="{base_url()}page/widget/edit/?id={$row->id_widget}"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                              <a href="{base_url()}page/widget/delete/?id={$row->id_widget}" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>
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