@extends('base')

@section('content')

    <div class="container">
    <div class="mt-5">
        <div class="content">
            <a style="float:left" href="{{$trip->previous_url}}" class="btn btn-danger">Go Back</a>
            <h1>Trip Details</h1>

            <div class="container">
                        <div class="card mt-2">
                            <div class="row mt-3">
                                <div style="float: left" class="col-6">
                                    Requested Date:
                                    {{$trip->request_date->format('Y-m-d H') }} {{$trip->request_date->format('g:i A')}}<br>
                                    Start Time:
                                    {{$trip->pickup_date->format('Y-m-d H') }} {{$trip->pickup_date->format('g:i A')}}
                                </div>
                                <div style="float: right" class="col-6">
                                    Trip Cost: {{isset($trip->cost) ? $trip->cost: ''}}{{isset($trip->cost_unit) ? $trip->cost_unit: ''}}<br>
                                </div>
                            </div>
                            <hr>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6" style="float: left">
                                        <h5 class="card-title" style="margin-left: -10px">
                                            Pickup &nbsp;<span><i class=" fa fa-map-marker"></i></span>
                                            {{isset($trip->pickup_location) ? $trip->pickup_location: ''}}
                                        </h5>
                                        <h5 class="card-title">
                                            Dropoff &nbsp;<span><i class=" fa fa-map-marker"></i></span>
                                            {{isset($trip->dropoff_location) ? $trip->dropoff_location: ''}}
                                        </h5>
                                    </div>
                                    <div class="col-6" style="float:right;">
                                        <h5 class="card-title" style="margin-left: -10px">
                                               start: {{$trip->pickup_date->format('g:i A')}}
                                        </h5>
                                        <h5 class="card-title">
                                            @if(!empty($trip->dropoff_date))
                                            Stop: {{$trip->dropoff_date->format('g:i A') ? $trip->dropoff_date->format('g:i A'): ''}}
                                                @endif
                                        </h5>
                                    </div>
                                </div>

                            <hr class="mt-3">
                                <div class="row mt-3">
                                   <div class="col-md-4">
                                       <p>Cat:{{$trip->type}}</p>
                                       <img src="{{$trip->car_pic}}" class="img-fluid" style="margin-top: -10px">
                                       <p>{{$trip->car_make}} {{$trip->car_model}} {{$trip->car_number}}</p>

                                   </div>
                                    <div class="col-md-4 mt-3">
                                        <hr>
                                       <p>Distance: {{$trip->distance}} {{$trip->distance_unit}}</p>
                                       <p>Duration: {{$trip->duration}} {{$trip->duration_unit}}</p>
                                       <p>Final Price: {{$trip->cost}} {{$trip->cost_unit}}</p>
                                        <hr>
                                   </div>
                                    <div class="col-md-4">
                                        <p>Name: {{$trip->driver_name}}</p>
                                        <img src="{{ $trip->driver_pic }}" class="img-fluid" style="margin-top: -10px">
                                        <p>
                                            Rating:

                                            @php
                                                $rating=(object)['rate'=>3];
                                                for($i=0; $i<5; ++$i){
                                                echo '<i class="checked fa fa-star',($trip->driver_rating <=$i?'-o':''),'" aria-hidden="true"></i>';
                                                }
                                            @endphp
                                        </p>
                                    </div>
                                </div>
                             <hr>


                                <h3>Trip Map</h3>
                                <!--The div element for the map -->
                                <div id="map" style="width: 100%; height: 400px;background-color: grey"></div>
                                <script>

                                         // Initialize and add the map
                                         function initMap() {
                                             // The location of Roysambu
                                             var roysambu = {lat: -1.218459, lng: 36.8869};
                                             //start location
                                             var startL = {lat: -1.118459, lng: 35.8869};
                                             //stop location
                                             var stopL = {lat: -1.20459, lng: 36.2869};
                                             // The map, centered at Roysambu
                                             var map = new google.maps.Map(document.getElementById('map'),{zoom: 4, center: roysambu});
                                             // The marker, positioned at Roysambu
                                             var marker = new google.maps.Marker({position: roysambu, map: map});

                                             var marker1 = new google.maps.Marker({position: startL, map: map});

                                             var marker2 = new google.maps.Marker({position: stopL, map: map});


                                             //geolocation
                                             function geoLocationInit(){
                                                 if(navigator.geolocation){
                                                     navigator.geolocation.getCurrentPosition(success, fail);
                                                 }else{
                                                     alert('Browser Not Supported')
                                                 }
                                             }

                                             geoLocationInit();
                                    }


                                         function searchStart() {

                                         }

                                </script>
                                <!--Load the API from the specified URL
                                * The async attribute allows the browser to render the page while the API loads
                                * The key parameter will contain your own API key (which is not needed for this tutorial)
                                * The callback parameter executes the initMap() function
                                -->
                                <script async defer
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNiZg-hbzTdbaW4NqzmzBHlMiFcwKPvQc&callback=initMap">
                                </script>

                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNiZg-hbzTdbaW4NqzmzBHlMiFcwKPvQc&libraries=places"></script>--}}
    <script>

     /*   $(document).ready(function () {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                scrollwheel: false,
                zoom: 8
            })
        });


        var
        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request,callback);
*/

     /*                      var myLatLng = new google.maps.LatLng(1.2185, 36.8869);

                           function createMap(myLatLng) {

                           }

                           function createMarker(LatLng, icon, name) {

                           }

                           function nearBySearch() {
                               var request = {
                                   location: myLatLng,
                                   radius: '2500',
                                   types: [type]
                               }
                           }
                           service = new google.maps.places.PlacesService(map);
                           service.nearbySearch(request, callback);*/

    </script>

@endsection
