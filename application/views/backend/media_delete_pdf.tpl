{extends file="admin/template.tpl"} 

{block name="breadcrumb"}
    <i class="glyphicon glyphicon-home"></i> &nbsp;
    {$stopbreadcrumb = 0}
    {foreach $data.breadcrumb as $label => $value}
        {if $stopbreadcrumb++ < count($data.breadcrumb)-1}
            <li><a href="{$value}">{$label}</a></li>
            {else}
            <li>{$label}</li>
            {/if}
        {/foreach}
    {/block}
    {block name="content"}
    <div class="row"> 
        <div class="col-xs-12">
            {if isset($data.alert) and ($data.alert != '')}
                <div class="callout callout-info">
                    <h4>Info!</h4>
                    <p>{$data.alert}</p>
                </div>
                <p>
                    <a href="#" class="thumbnail">
                        <object data="http://ipb.ac.id/media/document/pdf/{$data.get_pdf->slug}.original.{$data.get_pdf->format}" height="400" width="1070"></object>
                    </a>
                </p>
            {/if}
            <a href="{base_url()}media"><button type="button" class="btn btn-default">Cancel</button></a>
            <a href="{base_url()}media/delete_pdf/{$data.id_media}?n=true"><button type="submit" class="btn btn-warning">Delete</button></a>
        </div>
        <!-- /.col -->
    </div>
{/block}