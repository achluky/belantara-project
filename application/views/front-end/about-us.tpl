{extends file="front-end/template.tpl"} 


{block name="addon_styles"}
		<link href="{base_url()}assets/assert/js/bootstrap.min.css" rel="stylesheet">
		<link href="{base_url()}assets/assert/js/bootstrap-editable.css" rel="stylesheet">
        <link href="{base_url()}assets/assert/js/bootstrap-wysihtml5-0.0.3.css" rel="stylesheet"> 
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
			
            {foreach $data.about_us -> result() as $row}
			<div class="row scrollme">

                {if $data.site_lang eq 'EN'}
					{assign var="split" value="/"|explode:$row->content_EN}
					{if $split[0] eq 'images'}
						<div class="col-md-6" data-animation="fadeInRight" data-animation-delay="200">
							<img src="{base_url()}assets/front-end/images/{$split[1]}" alt="about us 1" class="img-responsive" style="z-index: 1; position: relative;">
						</div>
					{/if}
					{if $split[0] eq 'textarea'}

						<div class="col-md-6" >
							<p>{$split[1]}</p>
						</div>
					{/if}
                {else}
					{assign var="split" value="/"|explode:$row->content_ID}
					{if $split[0] eq 'images'}
						<div class="col-md-6" data-animation="fadeInRight" data-animation-delay="200">
							<img src="{base_url()}assets/front-end/images/{$split[1]}" alt="about us 1" class="img-responsive" style="z-index: 1; position: relative;">
						</div>
					{/if}
					{if $split[0] eq 'textarea'}

						<div class="col-md-6" >
							<p>{$split[1]}</p>
						</div>
					{/if}

                {/if}

			</div>
			{/foreach}
		</div>
	</section>
{/block}


{block name="addon_scripts"}

{/block}