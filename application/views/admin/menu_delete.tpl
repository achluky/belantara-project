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
            <p>
            {if !empty($data.child)}
            Memiliki Child menu :
            <ul>
              {foreach $data.child as $row}
              <li>{if $data.site_lang eq 'EN'}{$row->title_EN}{else}{$row->title_EN}{/if}</li>
              {/foreach}
            </ul>
            {/if}
            </p>
          </div>
          {/if}
          <div>
          </div>
          <a href="{base_url()}main_menu"><button type="button" class="btn btn-default">Cancle</button></a>
          <a href="{base_url()}main_menu/delete/{$data.id}?n=true"><button type="submit" class="btn btn-warning">Delete</button></a>
    </div>
    <!-- /.col -->
</div>
{/block}
