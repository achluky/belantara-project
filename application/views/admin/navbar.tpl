<header class="main-header">
    <!-- Logo -->
    <a href="{base_url()}" class="logo">
		<!-- <img src="" alt="www." /> -->
		<b>WEB</b> <small>Belantara Foun.</small>
	</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {lang('navigation.language')} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{base_url()}lang/s/EN?url={$data.url}" style="padding:5px 0px 5px 10px;">
									<img src="{base_url('assets/img/en.png')}" alt="ID">
										{lang('navigation.language.en')}
								</a>
							</li>
                            <li><a href="{base_url()}lang/s/ID?url={$data.url}" style="padding:5px 0px 5px 10px;">
									<img src="{base_url('assets/img/id.png')}"  alt="EN">
									{lang('navigation.language.id')}
								</a>
							</li>
                        </ul>
                </li>
				
               
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="{base_url('assets/img/belantara_profile.png')}" class="user-image" alt="User Image">
                      <span class="hidden-xs">
                          {$data['session']}
                      </span>
                    </a>
					
					<ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                                <img alt="User Image" src="{base_url('assets/img/belantara_profile.png')}" class="img-circle">
								<p>
                                        <span>{$data['session']}</span>
                                        <small>{lang('navigation.label.ipb')}</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                        <a class="btn btn-default btn-flat" href="{base_url('admin/edit_profile')}"><i class="fa fa-pencil"></i>{lang('navigation.label.edit_profile')}</a>
                                
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
                        <img src="{base_url('assets/img/belantara_profile.png')}" class="user-image" alt="User Image">
                    </li>
                    <li>{strtoupper($data['session'])}</li>
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