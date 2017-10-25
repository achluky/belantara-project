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
                    <a href="{base_url()}wcu/reserach_publication/kerjasama" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Kerjasama Nasional dan Internasional [WUR.20 WUR.21]
                    </a>
                    <!-- <a href="{base_url()}wcu/reserach_publication/kerjasama_nasional" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Kerjasa Nasional [WUR.21]
                    </a> -->
                    <a href="{base_url()}wcu/reserach_publication/artikel_terindex_scopus" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Artikel Ilmiah yang Terindek Scopus [WUR.22]
                    </a>
                    <a href="{base_url()}wcu/reserach_publication/pusat_unggulan_riset" class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Pusat Unggulan Riset [WUR.23]
                    </a>
                    <a href="{base_url()}wcu/reserach_publication/paten_hki"  class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Paten dan HKI Per Tahun  [WUR.24]
                    </a>
                    <a href="{base_url()}wcu/reserach_publication/inovasi"  class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Inovasi yang Dihasilkan [WUR.25]
                    </a>
                    <a href="{base_url()}wcu/reserach_publication/artikel_terindex_google_scholer"  class="btn btn-block btn-social btn-dropbox">
                      <i class="fa fa-circle-o-notch"></i> Jurnal terindeks Google Scholar [WUR.26] <span class="label label-primary" style="font-size:13px;">Entry</span>
                    </a>
                </div>
                </div>
          </div>
    </div>
{/block}
