{extends file="front-end/blog_template.tpl"} 

{block name="content"}

    <section id="page-content" class="sidebar-right">
            <div class="container">
                <div class="row">
                    <!-- post content -->
                    <div class="content col-md-9">
                        <!-- Page title -->
                        <div class="page-title p-b-30">
                            <h1>Our Blog</h1>
                        </div>
                        <!-- end: Page title -->

                        <!-- Blog -->
                        <div id="blog">
                        
                            <!-- Post item-->

                            {foreach $data.blog -> result() as $row}
                            <div class="post-item p-b-30">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="{base_url()}document/images/blog/{$row->image}">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Sept 25, 2015</span>
                                        <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>0 Comments</a></span>
                                        <h2><a href="{base_url()}blog/{$row->slug}"> {$row->judul}</a></h2>
                                        <p>{$row->ringkasan}</p>
                                        <a href="{base_url()}blog/realising-a-new-vision-for-the-landscape" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                            {/foreach}

                        </div>
                        <!-- end: Blog -->

                    </div>
                    <!-- end: post content -->
                

{/block}