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
                    <h3 class="box-title">Edit Menu</h3>
                  </div>
                  <!-- /.box-header -->

                  <div class="box-body box-primary">
                      <form class="form-horizontal" action="{base_url()}main_menu/update" name="" method="POST">
                        <div class="box-body">
                            <input type="hidden" name="id" value="{$data.menu->id}">
                            <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">
                                Name menu Id
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="menu_id" name="menu_id" placeholder="menu_id" value="{$data.menu->title_ID}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                Name menu En
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="menu_en" name="menu_en" placeholder="menu_en" value="{$data.menu->title_EN}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                Posisi
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" name="posisi" placeholder="posisi" value="{$data.menu->position}" />
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
                                    <option value="1" {if $data.menu->link_type eq '1'}Selected{/if}>
                                        Halaman
                                    </option>
                                    <option value="2" {if $data.menu->link_type eq '2'}Selected{/if}>
                                        Link
                                    </option>
                                    <option value="3" {if $data.menu->link_type eq '3'}Selected{/if}>
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
                                        <option value="{$row->id}" {if $row->id eq $data.menu->page_id}Selected{/if}>
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
                                    <input type="input" class="form-control" id="link" name="link" placeholder="tautan / link" value="{$data.menu->url}"/>
                                </div>
                            </div>
                        </div>
                        <div id="row_module">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">
                                    Nama Module
                                </label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="name_module" name="name_module" placeholder="nama module" value="{$data.menu->module_name}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                URL
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="url" name="url" placeholder="nama module" value="{$data.menu->url}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                URI
                            </label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="uri" name="uri" placeholder="nama module" value="{$data.menu->uri}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Parent
                            </label>
                            <div class="col-sm-10">
                                <input type="radio" name="is_parent" id="yes_parent"  value="1" {if $data.menu->is_parent eq '1'}Checked{/if} required/>
                                Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="is_parent" id="no_parent" value="0" {if $data.menu->is_parent eq '0'}Checked{/if} required/>
                                Tidak
                            </div>
                        </div>
                        <div id="show_parent" style='display:none'>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">
                                    Have Child
                                </label>
                                <div class="col-sm-10">
                                    <input type="radio" name="have_child"  value="1" {if $data.menu->have_child eq '1'}Checked{/if}/>
                                    Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="have_child" value="0" {if $data.menu->have_child eq '0'}Checked{/if}/>
                                    Tidak
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Mega Menu
                                </label>
                                <div class="col-sm-10">
                                    <input type="radio" name="is_megamenu"  id="yes_megamenu" value="1" {if $data.menu->is_megamenu eq '1'}Checked{/if}/>
                                    Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="is_megamenu" id="no_megamenu" value="0" {if $data.menu->is_megamenu eq '0'}Checked{/if}/>
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
                                            <option value="{$menuparent->id}" {if $data.menu->parent_id eq $menuparent->id}Selected{/if}>
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
                                            <option value="{$row->id}" {if $data.menu->dyn_group_id eq $row->id}Selected{/if}>
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
                                <input type="radio" name="show_menu"  id="yes_megamenu" value="1" {if $data.menu->show_menu eq '1'}Checked{/if} />
                                Ya  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="show_menu" value="0" {if $data.menu->show_menu eq '0'}Checked{/if} />
                                Tidak
                            </div>
                        </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}main_menu">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">update</button>
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
      var jenis_menu = {$data.menu->link_type};

      if(jenis_menu == 1){
        $('#row_halaman').show();
        $('#row_link').hide();
        $('#row_module').hide();
      }
      if(jenis_menu == 2){
        $('#row_halaman').hide();
        $('#row_link').show();
        $('#row_module').hide();
      }
      if(jenis_menu == 3){
        $('#row_halaman').hide();
        $('#row_link').hide();
        $('#row_module').show();
      }

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

    // cek jika dia anak dari megamenu
    var parentid = {$data.menu->parent_id};
    if(parentid != 0){
      menu_parent(parentid);
    }

    $('#parent_id').change(function () {
        // assign the value to a variable, so you can test to see if it is working
        var parent_id = $('#parent_id :selected').val();
        menu_parent(parent_id);
    });

    // cek megamenu
    var mega_menu = {$data.menu->is_megamenu};
    if(mega_menu == 1){
      $("#megamenu").show();
    }else{
      $("#megamenu").hide();
    }

    $('input[name=is_megamenu]').click(function () {
      if (this.id == "yes_megamenu") {
        $("#megamenu").show();
      } else {
        $("#megamenu").hide();
      }
    });
    
    // cek parent atau tidak
    var isparent = {$data.menu->is_parent};

    if(isparent == 1){
      $("#show_parent").show();
      $("#hide_parent").hide();
    }else{
      $("#show_parent").hide();
      $('#hide_parent').show();  
    }

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