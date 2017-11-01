
<div class="portfolio-ajax-page">
    <div class="row">
        <div class="col-md-12">
            <div class="project-description">
                <img src="{base_url()}document/images/employee/{$data.people->image}" class="img-responsive img-people">
                <h2>{$data.people->name}</h2>
                {if $data.site_lang eq 'EN'}
                {$data.people->deskripsi_EN}
                {else}
                {$data.people->deskripsi_ID}
                {/if}
                <hr>
            </div>
        </div>
    </div>
</div>
