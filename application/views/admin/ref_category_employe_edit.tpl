{extends file="admin/template.tpl"} 

{block name="addon_styles"}
{/block}

{block name="breadcrumb"}
    <i class="glyphicon glyphicon-home">
    </i>
    {$stopbreadcrumb = 0}
      {foreach $data.breadcrumb as $label => $value}
        {if $stopbreadcrumb++ < count($data.breadcrumb)-1}
    <li>
        <a href="{$value}">
            {$label}
        </a>
    </li>
    {else}
    <li>
        {$label}
    </li>
    {/if}
      {/foreach}
{/block}


{block name="content"}
    <div class="row">
        <div class="col-xs-12">
            {if isset($data.alert) and ($data.alert != '')}
            <div class="callout callout-info">
                <h4>
                    Info!
                </h4>
                <p>
                    {$data.alert}
                </p>
            </div>
            {/if}
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Edit Category Employee</h3>
                </div>
                <!-- /.box-header -->
                <form action="{base_url()}referensi/category_update" class="form-horizontal" method="POST" name="">
                    <div class="box-body box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <input name="id" hidden value="{$data.category->id}">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                    {$data.label.category}
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="category_ID" placeholder="Kategori Indonesia" required="" type="input" value="{$data.category->category_ID}">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="category_EN" placeholder="Category On English" required="" type="input" value="{$data.category->category_EN}">
                                    </input>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                        </label>
                        <a href="{base_url()}referensi/category">
                            Cancel
                        </a>
                        <button class="btn btn-info pull-right" type="submit">
                            update
                        </button>
                    </div>
                    <br/>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</link>
{/block}


{block name="addon_scripts"}
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js">
</script>
<script charset="utf-8" src="{base_url()}assets/js/validator.min.js" type="text/javascript">
</script>
<script>
    $(function () {
        CKEDITOR.replace('content_EN');
        CKEDITOR.replace('content_ID');
    });
</script>
{/block}
