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
              <h2>Informasi Social Media</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Nama</label>
                  </div>
                  <div class="col-md-8">
                    {$data.socmed->nama}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Link</label>
                  </div>
                  <div class="col-md-8">
                    <a href="{$data.socmed->link}" title="{$data.socmed->link}">{$data.socmed->link}</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Urutan</label>
                  </div>
                  <div class="col-md-8">
                    {$data.socmed->urutan}
                  </div>
                </div>
                <br>
              <div class="box-footer">
                <a href="{base_url()}socmed/edit/{$data.socmed->id}" class="btn btn-warning" style="float:right;"><i class="fa fa-pencil"> </i> Edit Social Media</a><br>
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
                    Icon
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4"><h1><i class="{$data.socmed->icon} fa-5x" aria-hidden="true"></i></h1></div>
                    <div class="col-md-4"><h3><i class="{$data.socmed->icon} fa-5x" aria-hidden="true"></i></h3></div>
                    <div class="col-md-4"><h5><i class="{$data.socmed->icon} fa-5x" aria-hidden="true"></i></h5></div>
                </div>
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
