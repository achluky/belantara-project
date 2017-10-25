{extends file="admin/template.tpl"} 
{block name="addon_styles"}
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
                    <h3 class="box-title">Edit Incidental: {$data.incidental->content_text_id}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body box-primary">
                    <form class="form-horizontal" action="{base_url()}incidental/update" name="" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <input type="hidden" name="id" value="{$data.incidental->id_incidental}">
                            {*                            <input type="hidden" name="id_bahasa" value="{$data.news->id_bahasa}">*}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{$data.label.content_text_id}</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="content_text_id" name="content_text_id" placeholder="Content Text Indonesia" value="{$data.incidental->content_text_id}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.content_text_en}</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="content_text_en" name="content_text_en" placeholder="Content Text English" value="{$data.incidental->content_text_en}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Link/Alamat</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="link" name="link" placeholder="Alamat / link" value="{$data.incidental->link}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Aktif</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="aktif" id="aktif1" value="1" {if $data.incidental->aktif eq 1} checked {/if} required>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="aktif" id="aktif2" value="0" {if $data.incidental->aktif eq 0} checked {/if} required>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <a href="{base_url()}incidental">Cancel</a>
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
    <script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
{/block}