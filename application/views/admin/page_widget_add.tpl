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
                    <h3 class="box-title">Add Widget</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}page/widget/save" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nama Widget</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="name" placeholder="Name Widget" value="" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Tipe Widget</label>
                              <div class="col-sm-10">
                                <select class="form-control tipe_widget" name="tipe">
                                  <option value="text">Text</option>
                                  <option value="img">Image</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group content_EN">
                              <label for="inputPassword3" class="col-sm-2 control-label">Content EN</label>
                              <div class="col-sm-10 ">
                                <textarea  class="form-control" id="content_EN" placeholder="Content English" name="content_EN" ></textarea>
                              </div>
                            </div>

                            <div class="form-group content_ID">
                              <label for="inputPassword3" class="col-sm-2 control-label">Content ID</label>
                              <div class="col-sm-10 ">
                                <textarea  class="form-control" id="content_ID" placeholder="Content Indonesia" name="content_ID" ></textarea>
                              </div>
                            </div>

                            <div class="form-group img_ID">
                              <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-10 ">
                                <input type="file" name="content_ID" class="form-control">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">No Urut</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="urutan" placeholder="No Urut" value="" required>
                              </div>
                            </div>


                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}page">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Save</button>
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
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
        CKEDITOR.replace('content_EN');
        CKEDITOR.replace('content_ID');

        $(".img_ID").hide();
        $(".tipe_widget").change(function(){

           if($(".tipe_widget").val() == 'img'){
              $(".content_ID").hide();
              $(".content_EN").hide();
              $(".img_ID").show();
           }
           else{
              $(".content_ID").show();
              $(".content_EN").show();
           }
        });
    });
</script>
{/block}