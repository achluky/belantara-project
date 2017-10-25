{extends file="admin/template.tpl"} 


{block name="addon_styles"}
    <link href="{base_url()}assets/plugins/bootstrap-daterangepicker-master/daterangepicker.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" href="{base_url()}assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{base_url()}assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" media="screen">
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
                    <h3 class="box-title">Edit Faculty</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body box-primary">
                    <form role="form" data-toggle="validator" class="form-horizontal" action="{base_url()}faculties/update" name="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="{$data.faculties->id}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="judul" name="title_EN" placeholder="Judul English" value="{$data.faculties->title_EN}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="judul" name="title_ID" placeholder="Judul Indonesia" value="{$data.faculties->title_ID}" required>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Isi</label>
                              <div class="col-sm-10">
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Indonesia</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">English</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                      <textarea class="form-control" rows="3" placeholder="Isi Visi Misi" name="content_ID" required>{$data.faculties->content_ID}</textarea>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                      <textarea class="form-control" rows="3" placeholder="Isi Visi Misi" name="content_EN" required>{$data.faculties->content_EN}</textarea>
                                    </div>
                                  </div>
                                  <!-- /.tab-content -->
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Latar Belakang</label>
                              <div class="col-sm-10">
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#background_1" data-toggle="tab">Indonesia</a></li>
                                    <li><a href="#background_2" data-toggle="tab">English</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="background_1">
                                      <textarea class="form-control" rows="3" placeholder="Isi Latar Belakang" name="content_background_ID" required>{$data.faculties->content_background_ID}</textarea>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="background_2">
                                      <textarea class="form-control" rows="3" placeholder="Isi Latar Belakang" name="content_background_EN" required>{$data.faculties->content_background_EN}</textarea>
                                    </div>
                                  </div>
                                  <!-- /.tab-content -->
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Kompetensi</label>
                              <div class="col-sm-10">
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#competence_1" data-toggle="tab">Indonesia</a></li>
                                    <li><a href="#competence_2" data-toggle="tab">English</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="competence_1">
                                      <textarea class="form-control" rows="3" placeholder="Isi Kompetensi" name="content_competence_ID" required>{$data.faculties->content_competence_ID}</textarea>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="competence_2">
                                      <textarea class="form-control" rows="3" placeholder="Isi Kompetensi" name="content_competence_EN" required>{$data.faculties->content_competence_EN}</textarea>
                                    </div>
                                  </div>
                                  <!-- /.tab-content -->
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Kebijakan Mutu</label>
                              <div class="col-sm-10">
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#quality_1" data-toggle="tab">Indonesia</a></li>
                                    <li><a href="#quality_2" data-toggle="tab">English</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="quality_1">
                                      <textarea class="form-control" rows="3" placeholder="Isi Kebijakan Mutu" name="content_quality_ID" required>{$data.faculties->content_quality_ID}</textarea>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="quality_2">
                                      <textarea class="form-control" rows="3" placeholder="Isi Kebijakan Mutu" name="content_quality_EN" required>{$data.faculties->content_quality_EN}</textarea>
                                    </div>
                                  </div>
                                  <!-- /.tab-content -->
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Program Pendidikan</label>
                              <div class="col-sm-10">
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#education_1" data-toggle="tab">Indonesia</a></li>
                                    <li><a href="#education_2" data-toggle="tab">English</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="education_1">
                                      <textarea class="form-control" rows="3" placeholder="Isi Program Pendidikan" name="content_education_ID" required>{$data.faculties->content_education_ID}</textarea>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="education_2">
                                      <textarea class="form-control" rows="3" placeholder="Isi Kebijakan Mutu" name="content_education_EN" required>{$data.faculties->content_education_EN}</textarea>
                                    </div>
                                  </div>
                                  <!-- /.tab-content -->
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Fasilitas</label>
                              <div class="col-sm-10">
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#facilities_1" data-toggle="tab">Indonesia</a></li>
                                    <li><a href="#facilities_2" data-toggle="tab">English</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="facilities_1">
                                      <textarea class="form-control" rows="3" placeholder="Isi Fasilitas" name="content_facilities_ID" required>{$data.faculties->content_facilities_ID}</textarea>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="facilities_2">
                                      <textarea class="form-control" rows="3" placeholder="Isi Fasilitas" name="content_facilities_EN" required>{$data.faculties->content_facilities_EN}</textarea>
                                    </div>
                                  </div>
                                  <!-- /.tab-content -->
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Penelitian & Pengembangan</label>
                              <div class="col-sm-10">
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#research_1" data-toggle="tab">Indonesia</a></li>
                                    <li><a href="#research_2" data-toggle="tab">English</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div class="tab-pane active" id="research_1">
                                      <textarea class="form-control" rows="3" placeholder="Isi Penelitian dan Pengabdian" name="content_research_ID" required>{$data.faculties->content_research_ID}</textarea>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="research_2">
                                      <textarea class="form-control" rows="3" placeholder="Isi Penelitian dan Pengabdian" name="content_research_EN" required>{$data.faculties->content_research_EN}</textarea>
                                    </div>
                                  </div>
                                  <!-- /.tab-content -->
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Isi Alamat" name="address" required>{$data.faculties->address}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">URI</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="keyword" placeholder="URI" name="uri" value="{$data.faculties->uri}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Kode Fakultas</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="keyword" placeholder="Isi Kode Fakultas" name="code" value="{$data.faculties->code}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Singkatan Fakultas</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control" id="keyword" placeholder="isi Singkatan Fakultas" name="singkatan" value="{$data.faculties->singkatan}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image" value="" >
                                            <input type="input" name="image" value="{$data.faculties->photo}">
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                    <br/>
                                    {if (isset($data.faculties->photo)) and ($data.faculties->photo != "") }
                                        <img src="http://ipb.ac.id/media/images/faculty/{$data.faculties->photo}"  class="img-rounded img-responsive thumbnail" width="300">
                                    {/if}
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <a href="{base_url()}faculties">Cancel</a>
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
    <script type="text/javascript" src="{base_url()}assets/plugins/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/plugins/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    <script src="{base_url()}assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
    <script src="{base_url()}assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="{base_url()}assets/js/validator.min.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(function () {
        {literal}
          CKEDITOR.replace('content_ID'); 
          CKEDITOR.replace('content_EN');
          CKEDITOR.replace('content_competence_EN');
          CKEDITOR.replace('content_competence_ID');
          CKEDITOR.replace('content_background_EN');
          CKEDITOR.replace('content_background_ID');
          CKEDITOR.replace('content_quality_EN');
          CKEDITOR.replace('content_quality_ID');
          CKEDITOR.replace('content_education_EN');
          CKEDITOR.replace('content_education_ID');
          CKEDITOR.replace('content_facilities_EN');
          CKEDITOR.replace('content_facilities_ID');
          CKEDITOR.replace('content_research_EN');
          CKEDITOR.replace('content_research_ID'); 
                  CKEDITOR.replace('address');
                  $(".fileinput").fileinput();
        {/literal}
              });
    </script>
{/block}
