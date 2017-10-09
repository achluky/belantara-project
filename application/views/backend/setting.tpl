{extends file="admin/template.tpl"} 
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
          <div class="box">
                <div class="box-body">
                    <a href="{base_url()}setting/import_user" class="btn btn-block btn-social btn-dropbox" >
                      <span class="glyphicon glyphicon-user"></span> Import User
                    </a>
                </div>
          </div>
    </div>
{/block}