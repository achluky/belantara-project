{extends file="front-end/template.tpl"} 

{block name="content"}


<section id="page-title" class="page-title-center approach-header" style="background-image: url('{base_url()}assets/img/PublicationH01_BelantaraFoundation_1920x600px1.jpg')">
<div class="container">
<div class="page-title">
                    <h1 class="text-dark">
                        {if $data.site_lang eq 'EN'}
                            OUR GALLERY
                        {else}
                            GALERY KAMI
                        {/if}
                    </h1>
                </div>
            </div>
        </section>
        <!-- end: Page title -->

     <!-- Content -->
        <section id="page-content">
            <div class="container">
                
                <!-- Portfolio -->
                <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="30">

                    <!-- portfolio item -->
                    {foreach $data.gallery -> result() as $row}
                    <div class="portfolio-item shadow outline img-zoom pf-illustrations pf-uielements pf-media">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="{base_url()}document/images/gallery/{$row->image}" alt=""></a>
                            </div>
                            <div class="portfolio-description">
                                <a data-lightbox="image" href="{base_url()}document/images/gallery/{$row->image}"><i class="fa fa-expand"></i></a>
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