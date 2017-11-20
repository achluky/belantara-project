{extends file="front-end/template.tpl"} 

{block name="content"}


<section id="page-title" class="page-title-center approach-header" style="background-image: url('http://belantara.or.id/wp-content/uploads/PublicationH01_BelantaraFoundation_1920x600px1.jpg')">
<div class="container">
<div class="page-title text-left">
                    <h1 class="text-dark">REFERENCES</h1>
                </div>
            </div>
        </section>
        <!-- end: Page title -->

     <!-- Content -->
        <section id="page-content">
            <div class="container">                            
                        <div id="blog">

                            <!-- Post item-->
                            {foreach $data.references -> result() as $row}
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{$row->waktu|date_format}</span>
                                        <h2><a href="{base_url()}document/reference/{$row->isi}" target="_blank">{$row->judul}</a></h2>
                                        <p>{$row->ringkasan}</p>
                                        <a href="{base_url()}document/reference/{$row->isi}" target="_blank">Read More <i class="fa fa-arrow-right"></i></a>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            {/foreach}
                            <!-- end: Post item-->

                        </div>
                    </div>
                </section>
{/block}