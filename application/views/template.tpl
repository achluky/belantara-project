<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        {include file='header.tpl'}
        {block name="addon_styles"}{/block}
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >


        {block name="content"}{/block}

        <!--begin::Base Scripts -->
        <script src="/belantara-project/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="/belantara-project/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script src="/belantara-project/assets/snippets/pages/user/login.js" type="text/javascript"></script>
        <!--end::Page Snippets -->

        <!-- Addons Plugins -->
        {block name="addon_plugins"}{/block}
        <!-- Addons Scripts -->
        {block name="addon_scripts"}{/block}

    </body>
    <!-- end::Body -->
</html>
