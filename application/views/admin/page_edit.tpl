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
                    <h3 class="box-title">Edit Page</h3>
                </div>

                <!-- /.box-header -->
                <form action="{base_url()}page/update" class="form-horizontal" method="POST" name="">

                    <div class="box-body box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <input name="id" hidden value="{$data.page->id}">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                    Judul
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="title_EN" placeholder="Judul English" required="" type="input" value="{$data.page->title_EN}">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="title_ID" placeholder="Judul Indonesia" required="" type="input" value="{$data.page->title_ID}">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                    Keyword
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="keyword" name="keyword_EN" placeholder="Keyword English" required="" type="input" value="{$data.page->keyword_EN}">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="keyword" name="keyword_ID" placeholder="Keyword Indonesia" required="" type="input" value="{$data.page->keyword_ID}">
                                    </input>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                    URL
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="keyword" name="url" placeholder="Alamat URL" required="" type="input" value="{$data.page->url}">
                                    </input>    
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Template</label>
                              <div class="col-sm-10">
                                <select name="" class="form-control">
                                  <option value="">-Pilih Template-</option>
                                </select>
                              </div>
                            </div>
                            
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                        </label>
                        <a href="{base_url()}page">
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
