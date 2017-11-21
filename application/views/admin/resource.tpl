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
                    <h3 class="box-title">Resource List</h3>
                    <a href="{base_url()}resource/add"class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add Resource</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="20px;">No</th>
                          <th width="400px;">{$data.label.tabel_title}</th>
                          <th width="100px;">{$data.label.tabel_date}</th>
                          <th width="20px;">{$data.label.tabel_lang}</th>
                          <th width="150px;">{$data.label.table_action}</th>
                        </tr>
                      </thead>
                      <tbody>
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
        table = $('#example1').DataTable({
 
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
   
          // Load data for the table's content from an Ajax source
          "ajax": {
              "url": "{base_url()}resource/resource_list",
              "type": "POST"
          },
   
          //Set column definition initialisation properties.
          "columnDefs": [
            {
              "targets": [ -1 ], //last column
              "orderable": false, //set not orderable
            },
          ],
   
        });
      });
    </script>
{/block}