{extends file="front-end/template.tpl"} 

{block name="content"}
        <section id="page-title" style="background-image:url({base_url()}assets/front-end/images/parallax/5.jpg);">
            <div class="container">
                <div class="page-title">
                    <h1>Our Boards</h1>
                </div>
            </div>
        </section>

        <section id="page-content">
            <div class="container">

                <!-- Portfolio Filter -->
                <nav class="grid-filter gf-classic" data-layout="#portfolio">
                    <ul>
                        <li class="active"><a href="#" data-category="*">Show All</a></li>
                        {foreach $data.boards_category -> result() as $row}
                        <li><a href="#" data-category=".{$row->sub_category}">{$row->sub_category}</a></li>
                        {/foreach}
                    </ul>
                    <div class="grid-active-title">Show All</div>
                </nav>
                <!-- end: Portfolio Filter -->



                <!-- Portfolio -->
                <div id="portfolio" class="grid-layout portfolio-4-columns p-t-40" data-margin="20">

                    <!-- portfolio item -->

                    {foreach $data.employee_boards -> result() as $row}
                    <div class="portfolio-item no-overlay img-zoom {$row->sub_category} p-b-50">
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