{extends file="admin/template_dashboard.tpl"} 

{block name="content-headline"}
{/block}
{block name="content"}
    <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}news" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
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
                <a href="{base_url()}adminblog" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
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
                <a href="{base_url()}resource" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">{lang('label.dashboard.resource')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-wifi"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}adminrelatednews" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">Related News</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}adminpressrelease" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">Press Release</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}adminreference" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">Reference Manajement</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}page" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">{lang('navigation.navbar.page')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-folder"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}pagehome" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">{lang('navigation.navbar.pagehome')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-folder"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}slider" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">{lang('navigation.navbar.slider')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-images"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}gallery_manajement" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">{lang('navigation.navbar.banner')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-images"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="{base_url()}person" class="small-box-footer">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
                      <p><strong style="text-transform: uppercase;">{lang('navigation.navbar.person')}</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-stalker"></i>
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
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
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
                      <h3><img src="{base_url()}assets/img/www.png" alt="www" style="width:30px;"></h3>
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