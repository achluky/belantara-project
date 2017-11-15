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
                    <h3 class="box-title">Edit slider</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">

                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}slider/update" name="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="{$data.slider->id}">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="username" name="title" placeholder="Title" value="{$data.slider->title}" required><br>
                                <input type="input" class="form-control" id="username" name="title_en" placeholder="Title" value="{$data.slider->title_en}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control textarea" name="deskripsi">{$data.slider->deskripsi}</textarea><br>
                                <textarea class="form-control textarea" name="deskripsi_en">{$data.slider->deskripsi_en}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-10">
                                    
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                        <span class="fileinput-filename"></span>
                                      </div>
                                      <span class="input-group-addon btn btn-default btn-file">
                                      <span class="fileinput-new">Select file</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="image" value=""></span>
                                      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                    <br/>
                                    {if (isset($data.slider->image)) and ($data.slider->image != "") }
                                    <img src="{base_url()}/document/images/slider/{$data.slider->image}"  class="img-rounded img-responsive thumbnail">
                                    {/if}
                                    <i class="text-danger">Maksimal ukuran foto 360x240 pixel dan berekstensi .JPG/jpg/JPEG/jpeg/PNG/png</i>
                              </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}slider">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Update</button>
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
<script>
    $(function () {
        $('.fileinput').fileinput();
    });
  </script>
{/block}