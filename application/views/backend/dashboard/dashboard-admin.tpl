{extends file="backend/template_dashboard.tpl"} 

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
                <a href="{base_url()}link" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.menu')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-drag"></i>
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
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.faculties')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-planet"></i>
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
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.reputation')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-paper-airplane"></i>
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
    <hr>
	<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}wcu/internationalization" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
					  <h3><img src="{base_url()}assets/img/qs.png" alt="qs" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.internationalization')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="glyphicon glyphicon-globe"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}wcu/academic" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/qs.png" alt="qs" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.academic_reputation')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ribbon-a"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}wcu/employe" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/qs.png" alt="qs" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.employer_reputation')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-happy"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}wcu/reserach_publication" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/qs.png" alt="qs" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.research_publication')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-flask"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}wcu/data_university" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/qs.png" alt="qs" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.data_university')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-university"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
    </div>
    <hr>
	<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}user" class="small-box-footer">
                  <div class="small-box bg-gray">
                    <div class="inner">
                       <h3><img src="{base_url()}assets/img/component.png" alt="component" style="width:30px;"/></h3>
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
                      <h3><img src="{base_url()}assets/img/component.png" alt="component" style="width:30px;"/></h3>
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