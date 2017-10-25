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
                    <a href="{base_url()}wcu/internationalization/inbound" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Undergraduate Inbound Exchange Students [WUR.5] dan Graduate/Postgraduate Inbound Exchange Students [WUR.7]
                    </a>
                    <a href="{base_url()}wcu/internationalization/undergraduate_outbound" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Undergraduate Outbound Exchange Students [WUR.6]
                    </a>
                    <a href="{base_url()}wcu/internationalization/postgraduate_outbound" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Graduate/Postgraduate Outbound Exchange Students [WUR.8]
                    </a>
                    <a href="{base_url()}wcu/internationalization/laboratorium_sertifikasi_internasional" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Laboratorium yang mendapatkan sertifikasi internasional [WUR.9]
                    </a>
                    <a href="{base_url()}wcu/internationalization/penghargaan_dosen_internasional" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Penghargaan internasional yang diperoleh dosen [WUR.10]
                    </a>
                </div>
                </div>
          </div>
    </div>
{/block}