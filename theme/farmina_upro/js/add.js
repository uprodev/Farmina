jQuery(document).ready(function($) { 

	document.addEventListener('wpcf7mailsent', function(event) {
		$.fancybox.close();
		$.fancybox.open($('#send-ok'), {
			touch:false,
			autoFocus:false,
		});
	}, false);


	$('nav.pagination li:has(span.current)').addClass('active');


	function submit_with_code() {
		$('.submit_with_code').on('click', function(e){
			$('.phone_code').val($('.iti__selected-dial-code').text());
		});
	}
	submit_with_code();

	function upload_cv() {
		$('.upload_cv').on('click', function(e){
			$('.vacancy_title').val($(this).closest('.accordion-panel').siblings('.accordion-thumb').find('p.title').text());
		});
	}
	upload_cv();


	$(document).on('change', '#vacancy_cat, #vacancy_city', function(e){
		e.preventDefault();

		let data = {
			'action': 'filter_vacancies',
			'vacancy_cat': $('#vacancy_cat').val(),
			'vacancy_city': $('#vacancy_city').val(),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					$("#response_vacancies").html(data);
					$(".fancybox").fancybox({
						touch:false,
						autoFocus:false,
					});
					upload_cv();
					submit_with_code();
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	});


	$(document).on('change', '#pharmacy_city, #pharmacy_time', function(e){
		e.preventDefault();

		let data = {
			'action': 'filter_pharmacies',
			'pharmacy_city': $('#pharmacy_city').val(),
			'pharmacy_time': $('#pharmacy_time').val(),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					try {
						var result = JSON.parse(data);
						$("#response_pharmacies").html(result[0]);
						load_map(result[1]);
					} catch (e) {
						$("#response_pharmacies").html(data);
					}
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	});

});


var pharmacies_ = php_vars.pharmacies_arr_for_js;
function load_map(pharmacies){
	if (document.getElementById('map')) {
		//if(pharmacies.length != 5) debugger
		document.getElementById('map').innerHTML = '';
	// code to draw map
		var map;
		var col = '#FF0000';
		var link ;
		var latLng;
		var polypoints;
		var marker, i;
		var markers = {};
		var markersArray = [];
		var infowindow;

		function initialize() {
			var locations_programs = [];

			for (var i = 0; i < pharmacies.length; i++) {
				locations_programs.push(['Office' + i, pharmacies[i].map.lat, pharmacies[i].map.lng, 1, '/wp-content/themes/farmina_upro/img/map.svg', ''])
			}


			var labelIndex = 0;
			var mapOptions = {

				center: new google.maps.LatLng(pharmacies[0].map.lat, pharmacies[0].map.lng),
				zoom: 14,

				scaleControl: true,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoomControl: false,
				panControl: false,
				mapTypeControl: false,
				scrollwheel: false,
				disableDefaultUI: true,

			};

			map = new google.maps.Map(document.getElementById('map'),
				mapOptions);


      //***  PROGRAMS


			var id = 'programs';
			var programs = [];
			var currentMark;
			infowindow = new google.maps.InfoWindow();

			for (var i = 0; i < pharmacies.length; i++) {
				programs.push('<div id="content">' +
					'<h1 id="firstHeading" class="firstHeading">' + pharmacies[i].title + '</h1>' +
					'<div id="bodyContent">' +
					'<figure class="map-img"><img src="' + pharmacies[i].image + '" alt=""></figure>' +
					'<p class="title text">' + pharmacies[i].address + '</p>' +
					'<p class="tel text"><a href="tel:+' + pharmacies[i].phone_regex + '">' + pharmacies[i].phone + '</a></p>' +
					'<p class="time text"><span>Monday</span> <span>' + pharmacies[i].schedule.day_1.start + '-' + pharmacies[i].schedule.day_1.end + '</span></p>' +
					'<p class="text"><span>Tuesday</span> <span>' + pharmacies[i].schedule.day_2.start + '-' + pharmacies[i].schedule.day_2.end + '</span></p>' +
					'<p class="text"><span>Wednesday</span> <span>' + pharmacies[i].schedule.day_3.start + '-' + pharmacies[i].schedule.day_3.end + '</span></p>' +
					'<p class="text"><span>Thursday</span> <span>' + pharmacies[i].schedule.day_4.start + '-' + pharmacies[i].schedule.day_4.end + '</span></p>' +
					'<p class="text"><span>Friday</span> <span>' + pharmacies[i].schedule.day_5.start + '-' + pharmacies[i].schedule.day_5.end + '</span></p>' +
					'<p class="text"><span>Saturday</span> <span>' + pharmacies[i].schedule.day_6.start + '-' + pharmacies[i].schedule.day_6.end + '</span></p>' +
					'<p class="text"><span>Sunday</span> <span>' + pharmacies[i].schedule.day_0.start + '-' + pharmacies[i].schedule.day_0.end + '</span></p>' +
					'</div>' +
					'</div>');
			}

			for (i = 0; i < locations_programs.length; i++) {
				var id = 'programs-' + i;

				marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations_programs[i][1], locations_programs[i][2], locations_programs[i][3]),

					map: map,
					id: id,
					icon: {
						url: '/wp-content/themes/farmina_upro/img/map.svg',
						labelOrigin: new google.maps.Point(21, 26)
					},
					url: locations_programs[i][3],
					zIndex: 100

				});

				google.maps.event.addListener(marker, 'click', (function (marker, i) {
					return function () {
						infowindow.setContent(programs[i]);
						infowindow.open(map, marker);

						//console.log(marker)

					}
				})(marker, i));

				google.maps.event.addListener(infowindow, 'closeclick', function () {
					currentMark.setIcon({
						url: '/wp-content/themes/farmina_upro/img/map.svg',
						labelOrigin: new google.maps.Point(21, 26)
					});

				});



				markersArray.push(marker);
			}


		}

		initialize();
		/*google.maps.event.addDomListener(window, 'load', initialize);*/
	}
}
load_map(pharmacies_);