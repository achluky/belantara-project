<!DOCTYPE html>
<html>
    <head>
        {include file='admin/header_grant.tpl'}
        {block name="addon_styles"}{/block}
    </head>
    <body class="skin-blue fixed">
        <div class="wrapper">
            {include file='admin/navbar_grant.tpl'}
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                {block name="content-headline"}{/block}
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        {$data.title}
                    </h1>
                    <ol class="breadcrumb">
                        {block name="breadcrumb"}{/block}
                    </ol>

                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- konten nantinya disini -->
                    {block name="content"}{/block}
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b><a href="http://belantara.or.id/">Belantara Fondation</a></b>
                </div>
                <strong>Copyright &copy; {date('Y')} | All rights reserved.
                </strong>    
            </footer>
            
        </div><!-- ./wrapper -->
    

        <!-- jQuery 2.1.3 -->
        <script src="{base_url()}assets/js/jquery.js" type="text/javascript"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="{base_url()}assets/plugins/jQuery/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{base_url()}assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{base_url()}assets/js/jquery.slimscroll.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{base_url()}assets/dist/js/app.min.js" type="text/javascript"></script>
        {*     <script src="{base_url('assets/js/efile.js')}" type="text/javascript"></script>   *}
        <!-- Addons Plugins -->
        <!-- Addons Plugins -->
        {block name="addon_plugins"}{/block}
        <!-- Addons Scripts -->
        {block name="addon_scripts"}{/block}

   </body>
</html>