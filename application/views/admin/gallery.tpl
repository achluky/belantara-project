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
                  
                <div class="box box-primary">

                  <div class="box-header">
                    <h3 class="box-title">Add Gallery</h3>
                    <a href="{base_url()}gallery_manajement/add" class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add Gallery</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">


                    <div class="row">
                    {foreach $data.gallery_list->result() as $row}
                      <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                          <img class="img-responsive lazy" src="{base_url()}/document/images/gallery/{$row->image}">
                          <div class="caption">
                            <h4>{ucwords(strtolower($row->title_en))}</h4>
                            <p>
                              <a href="{base_url()}gallery_manajement/edit/{$row->id}" class="btn btn-primary" role="button">
                              <span class="fa fa-edit fa-1x" style="float:right;"></span>
                              </a>
                              <a href="{base_url()}gallery_manajement/delete/{$row->id}" class="btn btn-primary" role="button">
                              <span class="glyphicon glyphicon-remove fa-1x" style="float:right;"></span>
                              </a>
                            </p>
                          </div>
                        </div>
                      </div>
                    {/foreach}
                    </div>
                  </div>

                </div>
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_styles"}
<script type="text/css">
  img.lazy {
        width: 700px; 
        height: 467px; 
        display: block;
        
        /* optional way, set loading as background */
        background-image: url('../../../assets/img/loading.gif');
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
</script>
{/block}

{block name="addon_scripts"}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script>
   $(function() {
        $('.lazy').lazy();
    });
</script>
{/block}