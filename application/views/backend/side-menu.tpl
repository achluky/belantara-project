
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
                        </span>
                    </span>
                </a>
            </li>

            {if isset($navbar)}
            {foreach $navbar as $item}
                
                <li class=" m-menu__item  m-menu__item--submenu {$item["status"]} " aria-haspopup="true"  data-menu-submenu-toggle="hover">
                    <a href="{$item["url"]}" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon  {$item["class"]}"></i>
                        <span class="m-menu__link-text">{$item["name"]}</span>
                        {if is_array($item["submenu"])}
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        {/if}
                    </a>
                    <div class="m-menu__submenu">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                <a href="{$item["url"]}" class="m-menu__link">
                                    <span class="m-menu__link-text">
                                        {$item["name"]}
                                    </span>
                                </a>
                            </li>

                            {foreach $item["submenu"] as $subitem}
                            <li class="m-menu__item {$subitem["status"]}" aria-haspopup="true" >
                                <a  href="{$subitem["url"]}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                        {$subitem["name"]}
                                    </span>
                                </a>
                            </li>
                            {/foreach}
                            

                        </ul>
                    </div>

                </li>
                
            {/foreach}
            {/if}


    </ul>
</div>