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
                    <h3 class="box-title">Event List</h3>
                    <a href="{base_url()}event/add"class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add EVENT</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="500px;">{$data.label.tabel_title}</th>
                          <th>{$data.label.tabel_start}</th>
                          <th>{$data.label.tabel_end}</th>
                          <th width="20px;">{$data.label.tabel_lang}</th>
                          <th width="150px;">{$data.label.table_action}</th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach $data.event_list -> result() as $row}
                        <tr>
                          <td>{$row->judul}</td>
                          <td>{convert_date($row->waktu)}</td>
                          <td>{convert_date($row->berakhir)}</td>
                          <td>{$row->id_bahasa}</td>
                          <td>
                              <a href="{base_url('event')}/{strtolower($row->id_bahasa)}/{convert_date_format('Y', $row->waktu)}/{convert_date_format('m', $row->waktu)}/{slug($row->judul)}/{$row->id_event}"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> view</a>
                              <a href="{base_url()}event/edit/{$row->id_bahasa}/{$row->id_event}"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                              <a href="{base_url()}event/delete/{$row->id_event}" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>
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

          "order": [[ 1, "desc" ]]
        });
      });
    </script>
{/block}