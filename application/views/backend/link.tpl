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
              <form action="{base_url()}link/update" name="" method="POST">
                <a href="{base_url()}link/add"class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Link</a>
                <a href="{base_url()}link/update"><button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Update Sorted Link</button></a>
                <br/><br/>

                {if isset($data.alert) and ($data.alert != '')}
                <div class="callout callout-info">
                  <h4>Info!</h4>
                  <p>{$data.alert}</p>
                </div>
                {/if}

                <div id="sortable">
                {foreach $data.link->result() as $row}
                  <div class="box box-primary">
                    <div class="box-header">
                      <span class="glyphicon glyphicon-link"></span>
                      {if $data.lang == "ID"}
                      <h3 class="box-title">{$row->nama_links_ID}</h3>
                      {else}
                      <h3 class="box-title">{$row->nama_links_EN}</h3>
                      {/if}
                      <input type="hidden" name="pos[]" value="{$row->id_links}">
                    </div>
                  </div>
                {/foreach}
                </div>
              </form>
          </div>
      </div>
{/block}


{block name="addon_scripts"}
<script>
  $(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  });
</script>
{/block}