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
                    <h3 class="box-title">List slider</h3>
                    <a href="{base_url()}slider/add" class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add slider</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">

                    <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="300px;">Title</th>
                          <th>Deskripsi</th>
                          <th>Image</th>
                          <th width="150px;">Tanggal</th>
                          <th width="150px;">Akasi</th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach $data.slider_list->result() as $row}
                        <tr>
                          <td>{$row->title_en}</td>
                          <td>{$row->deskripsi_en}</td>
                          <td><a href="{base_url()}document/images/slider/{$row->image}" class="btn btn-primary btn-sm"><i class="fa fa-file-image-o"></i>  &nbsp; image slider</a></td>
                          <td>{$row->tanggal}</td>
                          <td>
                              <a href="{base_url()}slider/edit/{$row->id}"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                              <a href="{base_url()}slider/delete/{$row->id}" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>
                          </td>
                        </tr>
                        {/foreach}
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->

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