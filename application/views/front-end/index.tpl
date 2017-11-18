{extends file="front-end/template.tpl"} 

{block name="content"}
        <div id="slider" class="inspiro-slider arrows-large arrows-creative dots-creative" data-height-xs="360" data-autoplay="true">

            {foreach $data.slider -> result() as $row}
            <div class="slide  kenburns" style="background-image:url('{base_url()}document/images/slider/{$row->image}');">
                <div class="container">
                    <div class="slide-captions">
                        <h1 data-caption-animation="zoom-out">{$row->title}</h1>
                    </div>
                </div>
            </div>
            {/foreach}

        </div>
        
        <section class="background-overlay-grey  p-t-100 p-b-100" data-velocity="-.30" data-parallax-image="{base_url()}assets/front-end/images/slider/IMG_4530.jpg">
            <div class="container xs-text-center sm-text-center text-light">
                <div class="row">
                  <div class="col-lg-12 col-md-12 text-center"> 
                    <h1 class="text-white">Dare to Share Your Idea To Us ? <br>Then show it !!!</h1>
                    <p class="text-white">That is creativity </p>
                    <a class="btn btn-success" href="#">
                        I Need More Info
                    </a>
                    <a class="btn btn-warning" href="#">
                      Register
                   </a>
                  </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <h2 >
                        {if $data.site_lang eq 'EN'}
                            {$data.page_home->section_3_judul_EN}
                        {else}
                            {$data.page_home->section_3_judul_ID}
                        {/if}
                    </h2>
                    <p>
                        {if $data.site_lang eq 'EN'}
                            {$data.page_home->section_3_deskripsi_EN}
                        {else}
                            {$data.page_home->section_3_deskripsi_ID}
                        {/if}
                    </p>
                  </div>  
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <video class="text-center" width="100%" height="100%" controls="" poster="{base_url()}assets/video/cover.png">
                        <source src="{$data.page_home->section_3_video}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                  </div>
                </div>
            </div>
            <div class="call-to-action background-grey m-b-0">
                <div class="container">
                    <div class="col-md-6 col-lg-9">
                        <h3>
                            {if $data.site_lang eq 'EN'}
                                {$data.page_home->section_4_judul_EN}
                            {else}
                                {$data.page_home->section_4_judul_ID}
                            {/if}
                        </h3>
                        <p>
                            {if $data.site_lang eq 'EN'}
                                {$data.page_home->section_4_deskripsi_EN}
                            {else}
                                {$data.page_home->section_4_deskripsi_ID}
                            {/if}
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center "> <a class="btn btn-lg " href="{base_url()}about-us">Project</a> </div>
                </div>
            </div>
            <div class="container">
            <div class="p-t-80">
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <img class="img-responsive" src="{base_url()}document/images/{$data.page_home->section_5_image}"> 
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h2>
                            {if $data.site_lang eq 'EN'}
                                {$data.page_home->section_5_judul_EN}
                            {else}
                                {$data.page_home->section_5_judul_ID}
                            {/if}
                        </h2>
                        <hr>
                        <p>
                            {if $data.site_lang eq 'EN'}
                                {$data.page_home->section_5_deskripsi_EN}
                            {else}
                                {$data.page_home->section_5_deskripsi_ID}
                            {/if}
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section class="background-orange"><div class="container">
            <div class="row text-light">
              <div class="col-md-4 text-center">
                  <div class="icon-icon-blantara-restoration home"> </div>
                <div class="counter large"> <span data-speed="3500" data-refresh-interval="50" data-to="443" data-from="0" data-seperator="true">443</span> </div>
                <p>On Going Restoration Initiative</p>
              </div>
              <div class="col-md-4 text-center">
                  <div class="icon-icon-blantara-protection home"> </div>
                <div class="counter large"> <span data-speed="3500" data-refresh-interval="50" data-to="534" data-from="0" data-seperator="true">534</span> </div>
                <p>On Going Protection Initiative</p>
              </div>
              <div class="col-md-4 text-center">
                  <div class="icon-icon-blantara-community home"> </div>
                <div class="counter large"> <span data-speed="3500" data-refresh-interval="50" data-to="269" data-from="0" data-seperator="true">269</span> </div>
                <p>On Going Social Forestry Initiative</p>
              </div>
            </div>
        </div></section>
        
        <section class="p-t-50 background-1">
            <div class="container">
                <h3 class="text-center">GRANT DISTRIBUTION MAP</h3>
                <img class="img-responsive animated fadeInUpBig visible" data-animation="fadeInUpBig" src="{base_url()}document/images/{$data.page_home->distribution_maps}">
            </div>
        </section>
        
        <section class="background-overlay-one p-t-50 p-b-50" data-velocity="-.10" data-parallax-image="{base_url()}assets/front-end/images/parallax/parallax.jpg">
            <div class="container">
                <div class="heading heading-center text-light">
                    <h2>OUR BLOG</h2>
                </div>
                <div id="blog" class="grid-layout post-3-columns grid-loaded" data-item="post-item" style="margin: 0px -20px -20px 0px; position: relative; height: 375px;">

                    <!-- Post item-->
                    {foreach $data.blog -> result() as $row}
                    <div class="post-item" style="padding: 0px 20px 20px 0px; position: absolute; left: 0px; top: 0px;">
                        <div class="post-item-wrap background-transparent">
                            <div class="post-image">
                                <a href="{base_url()}blog/">
                                    <img alt="" src="{base_url()}document/images/blog/{$row->image}">
                                </a>
                            </div>
                            <div class="post-item-description text-light">
                                <h2><a href="{base_url()}blog">{$row->judul}</a></h2>
                            </div>
                        </div>
                    </div>
                    {/foreach}
                    <!-- end: Post item-->

                </div>
            </div>
        </section>

        <section class="background-dark text-center p-t-80  p-b-30">
            <div class="container">
                <div class="widget clearfix widget-newsletter">
                    <form class="widget-subscribe-form form-inline" action="include/subscribe-form.php" role="form" method="post" novalidate="novalidate">
                        <h3 class="text-light">Subscribe to our Newsletter</h3>

                        <div class="input-group" style="width:70%;">
                            <span class="input-group-addon background-green"><i class="fa fa-paper-plane"></i></span>
                            <input type="email" aria-required="true" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                            <span class="input-group-btn">
                                            <button type="submit" class="btn">Subscribe</button>
                                        </span>
                        </div>
                        <small class="text-light">Stay informed on our latest news!</small>
                    </form>

                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h3>Latest News</h3>
                            <div class="post-thumbnail-list">
                                {foreach $data.last_news -> result() as $row}
                                <div class="post-thumbnail-entry">
                                    <img alt="" src="{base_url()}document/images/link.png">
                                    <div class="post-thumbnail-content">
                                        <a href="http://www.narrativematters.co.uk/betterbusiness-episodes/tony-juniper" target="_blank">{$row->judul}</a>
                                    </div>
                                </div>
                                {/foreach}
                            </div>
                         </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h3>Latest Resource</h3>
                            <div class="post-thumbnail-list">

                                {foreach $data.last_resource -> result() as $row}
                                <div class="post-thumbnail-entry">
                                    <img alt="" src="{base_url()}document/images/icon-pdf.jpg">
                                    <div class="post-thumbnail-content">
                                        <a href="{base_url()}document/resource/{$row->image}">{$row->judul}</a>
                                    </div>
                                </div>
                                {/foreach}

                            </div>
                         </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="grid-item">
                        <!-- Twitter widget -->
                        <div class="widget widget-tweeter" class="widget-tweeter" data-username="envato" data-limit="2">
                            <h3>Recent Tweets</h3>
                        </div>
                        <!-- end: Twitter widget-->
                    </div>
                    </div>
                </div>
            </div>
        </section>

{/block}