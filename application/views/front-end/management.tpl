{extends file="front-end/template.tpl"} 

{block name="content"}
        <section id="page-title" style="background-image:url({base_url()}assets/front-end/images/parallax/5.jpg);">
            <div class="container">
                <div class="page-title">
                    <h1>Our Management</h1>
                </div>
            </div>
        </section>
        <section id="page-content">
            <div class="container">
                <!-- Portfolio Filter --><nav class="grid-filter gf-classic" data-layout="#portfolio">
                    <ul class="no-display">
                        <li class="active"><a href="#" data-category="*">Show All</a></li>
                        <li><a href="#" data-category=".Trustees">Board Of Trustees</a></li>
                        <li><a href="#" data-category=".Supervisory">Supervisory Boards</a></li>
                        <li><a href="#" data-category=".Executive">Executive Boards</a></li>
                        <li><a href="#" data-category=".Advisory">Advisory Boards</a></li>
                    </ul>
                    <div class="grid-active-title no-display">Show All</div>
                </nav>
                <!-- end: Portfolio Filter -->
                <div class="heading heading-center p-t-30">
                <h3>The Foundation’s Management Team is responsible for the day to day operation and management of Belantara’s conservation, restoration, and community development activities and projects.</h3></div>

                <!-- Portfolio -->
                <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="20">


                    <!-- portfolio item -->
                    {foreach $data.employee_management -> result() as $row}
                    <div class="portfolio-item no-overlay img-zoom Trustees p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="{base_url()}document/images/employee/{$row->image}" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>{$row->name}</h3>
                                    <span>{$row->jabatan}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    {/foreach}
                    <!-- end: portfolio item -->

                </div>
                <!-- end: Portfolio -->

            </div>
        </section>
{/block}