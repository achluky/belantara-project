{extends file="front-end/template.tpl"} 

{block name="content"}
        <section id="page-title" style="background-image: url('http://belantara.or.id/wp-content/uploads/OurPeopleH02_BelantaraFoundation_1920x600px.jpg');background-size: cover; background-position: center bottom;">
            <div class="container">
                <div class="page-title">
                    <h1>ADVISORY BOARDS</h1>
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
                <h3>The Advisory Committee is a group of respected and experienced individuals, selected from a broad range of backgrounds and groups.
They are passionate about the vision and mission of the Belantara Foundation, and volunteer their time to help make the Foundation successful.
One of the key roles of the Advisory Committee is to provide advice to the Governing Board about the ongoing development of the Belantara Foundation and its activities.</h3></div>

                <!-- Portfolio -->
                <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="20">


                    <!-- portfolio item -->
                    {foreach $data.employee_management -> result() as $row}
                    <div class="portfolio-item no-overlay img-zoom Trustees p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <img src="{base_url()}document/images/employee/{$row->image}" alt="" class="img-circle">
                            </div>
                            <div class="portfolio-description">
                                <a href="">
                                    <h3><a href="{base_url()}home/boardsdetail/{$row->id}" data-lightbox="ajax">{$row->name}</a></h3>
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