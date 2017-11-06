{extends file="front-end/template.tpl"} 

{block name="content"}

<section class="no-padding" data-height-lg="500" data-height-xs="200" data-height-sm="300">
            <!-- Google map sensor -->
            <script>
            function initMap() {
  var map;
  var mapOptions = {
    zoom: 14,
    center: new google.maps.LatLng(-6.1928022, 106.8289236),
    disableUi: true
  };
  map = new google.maps.Map(document.getElementById('map'),
      mapOptions);
  var markers = [
        ['Delegación, Benito Juarez', -6.1928022, 106.8289236]
    ];
    var myLatlng = new google.maps.LatLng(-6.1928022, 106.8289236);
    var marker_1 = new google.maps.Marker({
        position: myLatlng,
        map: map,
        name: 'Benito Juarez'
    });
  
    google.maps.event.addListener(marker_1, 'click', function() {
		$('#modalStripTop').modal('show')
    });
                google.maps.event.addDomListener(window, 'load', initMap);
}


            </script>
             <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTCAsXiCfqrU0uj2NSlhf8Nv3OYpRYPDc&callback=initMap">
    </script>
            <div id="map"  data-height-lg="200" class="map" data-map-address="Melburne, Australia" data-map-zoom="10" data-map-icon="images/markers/marker1.png" data-map-type="ROADMAP"></div>
        </section>
        <!-- end: Page title -->

        <!-- CONTENT -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-uppercase">Get In Touch</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condimentum porttitor cursus. Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada fermentum bibendum.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla luctus. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.</p>


                        <div class="row m-t-40">
                            <div class="col-md-6">
                                <address>
			  <strong>BELANTARA FOUNDATION</strong><br>
			  Boutique Office,3rd Floor, Jl. Timor No. 6, Menteng, RT.9/RW.4<br>
                                    Gondangdia, Menteng, Jakarta<br> Daerah Khusus Ibukota Jakarta 10350<br>
			  <abbr title="Phone">P:</abbr> (021) 13915434
			</address>
                            </div>
                        </div>




                        <div class="social-icons m-t-30 social-icons-colored">
                            <ul>
                                <li class="social-facebook"><a href="https://www.facebook.com/BelantaraFoundation/"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="https://twitter.com/belantara" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-instagram"><a href="https://instagram.com/belantara_found" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li class="social-youtube"><a href="https://www.youtube.com/channel/UCqfoC1TtQihrB_nYnKIFJYQ" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <form class="widget-contact-form" action="" role="form" method="post">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name">Name</label>
                                    <input type="text" aria-required="true" name="widget-contact-form-name" class="form-control required name" placeholder="Enter your Name">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">Email</label>
                                    <input type="email" aria-required="true" name="widget-contact-form-email" class="form-control required email" placeholder="Enter your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="subject">Your Subject</label>
                                    <input type="text" name="widget-contact-form-subject" class="form-control required" placeholder="Subject...">
                                </div>
                            </div>                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea type="text" name="widget-contact-form-message" rows="5" class="form-control required" placeholder="Enter your Message"></textarea>
                                </div>

                                 <div class="form-group">
                                      <script src='https://www.google.com/recaptcha/api.js'></script>
                                    <div class="g-recaptcha" data-sitekey="6LddCxAUAAAAAKOg0-U6IprqOZ7vTfiMNSyQT2-M"></div>
                                </div>
                            <button class="btn btn-default" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- end: CONTENT -->

{/block}