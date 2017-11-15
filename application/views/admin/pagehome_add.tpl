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


                <div class="box box-primary collapsed-box">
                  <div class="box-header">
                    <h3 class="box-title">Page Home : Section 3 </h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                      </button>
                    </div>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}pagehome/update" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">
                            <input name="id" hidden value="{$data.page->id}">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="title_EN" placeholder="Judul English" value="{$data.page->section_3_judul_ID}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="title_ID" placeholder="Judul Indonesia" value="{$data.page->section_3_judul_EN}" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="keyword" placeholder="Keyword English" name="deskripsi_EN" value="" required>{$data.page->section_3_deskripsi_ID}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="keyword" placeholder="Keyword Indonesia" name="deskripsi_ID" value="" required>{$data.page->section_3_deskripsi_EN}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">URL Video</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="keyword" placeholder="Alamat URL Video" name="url_video" value="{$data.page->section_3_video}" required>
                              </div>
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}" class="btn btn-info" target="_blank_">View</a>
                              <button type="submit" class="btn btn-danger pull-right">Update</button>
                        </div><!-- /.box-footer -->
                        <br/>
                      </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <br/>

                <div class="box box-primary  collapsed-box">
                  <div class="box-header">
                    <h3 class="box-title">Page Home : Section 4 </h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                      </button>
                    </div>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}pagehome/update_section4" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">

                            <input name="id" hidden value="{$data.page->id}">

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="title_EN" placeholder="Judul English" value="{$data.page->section_4_judul_EN}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="title_ID" placeholder="Judul Indonesia" value="{$data.page->section_4_judul_ID}" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="keyword" placeholder="Deskripsi English" name="deskripsi_EN" value="" required>{$data.page->section_4_deskripsi_EN}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="keyword" placeholder="Deskripsi Indonesia" name="deskripsi_ID" value="" required>{$data.page->section_4_deskripsi_ID}</textarea>
                              </div>
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}" class="btn btn-info">View</a>
                              <button type="submit" class="btn btn-danger pull-right">Update</button>
                        </div><!-- /.box-footer -->
                        <br/>
                      </form>
                  </div>
                  <!-- /.box-body -->
                </div>

                <br/>

                <div class="box box-primary  collapsed-box">
                  <div class="box-header">
                    <h3 class="box-title">Page Home : Section 5 </h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                      </button>
                    </div>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}pagehome/update_section5" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">

                            <input name="id" hidden value="{$data.page->id}">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="title_EN" placeholder="Judul English" value="{$data.page->section_5_judul_EN}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="title_ID" placeholder="Judul Indonesia" value="{$data.page->section_5_judul_ID}" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="keyword" placeholder="Keyword English" name="deskripsi_EN" value="" required>{$data.page->section_5_deskripsi_EN}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="keyword" placeholder="Keyword Indonesia" name="deskripsi_ID" value="" required>{$data.page->section_5_deskripsi_ID}</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" id="keyword" placeholder="Image" name="image" value="" required>
                                <br/>
                                {if (isset($data.page->section_5_image)) and ($data.page->section_5_image != "") }
                                <img src="{base_url()}document/images/{$data.page->section_5_image}"  class="img-rounded img-responsive thumbnail">
                                {/if}
                              </div>
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}page" class="btn btn-info">View</a>
                              <button type="submit" class="btn btn-danger pull-right">Update</button>
                        </div><!-- /.box-footer -->
                        <br/>
                      </form>
                  </div>
                  <!-- /.box-body -->
                </div>

                <br/>


                <div class="box box-primary  collapsed-box">
                  <div class="box-header">
                    <h3 class="box-title">Page Home : Distribution Maps </h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                      </button>
                    </div>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}pagehome/update_distribution_maps" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">
                            <div class="form-group">
                              <input name="id" hidden value="{$data.page->id}">
                              <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" id="keyword" placeholder="Image Distribution Maps" name="distribution_maps" value="" required>
                                <br/>
                                {if (isset($data.page->distribution_maps)) and ($data.page->distribution_maps != "") }
                                <img src="{base_url()}document/images/{$data.page->distribution_maps}"  class="img-rounded img-responsive thumbnail">
                                {/if}

                              </div>
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}page" class="btn btn-info">View</a>
                              <button type="submit" class="btn btn-danger pull-right">Update</button>
                        </div><!-- /.box-footer -->
                        <br/>
                      </form>
                  </div>
                  <!-- /.box-body -->
                </div>

          </div>
          <!-- /.col -->
      </div>
{/block}


{block name="addon_scripts"}
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
        CKEDITOR.replace('content_EN');
        CKEDITOR.replace('content_ID');
    });
  </script>
{/block}