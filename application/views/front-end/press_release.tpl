{extends file="front-end/template.tpl"} 

{block name="content"}


<section id="page-title" class="page-title-center approach-header" style="background-image: url('http://belantara.or.id/wp-content/uploads/PublicationH01_BelantaraFoundation_1920x600px1.jpg')">
<div class="container">
<div class="page-title text-right">
                    <h1 class="text-dark">PRESS RELEASE</h1>
                </div>
            </div>
        </section>
        <!-- end: Page title -->

     	<!-- Content -->
        <section id="page-content">
            <div class="container">  

                {foreach $data.press_release -> result() as $row}
            	<h2 style="text-align: center; margin-bottom: 20px;">
            		<strong>
	            		<span style="color: #99cc00;">
	            			<b>
	            				{$row->judul}
	            			</b>
	            		</span>
            		</strong>
            	</h2>
				<p>
					<img class="img-responsive float-left p-r-20" src="{base_url()}document/images/press_release/{$row->image}" alt="Professor Jatna Supriatna" width="400" height="400" style="margin: 20px;">
					{$row->isi}
				</p>
				<hr>
				{/foreach}
            </div>
        </section>
{/block}