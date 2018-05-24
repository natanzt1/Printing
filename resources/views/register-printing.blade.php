<!DOCTYPE html>
<html>
<head>
	<title>Find your journey, lets go outing!</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Nanum+Myeongjo|Nanum+Pen+Script|Nunito|Open+Sans|Poppins|Quicksand|Raleway|Roboto+Condensed|Shadows+Into+Light" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
        width:50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 0.5rem 0.5rem 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
      }

      #pac-container {
        padding-bottom: 0.5rem;
        margin-right: 0.5rem;
      }

      .pac-controls {
        display: inline-block;
        padding: 0.3rem 0.5rem;
      }

      .pac-controls label {
        font-size: 0.5rem;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        margin-bottom: 0.5rem;
        text-overflow: ellipsis;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    </style>

    <style type="text/css">
        label {
            font-family: 'Open Sans', sans-serif;
            font-size: 18px;
            font-weight: bold;
        }

        input, textarea {
            border-radius: 0 !important;
        }

        input:focus, textarea:focus {
            border: 0px;
        }

        input:focus:after, textarea:focus:after {
            display: none;
        }
        input:focus:before, textarea:focus:before {
            display: none;
        }

    </style>
</head>
<body>

	<!--<header>
		<div class="container wrapper">
            <div style="padding-top: 19px; float: left;"><a href="index.php"><img src="#"></a></div> 
            <nav class="menubar">
                <ul>
                    <li><a href="#"><i class="fa fa-angle-left"></i> Dashboard </a></li>
                </ul>
            </nav>
		</div>
	</header>-->
	
	<div class="bg-gradation-lin" style="height: 80px">
        <div class="container wrapper-small ">
            <h2 style="padding-top: 26.5px; color: #000;">Daftarkan Printingmu</h2>
        </div>      
	</div>

	<section class="container wrapper-small">
        <form class="row" action="{{route('printing.store')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="col-lg-12 mt-4">
                <label for="event_name">Nama Printingmu</label>
                <input id="event_name" type="text" name="nama" class="col-lg-8 form-control">
            </div>

            <div class="col-lg-12 mt-4">
                <label for="event_name">Username</label>
                <input id="event_name" type="text" name="username" class="col-lg-8 form-control">
            </div>

            <div class="col-lg-12 mt-4">
                <label for="event_name">Email</label>
                <input id="event_name" type="email" name="email" class="col-lg-8 form-control">
            </div>

            <div class="col-lg-12 mt-4">
                <label for="event_name">Password</label>
                <input id="event_name" type="password" name="password" class="col-lg-8 form-control">
            </div>

            <div class="col-lg-12 mt-4">
                <label for="event_location">Lokasi Lengkapnya</label>
                <input id="event_location" type="text" name="lokasi" class="col-lg-8 form-control">
            </div>


            <div class="col-lg-12 mt-4">
                <label for="map">Pilih Lokasi Printing</label>
                <input id="lat" type="hidden" name="event_lat"/>
                <input id="lng" type="hidden" name="event_lng"/><br>
                <input id="pac-input" class="col-lg-8 form-control" type="text" placeholder="Cari Lokasinya Disini">
                <div id="map" style="width:100%;height:250px;"></div>
            </div>


            <div class="col-lg-12 mt-4">
                <label for="event_description">Deskripsi</label>
                <textarea id="event_description" name="deskripsi" class="form-control" required></textarea>
            </div>


            <div class="col-lg-12 mt-4 mb-5">
                <button name="submit" class="btn btn-primary">Daftarkan</button>
            </div>
            <div id="percobaan"></div>
        </form>
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM&libraries=places"></script>

    <script>
   function initAutocomplete() {
       var mapCanvas = document.getElementById("map");
       var myCenter = new google.maps.LatLng(-1.66995440565646,115.21207809448242);
       var mapOptions = {center: myCenter, zoom: 4};
        
       map = new google.maps.Map(mapCanvas, mapOptions);
        
       marker = new google.maps.Marker({
            position: myCenter,
            map: map
        });

       var infowindow = new google.maps.InfoWindow();

       function placeMarker(location) {
            infowindow.setContent('Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng());
          
            $("#lat").val(location.lat());
            $("#lng").val(location.lng());

            marker.setPosition(location);
            infowindow.open(map,marker);
        }

        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT];

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);
        });
            markers.push(new google.maps.Marker({
              map: map,
              title: place.name,
              position: place.geometry.location
            }));
            var latlngsearch = place.geometry.location;
            var string = latlngsearch.toString();
            var latprocess = string.split("(");
            var latprocess2 = latprocess[1].split(")");
            var latfix = latprocess2[0].split(", ");
            $("#lat").val(latfix[0]);
            $("#lng").val(latfix[1]);
            
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>


<script>
  var i = 1;
  function moreUpload(){  
    var add = document.createElement("input");
    add.setAttribute("type", "file");
    add.setAttribute("name", "fileToUpload");
    add.setAttribute("id", "fileToUpload");
    add.setAttribute("class", "form-control col-lg-5")
    var more = document.getElementById("more");
    more.appendChild(add);
    $("#image_count").val(i);
    i++;
  };
</script>