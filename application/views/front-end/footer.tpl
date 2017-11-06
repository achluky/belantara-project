        <!-- Footer -->
        <footer id="footer" class="footer-light">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Footer widget area 1 -->
                            <div class="widget clearfix widget-contact-us">
                                <img src="{base_url()}assets/front-end/images/logo.png" class="img-responsive" alt="">
                                <div class="social-icons social-icons-border float-left m-t-60">
                                    <ul>
                                        <li class="social-facebook"><a href="https://www.facebook.com/BelantaraFoundation/"><i class="fa fa-facebook"></i></a></li>
                                        <li class="social-twitter"><a href="https://twitter.com/belantara" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li class="social-instagram"><a href="https://instagram.com/belantara_found" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        <li class="social-youtube"><a href="https://www.youtube.com/channel/UCqfoC1TtQihrB_nYnKIFJYQ" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                                <!-- end: Social icons -->
                            </div>
                            <!-- end: Footer widget area 1 -->
                        </div>
                        <div class="col-md-2">
                            <!-- Footer widget area 2 -->
                            <div class="widget">
                                <h4>About</h4>
                                <ul class="list-icon list-icon-caret list-icon-colored">
                                    <li><a href="#">Our People</a></li>
                                    <li><a href="#">Our Goal</a></li>
                                    <li><a href="#">Our Approach</a></li>
                                </ul>
                            </div>
                            <!-- end: Footer widget area 2 -->
                        </div>
                        <div class="col-md-2">
                            <!-- Footer widget area 2 -->
                            <div class="widget">
                                <h4>Project</h4>
                                <ul class="list-icon list-icon-caret list-icon-colored">
                                    <li><a href="#">Project List</a></li>
                                    <li><a href="#">Maps</a></li>
                                    <li><a href="#">Impact</a></li>
                                </ul>
                            </div>
                            <!-- end: Footer widget area 2 -->
                        </div>
                        <div class="col-md-2">
                            <!-- Footer widget area 2 -->
                            <div class="widget">
                                <h4>Updates</h4>
                                <ul class="list-icon list-icon-caret list-icon-colored">
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Resources</a></li>
                                </ul>
                            </div>
                            <!-- end: Footer widget area 2 -->
                        </div>
                        <div class="col-md-2">
                            <!-- Footer widget area 2 -->
                            <div class="widget">
                                <h4>Grants</h4>
                                <ul class="list-icon list-icon-caret list-icon-colored">
                                    <li><a href="#">Proposal</a></li>
                                    <li><a href="#">Register</a></li>
                                    <li><a href="#">Member</a></li>
                                </ul>
                            </div>
                            <!-- end: Footer widget area 2 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">Copyright &copy; 2017 Belantara Foundation. All Rights Reserved.<a href="http://www.belantara.or.id" target="_blank"></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->

    </div>
    <!-- end: Wrapper -->

    <!-- Go to top button -->
    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>

    <!--Plugins-->
    <script src="{base_url()}assets/front-end/js/jquery.js"></script>
    <script src="{base_url()}assets/front-end/js/plugins.js"></script>
    <script src="{base_url()}assets/front-end/js/jquery.scrollme.js"></script>

    <!--Template functions-->
    <script src="{base_url()}assets/front-end/js/functions.js"></script>

    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <link rel="stylesheet" type="text/css" href="{base_url()}assets/front-end/js/plugins/revolution/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="{base_url()}assets/front-end/js/plugins/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="{base_url()}assets/front-end/js/plugins/revolution/css/navigation.css">

    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="{base_url()}assets/front-end/js/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>

    <script type="text/javascript">
        var tpj = jQuery;

        var revapi30;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_30_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_30_1");
            } else {
                revapi30 = tpj("#rev_slider_30_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "{base_url()}assets/front-end/js/plugins/revolution/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 50,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "hermes",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            }
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: "smart",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); 

    </script>

</body>

</html>
