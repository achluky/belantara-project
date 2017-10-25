{extends file="admin/template_dashboard.tpl"} 

{block name="system"}
<div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">CPU Traffic</span>
                  <span class="info-box-number">90<small>%</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">User Accses</span>
                  <span class="info-box-number">2,000</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
</div>
{/block}
{block name="content-headline"}

    <div class="judul-atas-dashboard content-header-media">
		<div class="header-section">
			<img src="{base_url()}assets/img/ipbkecil.png" alt="ipb" class="pull-right" style="margin-right: 10px;margin-top:-6px;" />
			<h1><small>{lang('label.dashboard.title')}</small></h1>
		</div>
		<img src="{base_url()}assets/img/profile_header4.jpg" alt="header image" class="animation-pulseSlow" />
	</div>
{/block}
{block name="content"}
    <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}news" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
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
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.event')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-calendar"></i>
                    </div>
                  </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}announcement" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.announcment')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="glyphicon glyphicon-bullhorn"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}banner" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.banner')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-images"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}page" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.page')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-folder"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}link" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.link')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-link"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}incidental" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.incidental')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-infinite"></i>
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