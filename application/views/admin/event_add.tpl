{extends file="admin/template.tpl"} 


{block name="addon_styles"}
<link href="{base_url()}assets/plugins/bootstrap-daterangepicker-master/daterangepicker.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="{base_url()}assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="{base_url()}assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" media="screen">
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
                    <h3 class="box-title">Add Event</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">

                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}event/save" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">


                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="judul_en" placeholder="Judul English" value="" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="judul_id" placeholder="Judul Indonesia" value="" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Ringkasan</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="Ringkasan English" name="ringkasan_en" required></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="Ringkasan Indonesia" name="ringkasan_id" required></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Isi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="Isi English" name="isi_en" required></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control textarea" rows="3" placeholder="Ringkasan Indonesia" name="isi_id" required></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Keyword</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="keyword" placeholder="Keyword English" name="keyword_en" value="" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="keyword" placeholder="Keyword Indonesia" name="keyword_id" value="" required>
                              </div>
                            </div>
                            
                            

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Rentang Waktu</label>
                              <div class="col-sm-10">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="waktu" value="" class="form-control pull-right active" id="waktu" required>
                                  </div>
                              </div>
                            </div>


                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-10">
                                    
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                      <span class="fileinput-filename"></span>
                                      </div>
                                      <span class="input-group-addon btn btn-default btn-file">
                                      <span class="fileinput-new">Select file</span>
                                      <span class="fileinput-exists">Change</span>
                                      <input type="file" name="image" value="" required></span>
                                      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                              </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}event">Cancel</a>
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
<script type="text/javascript" src="{base_url()}assets/plugins/bootstrap-daterangepicker-master/moment.min.js"></script>
<script type="text/javascript" src="{base_url()}assets/plugins/bootstrap-daterangepicker-master/daterangepicker.js"></script>
<script src="{base_url()}assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
      {literal}
          CKEDITOR.replace('isi_id'); 
          CKEDITOR.replace('isi_en'); 
        $(".fileinput").fileinput();
        $('#waktu').daterangepicker({
                      timePickerIncrement: 30,
                      locale: {
                          format: 'DD/MM/YYYY',
                          cancelLabel: 'Clear'
                      }
                });
      {/literal}
    });
  </script>
{/block}