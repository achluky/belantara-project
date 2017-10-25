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
					  <a href="{base_url()}wcu/academic/prestasi_newsletter" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Prestasi IPB (Newsletter) yang tersebar kepada mitra internasional [WUR.11]
					  </a>
					  <a href="{base_url()}wcu/academic/konferensi_internasional" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Tuan rumah konferensi internasional [WUR.12]
					  </a>
					  <a href="{base_url()}wcu/academic/foreign_guests" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i>Tamu asing (tamu MoU, tamu acara seminar, narasumber seminar, dll) [WUR.13]
					  </a>
					  <a href="{base_url()}wcu/academic/program_studi_terakreditasi_internasional" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Program studi terakreditasi internasional [WUR.14]
					  </a>
					  <a href="{base_url()}wcu/academic/academic_survey" class="btn btn-block btn-social btn-dropbox">
						<i class="fa fa-circle-o-notch"></i> Academic contact survey Form [WUR.15] <span class="label label-primary" style="font-size:13px;">Entry</span>
					  </a>
				  </div>
              </div>
        </div>
  </div>
{/block}
