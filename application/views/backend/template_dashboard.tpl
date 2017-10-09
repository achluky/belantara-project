<!DOCTYPE html>
<html>
    <head>
        {include file='backend/header.tpl'}
        {block name="addon_styles"}{/block}
    </head>
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!-- BEGIN: Header -->
            <header class="m-grid__item m-header" data-minimize-offset="200" data-minimize-mobile-offset="200" >
                <div class="m-container m-container--fluid m-container--full-height">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- BEGIN: Brand -->
                        <div class="m-stack__item m-brand  m-brand--skin-dark ">
                            <div class="m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="index.html" class="m-brand__logo-wrapper">
                                        <!-- <img alt="" src="assets/demo/default/media/img/logo/logo_default_dark.png"/> -->
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- BEGIN: Left Aside Minimize Toggle -->
                                    <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                    <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Responsive Header Menu Toggler -->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Topbar Toggler -->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                    <!-- BEGIN: Topbar Toggler -->
                                </div>
                            </div>
                        </div>
                        <!-- END: Brand -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <!-- BEGIN: Topbar -->
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__userpic">
                                                    <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                                </span>
                                                <span class="m-topbar__username m--hide">
                                                    Nick
                                                </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                        <div class="m-card-user m-card-user--skin-dark">
                                                            <div class="m-card-user__pic">
                                                                <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">
                                                                    Mark Andre
                                                                </span>
                                                                <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                    mark.andre@gmail.com
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__section m--hide">
                                                                    <span class="m-nav__section-text">
                                                                        Section
                                                                    </span>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="header/profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                        <span class="m-nav__link-title">
                                                                            <span class="m-nav__link-wrap">
                                                                                <span class="m-nav__link-text">
                                                                                    My Profile
                                                                                </span>
                                                                                <span class="m-nav__link-badge">
                                                                                    <span class="m-badge m-badge--success">
                                                                                        2
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="header/profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-share"></i>
                                                                        <span class="m-nav__link-text">
                                                                            Activity
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="header/profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                        <span class="m-nav__link-text">
                                                                            Messages
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__item">
                                                                    <a href="header/profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-info"></i>
                                                                        <span class="m-nav__link-text">
                                                                            FAQ
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="header/profile.html" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                        <span class="m-nav__link-text">
                                                                            Support
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__item">
                                                                    <a href="{base_url()}admin/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                        Logout
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-nav__link-icon">
                                                    <i class="flaticon-cogwheel"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END: Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: Header -->
            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
                    <!-- BEGIN: Aside Menu -->
                    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500"  >
                        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                                <li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
                                    <a  href="index.html" class="m-menu__link ">
                                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                                        <span class="m-menu__link-title">
                                            <span class="m-menu__link-wrap">
                                                <span class="m-menu__link-text">
                                                    Dashboard
                                                </span>
                                                <span class="m-menu__link-badge">
                                                    <span class="m-badge m-badge--danger">
                                                        2
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-icon flaticon-layers"></i>
                                        <span class="m-menu__link-text">
                                            Base
                                        </span>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                                <a  href="#" class="m-menu__link ">
                                                    <span class="m-menu__link-text">
                                                        Base
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/state.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        State Colors
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/typography.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Typography
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/stack.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Stack
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/tables.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Tables
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/progress.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Progress
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/modal.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Modal
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/alerts.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Alerts
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/popover.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Popover
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/tooltip.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Tooltip
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/blockui.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Block UI
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/spinners.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Spinners
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/scrollable.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Scrollable
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/dropdown.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Dropdown
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                                <a  href="#" class="m-menu__link m-menu__toggle">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Tabs
                                                    </span>
                                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                                </a>
                                                <div class="m-menu__submenu">
                                                    <span class="m-menu__arrow"></span>
                                                    <ul class="m-menu__subnav">
                                                        <li class="m-menu__item " aria-haspopup="true" >
                                                            <a  href="components/base/tabs/bootstrap.html" class="m-menu__link ">
                                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="m-menu__link-text">
                                                                    Bootstrap Tabs
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="m-menu__item " aria-haspopup="true" >
                                                            <a  href="components/base/tabs/line.html" class="m-menu__link ">
                                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                                    <span></span>
                                                                </i>
                                                                <span class="m-menu__link-text">
                                                                    Line Tabs
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/navs.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Navs
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/lists.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Lists
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/treeview.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Tree View
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/bootstrap-notify.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Bootstrap Notify
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="components/base/toastr.html" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Toastr
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                        </ul>
                    </div>
                    <!-- END: Aside Menu -->
                </div>

                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title ">
                                    Dashboard
                                </h3>
                            </div>
                            <div>
                                <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                                    <span class="m-subheader__daterange-label">
                                        <span class="m-subheader__daterange-title"></span>
                                        <span class="m-subheader__daterange-date m--font-brand"></span>
                                    </span>
                                    <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                        <i class="la la-angle-down"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->

                    <div class="m-content">
                        <!--Begin::Main Portlet-->
                        <div class="row">
                            <div class="col-xl-12">
                                <!--begin:: Widgets/Activity-->
                                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text m--font-light">
                                                    Activity
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
                                                    <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                                                        <i class="fa fa-genderless m--font-light"></i>
                                                    </a>
                                                    <div class="m-dropdown__wrapper">
                                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                        <div class="m-dropdown__inner">
                                                            <div class="m-dropdown__body">
                                                                <div class="m-dropdown__content">
                                                                    <ul class="m-nav">
                                                                        <li class="m-nav__section m-nav__section--first">
                                                                            <span class="m-nav__section-text">
                                                                                Quick Actions
                                                                            </span>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                                <span class="m-nav__link-text">
                                                                                    Activity
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                                <span class="m-nav__link-text">
                                                                                    Messages
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                                                <span class="m-nav__link-text">
                                                                                    FAQ
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__item">
                                                                            <a href="" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                                <span class="m-nav__link-text">
                                                                                    Support
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                        <li class="m-nav__item">
                                                                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                                                Cancel
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-widget17">
                                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                                <div class="m-widget17__chart" style="height:320px;">
                                                    <canvas id="m_chart_activities"></canvas>
                                                </div>
                                            </div>
                                            <div class="m-widget17__stats">
                                                <div class="m-widget17__items m-widget17__items-col1">
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-truck m--font-brand"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Delivered
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            15 New Paskages
                                                        </span>
                                                    </div>
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-paper-plane m--font-info"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Reporeted
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            72 Support Cases
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="m-widget17__items m-widget17__items-col2">
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-pie-chart m--font-success"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Ordered
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            72 New Items
                                                        </span>
                                                    </div>
                                                    <div class="m-widget17__item">
                                                        <span class="m-widget17__icon">
                                                            <i class="flaticon-time m--font-danger"></i>
                                                        </span>
                                                        <span class="m-widget17__subtitle">
                                                            Arrived
                                                        </span>
                                                        <span class="m-widget17__desc">
                                                            34 Upgraded Boxes
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Activity-->
                            </div>
                        </div>
                        <!--End::Main Portlet-->
                    </div>

                </div>

            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
            <footer class="m-grid__item m-footer ">
                <div class="m-container m-container--fluid m-container--full-height m-page__container">
                    <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                            <span class="m-footer__copyright">
                                2017 &copy; Metronic theme by
                                <a href="#" class="m-link">
                                    Keenthemes
                                </a>
                            </span>
                        </div>
                        <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                            <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                                <li class="m-nav__item">
                                    <a href="#" class="m-nav__link">
                                        <span class="m-nav__link-text">
                                            About
                                        </span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a href="#"  class="m-nav__link">
                                        <span class="m-nav__link-text">
                                            Privacy
                                        </span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a href="#" class="m-nav__link">
                                        <span class="m-nav__link-text">
                                            T&C
                                        </span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a href="#" class="m-nav__link">
                                        <span class="m-nav__link-text">
                                            Purchase
                                        </span>
                                    </a>
                                </li>
                                <li class="m-nav__item m-nav__item">
                                    <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                                        <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        
        <!--begin::Base Scripts -->
        <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
        <!--end::Page Snippets -->

        <!--begin::Addons Plugins -->
        {block name="addon_plugins"}{/block}
        <!--end::Addons Plugins -->
        <!--begin::Addons Scripts -->
        {block name="addon_scripts"}{/block}
        <!--end::Addons Plugins -->
    </body>
</html>

