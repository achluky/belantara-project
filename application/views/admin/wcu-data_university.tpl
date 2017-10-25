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
                    <a href="{base_url()}wcu/data_university/staff_dosen/departement" class="btn btn-block btn-social btn-dropbox" >
                      <span class="fa fa-circle-o-notch"></span> Academic Faculty Staff (Dosen) ALL [WUR.1]
                    </a>
                    <a href="{base_url()}wcu/data_university/staff_phd/departement" class="btn btn-block btn-social btn-dropbox">
                      <span class="fa fa-circle-o-notch"></span> Academic Faculty Staff with PhD (Dosen S3) [WUR.2]
                    </a>
                    <a href="{base_url()}wcu/data_university/undergraduate_student" class="btn btn-block btn-social btn-dropbox">
                      <span class="fa fa-circle-o-notch"></span> Undergraduate Students [WUR.3]
                    </a>
                    <a href="{base_url()}wcu/data_university/postgraduate_student" class="btn btn-block btn-social btn-dropbox">
                      <span class="fa fa-circle-o-notch"></span> Graduate/Postgraduate Students [WUR.4]
                    </a>
                </div>
                </div>
          </div>
        </div>
    </div>
{/block}