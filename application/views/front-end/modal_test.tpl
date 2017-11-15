{extends file="front-end/template.tpl"} 

{block name="content"}

<section class="no-padding"  >
            <!-- Google map sensor -->
{literal}
    
    
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDb9oynkLiX1GQk4-Y7iJP6H1fq--ynNFs&sensor=false"></script>
            

    
            <!-- Google map sensor -->
			<script type="text/javascript">
			//<![CDATA[
			
			var map; // Global declaration of the map
			var lat_longs_map = new Array();
			var markers_map = new Array();
            var iw_map;
			
			iw_map = new google.maps.InfoWindow();

				 function initMap() {

				var myLatlng = new google.maps.LatLng(1.082,104.030);
				var myOptions = {
			  		zoom: 6,
					center: myLatlng,
			  		mapTypeId: google.maps.MapTypeId.SATELLITE,
					mapTypeControl: false,
					navigationControl: false,
					streetViewControl: false,
			         scaleControl: true,
					scaleControlOptions: {position: google.maps.ControlPosition.BOTTOM_RIGHT},
					zoomControlOptions: {position: google.maps.ControlPosition.RIGHT_BOTTOM,style: google.maps.ZoomControlStyle.LARGE}}
				map = new google.maps.Map(document.getElementById("map"), myOptions);
				
				var data_layerlanskap1 = new google.maps.Data({map: map});

				data_layerlanskap1.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/1');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap1.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap1.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap2 = new google.maps.Data({map: map});

				data_layerlanskap2.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/2');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap2.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap2.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap3 = new google.maps.Data({map: map});

				data_layerlanskap3.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/3');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap3.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap3.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap4 = new google.maps.Data({map: map});

				data_layerlanskap4.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/4');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap4.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap4.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap5 = new google.maps.Data({map: map});

				data_layerlanskap5.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/5');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap5.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap5.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap6 = new google.maps.Data({map: map});

				data_layerlanskap6.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/6');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap6.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap6.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap7 = new google.maps.Data({map: map});

				data_layerlanskap7.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/7');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap7.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap7.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap8 = new google.maps.Data({map: map});

				data_layerlanskap8.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/8');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap8.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap8.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap9 = new google.maps.Data({map: map});

				data_layerlanskap9.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/9');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap9.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap9.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layerlanskap10 = new google.maps.Data({map: map});

				data_layerlanskap10.loadGeoJson('http://112.78.148.131/webgis//api/lanskaps/10');

				var color = '#FFA500';
				var icon = { url: '', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layerlanskap10.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layerlanskap10.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
				
				var data_layermodis = new google.maps.Data({map: map});

				data_layermodis.loadGeoJson('http://112.78.148.131/webgis//api/fires');

				var color = '#00FF00';
				var icon = { url: 'http://belantara.or.id/wp-content/uploads/fire.png', // url
											scaledSize: new google.maps.Size(7, 7), // scaled size
									};

				data_layermodis.setStyle({
					icon: icon,
					fillColor: color,
					strokeColor: color,
					strokeWeight: 1
				});
				
			 	var infowindow = new google.maps.InfoWindow();
				
			 	data_layermodis.addListener('click', function(event) {
			 		var myHTML = "<table> ";
					event.feature.forEachProperty(function(value,property) {
	 					myHTML = myHTML + " <tr><td>" + property +  "</td><td>:</td><td>&nbsp;" + value + "</tr></td>"
			    });

					myHTML = myHTML + " </table> ";

			 		infowindow.setContent(myHTML);

			 		var anchor = new google.maps.MVCObject();
			 		anchor.set("position",event.latLng);
			 		infowindow.open(map,anchor);
			 	});
                
                     
                    var dangku = new google.maps.LatLng( -3.373131, 104.088383);
                    var berbak = new google.maps.LatLng( -2.035803, 104.659193);
                    var kubu = new google.maps.LatLng( -0.515827, 109.176709);
                    var paduan = new google.maps.LatLng(-0.979655, 109.842047);

                    var marker_1 = new google.maps.Marker({
                        position: berbak,
                        map: map, }); 

                    var marker_2 = new google.maps.Marker({
                        position: dangku,
                        map: map });    

                    var marker_3 = new google.maps.Marker({
                        position: kubu,
                        map: map });   

                    var marker_4 = new google.maps.Marker({
                        position: paduan,
                        map: map });

                    google.maps.event.addListener(marker_1, 'click', function() {
                        $('#berbak').modal('show') });

                    google.maps.event.addListener(marker_2, 'click', function() {
                        $('#dangku').modal('show') });

                    google.maps.event.addListener(marker_3, 'click', function() {
                        $('#kubu').modal('show') });


                    google.maps.event.addListener(marker_4, 'click', function() {
                        $('#paduan').modal('show') });	

			}
		
			google.maps.event.addDomListener(window, "load", initMap);
			
			//]]>
			</script>
    
{/literal}
            <div id="map" style="height:100vh"  data-map-address="Melburne, Australia" data-map-zoom="10" data-map-icon="images/markers/marker1.png" data-map-type="ROADMAP"></div>
        </section>

<div class="modal fade" id="berbak" data-keyboard="false" data-backdrop="false">
  <div class="lab-modal-body background-grey">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <div class="container">
        <h4 class="text-center">COMMUNITY-BASED RESTORATION OF PEAT ECOSYSTEM IN TANJUNG COMMUNITY FOREST IN BERBAK SEMBILANG</h4>
        <div class="row">
            <div class="col-md-4">
                <p class="font-weight-400">PROBLEM STATEMENT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Forest and Land Fires</li>
                    <li>Unsustainable Forest Management</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">STRATEGIC INTERVENTION/ ACTION</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Restoration in the critically</li>
                    <li>Protection from forest fire threats (canal blockings, water reservoire, fire monitoring tower, increase the capabilities of community fire brigade from the targeted villages)</li>
                    <li>Community Development – Education & Sustainable Forestry Awareness Creation</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">PROJECTED IMPACT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>150,000 trees planted in the 300 ha of critically damaged peat land in Tanjung Community Forest</li>
                    <li>Increased Community’s Forest Fire Prevention & Mitigation Capabilities</li>
                    <li>Livelihood improvement</li>
                </ul>
            </div>
        </div>
        
      </div>
   
  </div>
</div>

<div class="modal fade" id="dangku" data-keyboard="false" data-backdrop="false">
  <div class="lab-modal-body background-grey">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <div class="container">
        <h4 class="text-center">RESTORATION, PROTECTION, AND COMMUNITY DEVELOPMENT IN PROTECTED FORESTS IN DANGKU – MERANTI</h4>
        <div class="row">
            <div class="col-md-4">
                <p class="font-weight-400">PROBLEM STATEMENT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Forest and Land Fires</li>
                    <li>Unsustainable Forest Management</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">STRATEGIC INTERVENTION/ ACTION</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Mapping of the community’s social and economic condition, environmental issue, village potentials</li>
                    <li>Village Group and Of cials’ Formation & Capacity Reinforcement</li>
                    <li>Develop biogas-digesters in two villages, as the ‘entry point’ to conduct various activities of restoration, protection, and community development program.</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">PROJECTED IMPACT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>100,000 trees planted in the targeted critically watershed area in Meranti Protected Forest</li>
                    <li>Increased Community’s Forest Fire Prevention & Mitigation Capabilities</li>
                    <li>Livelihood improvement</li>
                    <li>Community’s Environmental & Green Sustainable Practice is improved</li>
                </ul>
            </div>
        </div>
        
      </div>
   
  </div>
</div>

<div class="modal fade" id="kubu" data-keyboard="false" data-backdrop="false">
  <div class="lab-modal-body background-grey">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <div class="container">
        <h4 class="text-center">IMPROVING SUSTAINABLE COASTAL FOREST GOVERNANCE USING VILLAGE BUSINESS MODEL DEVELOPMENT IN KUBU RAYA</h4>
        <div class="row">
            <div class="col-md-4">
                <p class="font-weight-400">PROBLEM STATEMENT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Unclear village boundaries Forest and Land Fire</li>
                    <li>Threat- in the peatland ecosystem</li>
                    <li>Lack of Forest and Land Governance</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">STRATEGIC INTERVENTION/ ACTION</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Develop better village spatial planning</li>
                    <li>Social Forestry through Village Forest Scheme</li>
                    <li>Protection from fire threats</li>
                    <li>Protect nypa-mangrove forest</li>
                    <li>Sustainable Utilization of local commodities (nypa, fisheries, etc)</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">PROJECTED IMPACT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Forest management collaboration</li>
                    <li>40,826-ha will be appointed as Village Forest in 8 villages</li>
                    <li>Establishment of Village Forest Management Unit</li>
                    <li>Mitigate forest fire threat</li>
                    <li>Livelihood improvement via Community Business Model</li>
                </ul>
            </div>
        </div>
        
      </div>
   
  </div>
</div>

<div class="modal fade" id="paduan" data-keyboard="false" data-backdrop="false">
  <div class="lab-modal-body background-grey">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <div class="container">
        <h4 class="text-center">RESTORATION AND PROTECTION OF PROTECTED PEAT FOREST IN PADUAN RIVER AND ITS SURROUNDING IN KUBU RAYA</h4>
        <div class="row">
            <div class="col-md-4">
                <p class="font-weight-400">PROBLEM STATEMENT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Unsustainable practice of Land extension</li>
                    <li>Lack of community capabilities & knowledge in optimizing natural resources</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">STRATEGIC INTERVENTION/ ACTION</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>Forest Rehabilitation in critically at the minimum 100 ha of protected peat forest in Paduan river</li>
                    <li>Community Development - develop biogas-digesters for 5 villages</li>
                    <li>Educate and train the sub- group of communities (farmer group, women group, teachers, ecotourism actor group)</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="font-weight-400">PROJECTED IMPACT</p>
                <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                    <li>100,000 trees planted in the targeted areas in the protected forest</li>
                    <li>Protect the 6,000 ha of protected forest</li>
                    <li>Community development and livelihood improvement (5 villages)</li>
                </ul>
            </div>
        </div>
        
      </div>
   
  </div>
</div>

{/block}