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
              <h2>Informasi Kampus</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Nama</label>
                  </div>
                  <div class="col-md-8">
                    {if $data.lang eq 'EN'}
                      {$data.campus->nama_en}
                    {else}
                      {$data.campus->nama}
                    {/if}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Alamat</label>
                  </div>
                  <div class="col-md-8">
                    {if $data.lang eq 'EN'}
                      {$data.campus->alamat_en}
                    {else}
                      {$data.campus->alamat}
                    {/if}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Isi</label>
                  </div>
                  <div class="col-md-8">
                    {if $data.lang eq 'EN'}
                      {$data.campus->isi_en}
                    {else}
                      {$data.campus->isi}
                    {/if}
                  </div>
                </div>
                <br>
              <div class="box-footer">
                <a href="{base_url()}campus/edit/{$data.campus->id}" class="btn btn-warning" style="float:right;"><i class="fa fa-pencil"> </i> Edit Kampus</a><br>
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
                {if (isset($data.campus->photo)) and ($data.campus->photo != "") }
                    <img src="{base_url()}document/images/campus/{$data.campus->photo}"  class="img-rounded img-responsive thumbnail" width="100%">
                {/if}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.col -->
</div>
<br>

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
