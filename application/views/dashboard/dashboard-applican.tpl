{extends file="admin/template_dashboard_grant.tpl"} 

{block name="system"}
{/block}
{block name="content-headline"}
{/block}
{block name="content"}
    <div class="row">
            <div class="col-xs-12">
            </div>
        <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog"  >
                    <div class="modal-content">
                        <div class="modal-body pull-center">
                            <center>
                            <h4>Selamat Datang di Grant Making App</h4>
                            <h4>Yayasan Belantara</h4>
                            <p>Silahkan Melengkapi Profil pengguna dan lembaga sebelum menggunakan aplikasi ini</p>
                            <a href="{base_url()}grant/profil"><button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> &nbsp; Lengkapi Profil</button></a>
                            </center>
                        </div>
                    </div> <!-- /.modal-dialog -->
                </div>
            </div> <!-- /.modal -->

    </div>
{/block}

{block name="modal"}
{/block}

{block name="addon_plugins"}
{/block}


{block name="addon_scripts"}
{if $data.status_biodata->status == 0}
<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
{/if}
{/block}