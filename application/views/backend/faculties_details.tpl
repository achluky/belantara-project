{extends file="admin/template.tpl"}
{block name="breadcrumb"}
<i class="glyphicon glyphicon-home">
</i>
&nbsp;
{$stopbreadcrumb = 0}
{foreach $data.breadcrumb as $label =>
$value}
{if $stopbreadcrumb++ < count($data.breadcrumb)-1}
<li>
    <a href="{$value}">
        {$label}
    </a>
</li>
{else}
<li>
    {$label}
</li>
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
  </div>
</div>
<br>
<div class="row">
    <div class="col-xs-7">
        <div class="block">
            <div class="block-title">
              <h2>Informasi Fakultas</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Judul</label>
                  </div>
                  <div class="col-md-8">
                    {if $data.lang eq 'EN'}
                      {$data.faculties->title_EN}
                    {else}
                      {$data.faculties->title_ID}
                    {/if}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Singkatan</label>
                  </div>
                  <div class="col-md-8">
                    {$data.faculties->singkatan}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Alamat</label>
                  </div>
                  <div class="col-md-8">
                    {$data.faculties->address}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Link</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" value="http://ipb.ac.id/faculty/index/{$data.faculties->uri}">
                  </div>
                </div>
                <br>
              <div class="box-footer">
                <a href="{base_url()}faculties/edit/{$data.faculties->id}" class="btn btn-warning" style="float:right;"><i class="fa fa-pencil"> </i> Edit Fakultas</a><br>
              </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box-body -->
    </div>
    <div class="col-xs-5">
        <div class="block">
            <div class="block-title">
                <h3>
                    Photo
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {if (isset($data.faculties->photo)) and ($data.faculties->photo != "") }
                    <img src="http://ipb.ac.id/media/images/faculty/{$data.faculties->photo}"  class="img-rounded img-responsive thumbnail" width="100%">
                {/if}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.col -->
</div>
<br>
<div class="row">
  <div class="col-md-12">
      <div class="block">
        <div class="block-title">
          <h3>Information Detail</h3>
        </div>
        <div class="box-body">
          <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree1" class="" aria-expanded="true">
                        Background
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree1" class="panel-collapse collapse" aria-expanded="true">
                    <div class="box-body">
                      {if $data.lang eq 'EN'}
                        {$data.faculties->content_background_EN}
                      {else}
                        {$data.faculties->content_background_ID}
                      {/if}
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="" aria-expanded="false">
                        Visi, Misi, Motto
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                      {if $data.lang eq 'EN'}
                        {$data.faculties->content_EN}
                      {else}
                        {$data.faculties->content_ID}
                      {/if}
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="collapsed">
                        Kompetensi
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse" aria-expanded="true" style="height: 0px;">
                    <div class="box-body">
                      {if $data.lang eq 'EN'}
                        {$data.faculties->content_competence_EN}
                      {else}
                        {$data.faculties->content_competence_ID}
                      {/if}
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree4" class="" aria-expanded="false">
                        Kebijakan Mutu
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree4" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                      {if $data.lang eq 'EN'}
                        {$data.faculties->content_quality_EN}
                      {else}
                        {$data.faculties->content_quality_ID}
                      {/if}
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree5" class="" aria-expanded="false">
                        Program Pendidikan
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree5" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                      {if $data.lang eq 'EN'}
                        {$data.faculties->content_education_EN}
                      {else}
                        {$data.faculties->content_education_ID}
                      {/if}
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree6" class="" aria-expanded="false">
                        Fasilitas
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree6" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                      {if $data.lang eq 'EN'}
                        {$data.faculties->content_facilities_EN}
                      {else}
                        {$data.faculties->content_facilities_ID}
                      {/if}
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                        Penelitian dan Pengembangan
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                      {if $data.lang eq 'EN'}
                        {$data.faculties->content_research_EN}
                      {else}
                        {$data.faculties->content_research_ID}
                      {/if}
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
</div>
<br>
<div class="row"> 
    <div class="col-xs-12">         
          <div class="block">
            <div class="block-title">
              <h3>Department List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="{base_url()}department/add/{$data.faculties->id}"class="btn btn-primary btn-flat" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add Department</a>
            <br>&nbsp;<hr>
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="50px;">No</th>
                    <th width="400px;">Nama</th>
                    <th width="100px;">URI</th>
                    <th width="150px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {foreach $data.department->result() as $row}
                    <tr>
                        <td>
                            {$row->id}
                        </td>
                        <td>
                          {if $data.lang eq 'EN'}
                            {$row->title_EN}
                          {else}
                            {$row->title_ID}
                          {/if}
                        </td>
                        <td>
                          {$row->uri}
                        </td>
                        <td>
<!--                           <a href="{base_url()}faculties/detail/{$data.faculties->id}/{$row->id}"  class="btn btn-xs">
                              <i class="fa fa-eye fa-fw">
                              </i>
                              Details
                          </a> -->
                          <a href="{base_url()}department/edit/{$data.faculties->id}/{$row->id}"  class="btn btn-xs">
                              <i class="fa fa-edit fa-fw">
                              </i>
                              Edit
                          </a>
                          <a href="{base_url()}department/delete/{$data.faculties->id}/{$row->id}" class="btn btn-xs">
                              <i class="fa fa-remove fa-fw">
                              </i>
                              Delete
                          </a>
                        </td>
                    </tr>
                  {/foreach}
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<br>
<div class="row"> 
    <div class="col-xs-12">          
          <div class="block">
            <div class="block-title">
              <h3>Photo List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="{base_url()}department/add"class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add Photo</a>
            <br>&nbsp;<hr>
            Foto
            </div>
          </div>
    </div>
</div>
{/block}
{block name="addon_scripts"}
<!--
    DATA TABELS SCRIPT
-->
<script src="{base_url()}assets/plugins/datatables/jquery.dataTables.js" type="text/javascript">
</script>
<script src="{base_url()}assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript">
</script>
<script>
    $(function () {
    $("#example1").DataTable();
    });
</script>
{/block}
