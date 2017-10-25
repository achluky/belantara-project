{extends file="admin/template.tpl"} 


{block name="addon_styles"}
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
                <br>
                <div class="block">
                  <div class="block-title">
                    <h2>{lang('navigation.navbar.setting.pengaturan_sistem')}</h2>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}setting/pengaturan_sistem/act" name="" method="POST">
                        
                        <div class="box-body">
                            {foreach $data.list_pengaturan as $row}
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-4 control-label">{$row->nama} </label>
                              <div class="col-sm-7">
                                <input class="form-control" name="pengaturan_sistem[]" value="{$row->nilai}">
                              </div>
                            </div>
                            {/foreach}
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}setting">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Simpan</button>
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