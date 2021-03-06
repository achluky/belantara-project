{extends file="admin/template.tpl"} 


{block name="addon_styles"}
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
                    <h3 class="box-title">Add Resource</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">

                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}resource/save" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">{$data.label.resource_title}</label>
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
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_summary}</label>
                              <div class="col-sm-10">
                                <textarea class="form-control " rows="3" placeholder="Ringkasan English" name="ringkasan_en" required></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="Ringkasan Indonesia" name="ringkasan_id" required></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_content}</label>
                              <div class="col-sm-10">
                                <textarea class="form-control isi_en" rows="10" placeholder="Isi English" name="isi_en" required></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control isi_id" rows="10" placeholder="Isi Indonesia" name="isi_id" required></textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_keyword}</label>
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
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_file}</label>
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
                                    <i class="text-danger">Maksimal ukuran 5 M dan berekstensi .doc/.pdf/.xlsx</i>
                              </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}resource">{$data.label.resource_cancel}</a>
                              <button type="submit" class="btn btn-info pull-right">{$data.label.resource_save}</button>
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
<script src="{base_url()}assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<!-- <script src="{base_url()}assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
        CKEDITOR.replace('isi_en', {
            filebrowserBrowseUrl: '{base_url()}assets/plugins/filemanager/index.html'
        });
        CKEDITOR.replace('isi_id'); 
        // $(".textarea").wysihtml5();
        $(".fileinput").fileinput();
    });
  </script>
{/block}