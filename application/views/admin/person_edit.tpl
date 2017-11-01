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
                    <h3 class="box-title">Edit Employee</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}person/update" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">
                            <input name="id" hidden value="{$data.employee->idPerson}">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="nama" name="nama" placeholder="Nama" value="{$data.employee->name}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="nama" name="jabatan" placeholder="Jabatan" value="{$data.employee->jabatan}" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="10" placeholder="Deskripsi" name="deskripsi_ID" required>{$data.employee->deskripsi_ID}</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="10" placeholder="Deskripsi EN" name="deskripsi_EN" required>{$data.employee->deskripsi_EN}</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Foto</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" id="keyword" placeholder="Keyword English" name="foto" value="">
                                <br/>
                                <div class="portfolio-image">
                                    <a href="#"><img src="{base_url()}document/images/employee/{$data.employee->image}" alt="" class="img-thumbnail" width="150px;"></a>
                                </div>

                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">{$data.label.category}</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="idcategory" readonly>
                                  {foreach $data.category_employee -> result() as $row}
                                    {if $data.site_lang == "ID"}
                                    <option value="{$row->id}" {($data.employee->idcategory == $row->id)?"selected":""} >{$row->category_ID}</option>
                                    {else}
                                    <option value="{$row->id}" {($data.employee->idcategory == $row->id)?"selected":""} >{$row->category_EN}</option>
                                    {/if}
                                  {/foreach}
                                </select>
                              </div>
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="{base_url()}page">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div><!-- /.box-footer -->
                        <br/>
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
<script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
<script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
        CKEDITOR.replace('content_EN');
        CKEDITOR.replace('content_ID');
    });
  </script>
{/block}