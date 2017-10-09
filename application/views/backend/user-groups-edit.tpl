{extends file="admin/template.tpl"} 
{block name="addon_styles"}
{/block}
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
                    <h3 class="box-title">Edit User Groups</h3>
                  </div>
                  <div class="box-body box-primary">

                  <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}user/groups/update" name="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{$data.user_groups->id}">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Groups Name</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="password" name="name" placeholder="Name" value="{$data.user_groups->name}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <textarea name="description" class="form-control textarea" placeholder="Description">{$data.user_groups->description}</textarea>
                              </div>
                            </div>
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}user/groups">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                  </form>
                  
                  </div>
                </div>
          </div>
      </div>
{/block}
{block name="addon_scripts"}
{/block}