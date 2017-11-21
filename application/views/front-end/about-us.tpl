{extends file="front-end/template.tpl"} 

{block name="addon_styles"}
{/block}

{block name="content"}
	<section id="page-title" class="page-title-center approach-header" style="background-image:url('http://belantara.or.id/wp-content/uploads/HistoryH01_BelantaraFoundation_1920x600px1.jpg') !important">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-3"></div>
	        	<div class="col-md-4"></div>
	        	
	        </div>
	    </div>
	</section>
	<section id="page-content" class="p-t-100">
		<div class="container p-b-20">
	        <div class="page-title text-center p-b-20">
	                <h1 style="color: #333;" id="about_us" data-type="text" data-pk="1" data-title="Enter username">ABOUT US</h1>
	        </div>
			
			<div class="row scrollme">
	            {$result = get_page(1,$data.slug)}
				<div class="col-md-6">
	                <p>
                		{if $data.site_lang eq 'EN'}
                			{$result->content_EN}
                		{else}
                			{$result->content_ID}
                		{/if}
	                </p>
				</div>
	            {$result = get_page(2,$data.slug)}
				<div class="col-md-6 animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="200">
					<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="about us 1" class="img-responsive" style="margin: 10px; z-index: 1; position: relative;">
				</div>
			</div>

			<div class="row scrollme">
	            {$result = get_page(3,$data.slug)}
				<div class="col-lg-6 hidden-xs hidden-sm col-md-6 col-sm-6 animateme" data-when="view" data-from="0.65" data-to="0.15" data-translatex="-200" data-opacity="0" style="opacity: 0; transform: translate3d(-200px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">
					<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="about us 1" class="img-responsive" style="z-index: -10; position: relative; margin: 10px;">
				</div>
	            {$result = get_page(4,$data.slug)}
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

			<div class="row scrollme">
	            {$result = get_page(5,$data.slug)}
				<div class="col-md-6">
					<p>
                		{if $data.site_lang eq 'EN'}
                			{$result->content_EN}
                		{else}
                			{$result->content_ID}
                		{/if}
					</p>
				</div>
	            {$result = get_page(6,$data.slug)}
				<div class="col-md-6">
					<img src="{base_url()}assets/front-end/images/{$result->content_EN}" alt="" class="img-responsive" style=" margin: 10px;">	
				</div>
			</div>

			<div class="row scrollme">
	            {$result = get_page(7,$data.slug)}
                <div class="col-md-6">
                    <p>
                		{if $data.site_lang eq 'EN'}
                			{$result->content_EN}
                		{else}
                			{$result->content_ID}
                		{/if}
                    </p>
                </div>
	            {$result = get_page(8,$data.slug)}
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


{block name="addon_scripts"}
{/block}