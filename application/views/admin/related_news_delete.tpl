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
    <div class="col-xs-12">
          {if isset($data.alert) and ($data.alert != '')}
          <div class="callout callout-info">
            <h4>Info!</h4>
            <p>{$data.alert}</p>
          </div>
          {/if}
          <a href="{base_url()}adminrelatednews"><button type="button" class="btn btn-primary">Cancle</button></a>
          <a href="{base_url()}adminrelatednews/delete/{$data.lang}/{$data.id_berita}?n=true"><button type="submit" class="btn btn-danger">Delete</button></a>
    </div>
    <!-- /.col -->
</div>
{/block}
