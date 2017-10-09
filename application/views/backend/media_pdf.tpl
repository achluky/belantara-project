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
            <a href="{base_url()}media/add_pdf" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add PDF</a>            <br/><br/>
            {if isset($data.alert) and ($data.alert != '')}
                <div class="callout callout-info">
                    <h4>Info!</h4>
                    <p>{$data.alert}</p>
                </div>
            {/if}
            <div class="panel">
                <div class="row">
                    <div class="panel-body">
                    {foreach $data.media_list->result() as $row}
                            <div class="col-md-4 thumb" style="height:230px;">
                                <div>
                                    <a href="{base_url()}media/delete_pdf/{$row->id}"><span class="glyphicon glyphicon-remove fa-1x" style="float:right;"></span></a>
                                    URL : <input type="text" value="http://ipb.ac.id/media/document/pdf/{$row->slug}.{$row->format}">
                                    <a href="#" class="thumbnail">
                                        <object data="http://ipb.ac.id/media/document/pdf/{$row->slug}.{$row->format}"></object>
                                    </a>
                                </div>
                            </div>
                    {/foreach}
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pager">
                    <li class="previous"><a href="{base_url()}media/pdf?p={$data.page-$data.limit}"><span aria-hidden="true">&larr;</span> P</a></li>
                    <li class="next"><a href="{base_url()}media/pdf?p={$data.page+$data.limit}">N <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>

        </div>
        <!-- /.col -->
    </div>
{/block}


{block name="addon_styles"}
    <script type="text/css">
        img.lazy {
            width: 700px; 
            height: 467px; 
            display: block;

            /* optional way, set loading as background */
            background-image: url('../../../assets/img/loading.gif');
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }
    </script>
{/block}

{block name="addon_scripts"}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script>
        $(function () {
            $('.lazy').lazy();
        });
        $(document).ready(function () {
            $("input[type=text]").focus().select();
        });
    </script>
{/block}