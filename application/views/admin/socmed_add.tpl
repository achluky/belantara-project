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
                    <h3 class="box-title">Add Social Media</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">

                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}socmed/save" name="" method="POST">                       
                        <div class="box-body">
                            <div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="nama" name="nama" placeholder="Nama Social Media" value="" required>
                              </div>
                            </div>
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Link</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="link" name="link" placeholder="Link Social Media" value="" required>
                              </div>
                            </div>
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Urutan</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="urutan" name="urutan" placeholder="Urutan Social Media" value="" required>
                              </div>
                            </div>                            
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Icon</label>
                              <div class="col-sm-10">
                                  <input type="input" class="form-control" id="icon" name="icon" placeholder="Icon Social Media" value="" required>
                              </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}socmed">Cancel</a>
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
          CKEDITOR.replace('content_ID'); 
          CKEDITOR.replace('content_EN');
          CKEDITOR.replace('content_competence_EN');
          CKEDITOR.replace('content_competence_ID');
          CKEDITOR.replace('content_background_EN');
          CKEDITOR.replace('content_background_ID');
          CKEDITOR.replace('content_quality_EN');
          CKEDITOR.replace('content_quality_ID');
          CKEDITOR.replace('content_education_EN');
          CKEDITOR.replace('content_education_ID');
          CKEDITOR.replace('content_facilities_EN');
          CKEDITOR.replace('content_facilities_ID');
          CKEDITOR.replace('content_research_EN');
          CKEDITOR.replace('content_research_ID'); 
          CKEDITOR.replace('address');
        $(".fileinput").fileinput();
      {/literal}
    });
  </script>
{/block}