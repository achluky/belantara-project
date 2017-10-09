{extends file="admin/template.tpl"} 


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
                
                <div class="block">
                  

                  <div class="block-title">
                    <h2>Import User Confirm</h2>
                  </div>

                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}setting/import_user/act/true" name="" method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th width="15px;">#</th>
                                    <th>Username</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {foreach from=$data.data_xls key=k item=v}
                                  <tr>
                                    <td>{$k}</td>
                                    <td>{$v['A']} <input type="hidden" name="username[]" value="{$v['A']}" /></ins></td>
                                  </tr>
                                    {/foreach}
                                </tbody>
                              </table>

                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}setting/import_user">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div><!-- /.box-footer -->

                      </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}
<script src="{base_url()}assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
        $(".fileinput").fileinput();          
    });
  </script>
{/block}