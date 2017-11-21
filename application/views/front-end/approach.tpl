{extends file="front-end/template.tpl"} 

{block name="content"}
<section id="page-title" class="page-title-center approach-header" style="background-image:url('{base_url()}assets/img/OurApproachH01b_BelantaraFoundation_1920x600px.jpg')">
    <div class="container">
        <div class="row">
        	<div class="col-md-3"></div>
        	<div class="col-md-4"></div>
        	<div class="col-md-5">
        		<br><br>
        		<div class="page-title">
        		<h1 style="color: #f2f2f2;" class="pull-right">OUR APPROACH</h1></div>
            </div>
        	</div>
        </div>
    </div>
</section>

<section id="page-content" class="p-t-100">
    <div class="text-center"><h2>MULTI-STAKEHOLDER APPROACH <br> <span style="color:#44a34b">CONNECTING THE PIECES</span></h2></div>
     <div class="row p-t-80 p-l-20 p-b-50">
        {$result = get_page(1,$data.slug)}
        <div class="col-md-6">
            <img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
        </div>
        {$result = get_page(2,$data.slug)}
        <div class="col-md-6">
            <img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
        </div>
    </div>
    <hr>
	<div class="container p-t-50">
		<div class="row">
            {$result = get_page(3,$data.slug)}
            <div class="col-md-4 col-sm-12">
                <p>
                    {if $data.site_lang eq 'EN'}
                        {$result->content_EN}
                    {else}
                        {$result->content_ID}
                    {/if}      
                </p>
            </div>
            {$result = get_page(4,$data.slug)}
            <div class="col-md-4 col-sm-12 p-b-40">
                <img src="{base_url()}assets/front-end/images/approach1.png" alt="" class="img-responsive">
            </div>
            {$result = get_page(5,$data.slug)}
            <div class="col-md-4 col-sm-12">
                <p>
                    {if $data.site_lang eq 'EN'}
                        {$result->content_EN}
                    {else}
                        {$result->content_ID}
                    {/if}      
                </p>
            </div>
		</div>	
	</div>
</section>
{/block}