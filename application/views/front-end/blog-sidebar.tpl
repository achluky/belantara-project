<div class="sidebar col-md-3">
        <div class="pinOnScroll">
            <!--widget newsletter-->
            <div class="widget  widget-newsletter">
                <form id="widget-search-form-sidebar" action="" method="get" class="form-inline">
                    <div class="input-group">
                        <input type="text" aria-required="true" name="q" class="form-control widget-search-form" placeholder="Search for pages...">
                        <span class="input-group-btn">
                            <button type="submit" id="widget-widget-search-form-button" class="btn btn-default">
                            <i class="fa fa-search"></i></button>
                        </span> 
                    </div>
                </form>
            </div>
            <!--end: widget newsletter-->

            <!--Tabs with Posts-->
            <div class="widget">
                <div id="tabs-01" class="tabs simple">
                    <ul class="tabs-navigation">
                        <li class=""><a href="#tab3">Recent</a> </li>
                    </ul>
                    <div class="tabs-content">
                        <div class="tab-pane active" id="tab3">
                            <div class="post-thumbnail-list">

                                {foreach $data.blog -> result() as $row}
                                <div class="post-thumbnail-entry">
                                    <img alt="" src="{base_url()}document/images/blog/{$row->image}">
                                    <div class="post-thumbnail-content">
                                        <a href="{base_url()}blog/{$row->slug}">{$row->judul}</a>
                                        <span class="post-date"><i class="fa fa-clock-o"></i> {$row->waktu|date_format}</span>
                                    </div>
                                </div>
                                {/foreach}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End: Tabs with Posts-->

        </div>
    </div>
</div>
            </div>
        </section>