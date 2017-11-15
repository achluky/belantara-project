{extends file="admin/template_dashboard.tpl"} 

{block name="content-headline"}

    <div class="judul-atas-dashboard content-header-media">
		<div class="header-section">
			<img src="{base_url()}assets/front-end/images/logo.png" alt="Logo Belantara" class="pull-right" style="margin-right: 10px;margin-top:-6px;" />
			<h1><small>{lang('label.dashboard.title')}</small></h1>
		</div>
		<img src="" alt="header image" class="animation-pulseSlow" />
	</div>
{/block}
{block name="content"}
    <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}news" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>50</h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.news')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}event" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.blog')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document"></i>
                    </div>
                  </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}announcement" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.resource')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-wifi"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
			
    </div>
    <hr/>
	  <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}user" class="small-box-footer">
                  <div class="small-box bg-gray">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.user')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}setting" class="small-box-footer">
                  <div class="small-box bg-gray">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.setting')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="glyphicon glyphicon-cog"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
    </div>
{/block}

{block name="modal"}
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog"  >
            <div class="modal-content" >
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
{/block}

{block name="addon_plugins"}
    <script type="text/javascript" src="{base_url()}assets/plugins/knob/jquery.knob.js"></script>
{/block}


{block name="addon_scripts"}
{/block}