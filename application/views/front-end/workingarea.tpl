{extends file="front-end/template.tpl"} 

{block name="content"}

<section id="page-title" class="page-title-center working-area-header">
    <div class="container">
        <div class="row">
        	<div class="col-md-3"></div>
        	<div class="col-md-3"></div>
        	<div class="col-md-6">
        		<br><br>
        		<div class="page-title">
                    <h1 style="color: #fff;" class="pull-right">GRANT DISTRIBUTION AREA</h1>
                </div>
        	</div>
        </div>
    </div>
</section>

<section id="page-content" class="p-t-100">
	<div class="container">
		<div class="row">
			<div class="text-center"><h2>THE <span style="color:#44a34b">GRANT</span></h2></div>
			<div class="text-center"><h2><span style="color:#44a34b">DISTRIBUTION</span> AREAS</h2></div>
			<div class="col-md-12 p-t-80">
                {$result = get_page(1,$data.slug)}
				<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive">
			</div>
		</div>	
        <hr>
        <div class="row p-t-50">
            {$result = get_page(2,$data.slug)}
        	<div class="col-md-6">
        		<p>
                    {if $data.site_lang eq 'EN'}
                        {$result->content_EN}
                    {else}
                        {$result->content_ID}
                    {/if}      
                </p>
        	</div>

            {$result = get_page(3,$data.slug)}
        	<div class="col-md-6">
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