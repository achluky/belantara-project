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

                  <ul class="nav nav-pills nav-justified">
                    <li role="presentation" class="{($data.site_lang == 'ID')?'active':''}"><a href="{base_url()}lang/s/ID?url={$data.url}"><img src="{base_url()}assets/img/id.png" alt="ID"> Indonesia</a></li>
                    <li role="presentation" class="{($data.site_lang == 'EN')?'active':''}"><a href="{base_url()}lang/s/EN?url={$data.url}"><img src="{base_url()}assets/img/en.png" alt="ID"> English</a></li>
                  </ul>
                  <br/>
                  
                  <div class="box-header">
                    <h3 class="box-title">Edit resource : {$data.resource->judul}</h3>
                  </div>
                  <!-- /.box-header -->



                  <div class="box-body box-primary">
                      <form class="form-horizontal" action="{base_url()}resource/update" name="" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <input type="hidden" name="id" value="{$data.resource->id_berita}">
                            <input type="hidden" name="id_bahasa" value="{$data.resource->id_bahasa}">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">{$data.label.resource_title}</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="judul" placeholder="{$data.label.resource_title}" value="{quotes_to_entities($data.resource->judul)}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_summary}</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="{$data.label.resource_summary}" name="ringkasan" required>{$data.resource->ringkasan}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_contet}</label>
                              <div class="col-sm-10">
                                <textarea class="form-control textarea" rows="10" placeholder="{$data.label.resource_contet}" name="isi" required>{$data.resource->isi}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_keyword}</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="keyword" placeholder="{$data.label.resource_keyword}" name="keyword" value="{$data.resource->keyword}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.resource_file}</label>
                              <div class="col-sm-10">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                      <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                      <input type="file" name="image" value="" >
                                      <input type="input" name="image" value="{$data.resource->image}">
                                      </span>
                                      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    {if (isset($data.resource->image)) and ($data.resource->image != "") }
                                    <img src="{base_url()}document/resource/{$data.resource->image}"  class="img-rounded img-responsive thumbnail">
                                    {/if}
                              </div> 
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}resource">{$data.label.resource_cancel}</a>
                              <button type="submit" class="btn btn-info pull-right">{$data.label.resource_update}</button>
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
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script>
    $(function () {
        CKEDITOR.replace('isi'); 
        $('.fileinput').fileinput();
    });
  </script>
{/block}