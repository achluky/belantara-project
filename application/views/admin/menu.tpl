{extends file="admin/template.tpl"}
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
        <div class="box box-default box-solid collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Preview Main Menu
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-plus">
                        </i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <iframe src="{base_url()}main_menu/menu_dynamic" width="100%" height="370px">
                </iframe>
            </div>
            <!-- /.box-body -->
        </div>
        <br/>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab" aria-expanded="true">
                        Main Menu
                    </a>
                </li>
                <li class="">
                    <a href="#tab_2" data-toggle="tab" aria-expanded="false">
                        Group Menu
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="">
                        <div class="box-header">
                            <h3 class="box-title">
                                Menu List
                            </h3>
                            <a href="{base_url()}main_menu/add"class="btn btn-primary" style="float:right;">
                                <i class="glyphicon glyphicon-plus-sign">
                                </i>
                                Add Menu
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="20px;">
                                            #id
                                        </th>
                                        <th width="400px;">
                                            Judul
                                        </th>
                                        <th>
                                            Aktif
                                        </th>
                                        <th>
                                            Posisi
                                        </th>
                                        <th width="40px;">
                                            Parent/Child
                                        </th>
                                        <th width="140px;">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $data.menu_list ->
                                    result() as $row}
                                    <tr>
                                        <td>
                                            {$row->
                                            id}
                                        </td>
                                        <td>
                                            {if $data.lang eq 'EN'}
                                            {$row->
                                            title_EN}
                                            {else}
                                            {$row->
                                            title_ID}
                                            {/if}
                                        </td>
                                        <td>
                                            {if $row->
                                            show_menu eq '1'}
                                            Ya
                                            {else}
                                            Tidak
                                            {/if}
                                        </td>
                                        <td>
                                            {$row->
                                            position}
                                        </td>
                                        <td>
                                            {if $row->
                                            is_parent == 1}
                                            Parent
                                            {else}
                                            Child From Id {$row->
                                            parent_id}
                                            {/if}
                                        </td>
                                        <td>
                                            <a href="{base_url()}main_menu/edit/{$row->id}"  class="btn btn-xs">
                                                <i class="fa fa-edit fa-fw">
                                                </i>
                                                Edit
                                            </a>
                                            <a href="{base_url()}main_menu/delete/{$row->id}" class="btn btn-xs">
                                                <i class="fa fa-remove fa-fw">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="">
                        <div class="box-header">
                            <h3 class="box-title">
                                Menu List
                            </h3>
                            <a href="{base_url()}main_menu/add_group"class="btn btn-primary" style="float:right;">
                                <i class="glyphicon glyphicon-plus-sign">
                                </i>
                                Add Menu
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="20px;">
                                            #id
                                        </th>
                                        <th width="400px;">
                                            Nama EN
                                        </th>
                                        <th>
                                            Nama ID
                                        </th>
                                        <th width="140px;">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $data.group_list as $group}
                                    <tr>
                                        <td>
                                            {$group->
                                            id}
                                        </td>
                                        <td>
                                            {$group->
                                            title_EN}
                                        </td>
                                        <td>
                                            {$group->
                                            title_ID}
                                        </td>
                                        <td>
                                            <a href="{base_url()}main_menu/edit_group/{$group->id}"  class="btn btn-xs">
                                                <i class="fa fa-edit fa-fw">
                                                </i>
                                                Edit
                                            </a>
                                            <a href="{base_url()}main_menu/delete_group/{$group->id}" class="btn btn-xs">
                                                <i class="fa fa-remove fa-fw">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.box -->
    </div>
    <br/>
</div>
{/block}
{block name="addon_scripts"}
<!--
    DATA TABELS SCRIPT
-->
<script src="{base_url()}assets/plugins/datatables/jquery.dataTables.js" type="text/javascript">
</script>
<script src="{base_url()}assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript">
</script>
<script>
    $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    });
</script>
{/block}
