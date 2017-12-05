<header class="main-header">
    <!-- Logo -->
    <a href="{base_url()}" class="logo">
		<!-- <img src="" alt="www." /> -->
		<b>Grant</b> <small>Application</small>
	</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                {* <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                        <li>
                            <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                            </a>
                        </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li> *}

               
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="{base_url('assets/img/belantara_profile.png')}" class="user-image" alt="User Image">
                      <span class="hidden-xs">
                          {$data['name']}
                      </span>
                    </a>
					
					<ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                                <img alt="User Image" src="{base_url('assets/img/belantara_profile.png')}" class="img-circle">
								<p>
                                        <span>{$data['name']}</span>
                                        <small>{lang('navigation.label.ipb')}</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                        <a class="btn btn-default btn-flat" href="{base_url('admin/logout')}"><i class="fa fa-sign-out"></i>{lang('navigation.label.logout')}</a>
                                </li>
                            </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar affix">
    <section class="sidebar">
		<div class="profile">
                <ul>
                    <li>
                        <img src="{base_url('assets/img/belantara_profile.png')}" class="user-image" style="width: 50px; height: 50px;" alt="User Image">
                    </li>
                    <li>{strtoupper($data['name'])}</li>
                    <li>{lang('navigation.label.last_login')}: {$data['last_login']}</li>
                </ul>
		</div>
        <ul class="sidebar-menu">
            <li class="header">{lang('navigation.label.main.navigation')}</li>
			{if isset($navbar)}
			{foreach $navbar as $item}
				
				<li class="treeview {$item["status"]}">
					<a href="{$item["url"]}">
						<i class="{$item["class"]}"></i>
						<span>{$item["name"]}</span>
						{if is_array($item["submenu"])}
						<i class="fa fa-angle-left pull-right"></i>
						{/if}
					</a>
					{if is_array($item["submenu"])}
						{if $item["status"] == "active"}
						<ul class="treeview-menu menu-open">
						{else}
						<ul class="treeview-menu menu-open" style="display: none;">
						{/if}
						{foreach $item["submenu"] as $subitem}
							<li class="{$subitem["status"]}">
								<a href="{$subitem["url"]}">
									<i class="{$subitem["class"]}"></i> 
									{$subitem["name"]}
								</a>
							</li>
						{/foreach}
						</ul>
					{/if}
				</li>
				
			{/foreach}
			{/if}

        </ul>
    </section>
</aside>