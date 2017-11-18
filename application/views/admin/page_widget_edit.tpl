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
                
                {if isset($data.alert) and ($data.alert != '')}
                <div class="callout callout-info">
                  <h4>Info!</h4>
                  <p>{$data.alert}</p>
                </div>
                {/if}


                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Edit Widget</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}page/widget/update" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">

                            <input type="hidden" name="id" value="{$data.widget->id_widget}">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">URL</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="name" placeholder="Name Widget" value="{$data.widget->name}" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Content EN</label>
                              <div class="col-sm-10">
                                <textarea  class="form-control" id="keyword" placeholder="Content English" name="content_EN" >{$data.widget->content_EN}</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Content ID</label>
                              <div class="col-sm-10">
                                <textarea  class="form-control" id="keyword" placeholder="Content Indonesia" name="content_ID" >{$data.widget->content_ID}</textarea>
                              </div>
                            </div>


                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">No Urut</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="urutan" placeholder="Name Widget" value="{$data.widget->urutan}" required>
                              </div>
                            </div>

                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}page">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div><!-- /.box-footer -->
                        <br/>
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
<!-- <script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
        CKEDITOR.replace('content_EN');
        CKEDITOR.replace('content_ID');
    });
</script> -->
{/block}