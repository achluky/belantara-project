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
                    <h3 class="box-title">Edit User</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">

                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}user/update" name="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{$data.user->id}">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="username" name="username" placeholder="Username" value="{$data.user->username}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Password (Again)</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password_again" placeholder="Password Again" value="">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="level">
                                  {foreach $data.level->result() as $value}
                                  <option value="{$value->id}" {($data.user->is_super_admin == $value->id)?"selected":""}>{$value->name}</option>
                                  {/foreach}  
                                </select>
                              </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}user">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div><!-- /.box-footer -->

                      </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}
{/block}