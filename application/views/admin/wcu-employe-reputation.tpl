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
                  <a href="{base_url()}wcu/employee/kompetisi_internasional" class="btn btn-block btn-social btn-dropbox">
                    <i class="fa fa-circle-o-notch"></i> Keikutsertaan dalam kompetisi mahasiswa tingkat internasional [WUR.16]
                  </a>
                  <a href="{base_url()}wcu/employee/publikasi_jurnal_internasional" class="btn btn-block btn-social btn-dropbox">
                    <i class="fa fa-circle-o-notch"></i>Publikasi pada jurnal Internasional [WUR.17]
                  </a>
                  <a href="{base_url()}wcu/employee/keikutsertaan_dosen" class="btn btn-block btn-social btn-dropbox">
                    <i class="fa fa-circle-o-notch"></i>Dosen yang menjadi ketua atau anggota komite pada level internasional [WUR.18]
                  </a>
                  <a href="{base_url()}wcu/employee/employee_survey" class="btn btn-block btn-social btn-dropbox">
                    <i class="fa fa-circle-o-notch"></i> Employee (Alumni) contact survey [WUR.19] <span class="label label-primary" style="font-size:13px;">Entry</span>
                  </a>
              </div>
              </div>
        </div>
  </div>
{/block}
