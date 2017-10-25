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
                    <h2>Import User</h2>
                  </div>


                {if isset($data.alert) and ($data.alert != '')}
                  <div class="form-group has-error">
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {$data.alert}</label>
                  </div>
                {/if}
                


                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}setting/import_user/act" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">File </label>
                              <div class="col-sm-10">

                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                      <span class="fileinput-filename"></span>
                                      </div>
                                      <span class="input-group-addon btn btn-default btn-file">
                                      <span class="fileinput-new">Select file</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="filexls" value="" required></span>
                                      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                    <p class="help-block">Format Data  : <a href="{base_url()}document/xls/import_user_sample.xlsx"><span class="fa fa-download"></span> Download </a></p>
                              </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}setting">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Import</button>
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