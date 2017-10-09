{extends file="admin/template.tpl"}
{block name="addon_styles"}
{/block}
{block name="breadcrumb"}
<i class="glyphicon glyphicon-home">
</i>
&nbsp;
{$stopbreadcrumb = 0}
{foreach $data.breadcrumb as $label =>
$value}
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
                <h3 class="box-title">
                    Edit Group Menu
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-primary">
                <form class="form-horizontal" action="{base_url()}main_menu/update_group" name="" method="POST">
                    <div class="box-body">
                        <input type="hidden" name="id" value="{$data.groupmenu->id}">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">
                                Name menu Id
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="title_ID" name="title_ID" placeholder="group menu indonesia" value="{$data.groupmenu->title_ID}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                Name menu En
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="title_ID" name="title_EN" placeholder="group menu english" value="{$data.groupmenu->title_EN}"/>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <label for="inputPassword3" class="col-sm-2 control-label">
                            &nbsp;
                        </label>
                        <a href="{base_url()}main_menu">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-info pull-right">
                            update
                        </button>
                    </div>
                    <!-- /.box-footer -->
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
{/block}
