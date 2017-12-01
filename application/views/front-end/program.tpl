{extends file="front-end/template.tpl"} 

{block name="content"}
<section id="page-title" class="page-title-center program-header">
    <div class="container">
        <div class="row">
        	<div class="col-md-3"></div>
        	<div class="col-md-4"></div>
        	<div class="col-md-5">
        		<br><br>
        		<div class="page-title">
                    <h1 style="color: #fff;" class="pull-right">OUR PROGRAM</h1></div>
        	    </div>
        	</div>
        </div>
    </div>
</section>

<section id="page-content">
	<div class="container">
		<div class="row p-t-50">
			<div class="text-center p-b-50"><h1>STRATEGIC <span style="color:#44a34b">PROGRAMS</span></h1></div>
			<div class="col-md-3" data-animation="fadeInRight" data-animation-delay="200">
                {$result = get_page(1,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
                
                {$result = get_page(2,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
			<div class="col-md-3" data-animation="fadeInRight" data-animation-delay="600">
                {$result = get_page(3,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
				
                {$result = get_page(4,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
			<div class="col-md-3" data-animation="fadeInRight" data-animation-delay="1000">
                {$result = get_page(5,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
				
                {$result = get_page(6,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
			<div class="col-md-3" data-animation="fadeInRight" data-animation-delay="1400">
                {$result = get_page(7,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
				
                {$result = get_page(8,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
		</div>
		<hr>
		<div class="row p-t-50">
			<div class="text-center p-b-50"><h1>SUPPORTING <span style="color:#44a34b">PROGRAMS:</span></h1></div>
			<div class="col-md-3"  data-animation="fadeInRight" data-animation-delay="200">
                {$result = get_page(9,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
				
                {$result = get_page(10,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
			<div class="col-md-3"  data-animation="fadeInRight" data-animation-delay="600">
                {$result = get_page(11,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
				
                {$result = get_page(12,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
			<div class="col-md-3"  data-animation="fadeInRight" data-animation-delay="1000">
                {$result = get_page(13,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
				
                {$result = get_page(14,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
			<div class="col-md-3"  data-animation="fadeInRight" data-animation-delay="1400">
                {$result = get_page(15,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
				
                {$result = get_page(16,$data.slug)}
                {if $data.site_lang eq 'EN'}
                    {$result->content_EN}
                {else}
                    {$result->content_ID}
                {/if}      
			</div>
		</div>	
	</div>
</section>
{/block}