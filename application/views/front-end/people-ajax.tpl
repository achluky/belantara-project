
<div class="portfolio-ajax-page">
    <div class="row">
        <div class="col-md-12">
            <div class="project-description">
                <h2>{$data.people->name}</h2>
                {if $data.site_lang eq 'EN'}

                <img src="{base_url()}document/images/employee/{$data.people->image}" class="img-responsive img-people thumbnail" style="width:200px; float: left ; margin-right: 20px; margin-bottom: 20px;" >

                {$data.people->deskripsi_EN}
                {else}
                {$data.people->deskripsi_ID}
                {/if}
                <hr>
            </div>
        </div>
    </div>
</div>
