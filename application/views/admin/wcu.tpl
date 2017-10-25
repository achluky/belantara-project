{extends file="admin/template.tpl"} 
{block name="breadcrumb"}
      <i class="glyphicon glyphicon-home"></i> &nbsp;
	  {$stopbreadcrumb = 0}
      {foreach $breadcrumb as $label => $value}
		{if $stopbreadcrumb++ < count($breadcrumb)-1}
			<li><a href="{$value}">{$label}</a></li>
		{else}
			<li>{$label}</li>
		{/if}
      {/foreach}
{/block}
{block name="content"}
  <div class="row">
        <div class="col-xs-12">
              <div class="block">
				  <div class="box-body">
					  <a href="{base_url()}wcu/academic" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Academic Reputation
					  </a>
					  <a href="{base_url()}wcu/employee" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Employee Reputation
					  </a>
					  <a href="{base_url()}wcu/internationalization" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i>Internasionalization	
					  </a>
					  <a href="{base_url()}wcu/reserach_publication" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Reserach and Publication
					  </a>
					  <a href="{base_url()}wcu/data_university" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Data University
					  </a>
				  </div>
              </div>
        </div>
  </div>
{/block}