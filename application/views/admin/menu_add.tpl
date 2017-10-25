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
                    Add Menu
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-primary">
                <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}main_menu/save" name="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">
                                Name menu Id
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="menu_id" name="menu_id" placeholder="menu_id" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                Name menu En
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="menu_en" name="menu_en" placeholder="menu_en" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                Posisi
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" name="posisi" placeholder="posisi" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                Jenis Menu
                            </label>
                            <div class="col-sm-10">
                                <select name="link_type" class="form-control" id="link_type">
                                    <option selected="" readonly>
                                        - Pilih Jenis Menu -
                                    </option>
                                    <option value="1">
                                        Halaman
                                    </option>
                                    <option value="2">
                                        Link
                                    </option>
                                    <option value="3">
                                        Module
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div id="row_halaman">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">
                                    Halaman
                                </label>
                                <div class="col-sm-10">
                                    <select name="page_id" class="form-control" id="page_id">
                                        <option selected="" readonly>
                                            - Pilih Halaman -
                                        </option>
                                        {foreach $data.page as $row}
                                        <option value="{$row->id}">
                                            {if $data.site_lang eq 'EN'}{$row->
                                            title_EN}{else}{$row->
                                            title_ID}{/if}
                                        </option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="row_link">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">
                                    Tautan/Link
                                </label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="link" name="link" placeholder="tautan / link" value=""/>
                                </div>
                            </div>
                        </div>
                        <div id="row_module">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">
                                    Nama Module
                                </label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="name_module" name="name_module" placeholder="nama module" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                URL
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="url" name="url" placeholder="nama module" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                URI
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="uri" name="uri" placeholder="nama module" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Parent
                            </label>
                            <div class="col-sm-10">
                                <input type="radio" name="is_parent" id="yes_parent"  value="1" required/>
                                Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="is_parent" id="no_parent" value="0" required/>
                                Tidak
                            </div>
                        </div>
                        <div id="show_parent" style='display:none'>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">
                                    Have Child
                                </label>
                                <div class="col-sm-10">
                                    <input type="radio" name="have_child"  value="1"/>
                                    Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="have_child" value="0"/>
                                    Tidak
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Mega Menu
                                </label>
                                <div class="col-sm-10">
                                    <input type="radio" name="is_megamenu"  id="yes_megamenu" value="1"/>
                                    Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="is_megamenu" id="no_megamenu" value="0"/>
                                    Tidak
                                </div>
                            </div>
                        </div>
                        <div id="hide_parent" style='display:none'>
                            <div id="parent">
                              <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">
                                        Pilih Menu Parent
                                    </label>
                                    <div class="col-sm-10">
                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option selected="" readonly>
                                                - Pilih Menu Parent -
                                            </option>
                                            {foreach $data.menuparent->
                                            result() as $menuparent}
                                            <option value="{$menuparent->id}">
                                                {if $data.site_lang eq 'EN'}
                                                {$menuparent->
                                                title_EN}
                                                {else}
                                                {$menuparent->
                                                title_ID}
                                                {/if}
                                            </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="megamenu" style="display:none">
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">
                                        Grup Megamenu
                                    </label>
                                    <div class="col-sm-10">
                                        <select name="group_id" class="form-control" id="page_id">
                                            <option selected="" readonly>
                                                - Pilih group -
                                            </option>
                                            {foreach $data.groupmenu as $row}
                                            <option value="{$row->id}">
                                                {if $data.site_lang eq 'EN'}{$row->
                                                title_EN}{else}{$row->
                                                title_ID}{/if}
                                            </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                Aktif
                            </label>
                            <div class="col-sm-10">
                                <input type="radio" name="show_menu"  id="yes_megamenu" value="1"/>
                                Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="show_menu" value="0"/>
                                Tidak
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <label for="inputPassword3" class="col-sm-2 control-label">
                            &nbsp;
                        </label>
                        <a href="{base_url()}menu">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-info pull-right">
                            Save
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
<script type="text/javascript">

    function menu_parent(id){
      $.ajax({
            type: "POST",
            data: { 'parent_id': id },
            dataType: "JSON",
            url: "{base_url()}main_menu/ajax_parent_isMegamenu",
            success: function (data) {
                if(data == '1'){
                  $('#megamenu').show();
                }else{
                  $('#megamenu').hide();
                }
            }
        });
    }

    $(function() {
      $('#row_halaman').hide();
      $('#row_link').hide();
      $('#row_module').hide();
      
      $('#link_type').change(function(){
        if($('#link_type').val() == '1') {
        $('#row_halaman').show();
        $('#row_link').hide();
        $('#row_module').hide();
      }
      if($('#link_type').val() == '2') {
        $('#row_halaman').hide();
        $('#row_link').show();
        $('#row_module').hide();
      }
    
      if($('#link_type').val() == '3') {
        $('#row_halaman').hide();
        $('#row_link').hide();
        $('#row_module').show();
      }
    });

    $('#parent_id').change(function () {
        // assign the value to a variable, so you can test to see if it is working
        var parent_id = $('#parent_id :selected').val();
        menu_parent(parent_id);
    });

    $('input[name=is_megamenu]').click(function () {
    if (this.id == "yes_megamenu") {
    $("#megamenu").show();
    } else {
    $("#megamenu").hide();
    }
    });
    $('input[name=is_parent]').click(function () {
    if (this.id == "yes_parent") {
    $("#show_parent").show();
    $("#hide_parent").hide();
    }
    if(this.id == "no_parent"){
    $("#show_parent").hide();
    $('#hide_parent').show();
    }
    });
    });
</script>
{/block}
