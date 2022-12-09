@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label><br>
    <div id="map"></div><br>
    <input type="hidden" name="long" id="long" value="{{ old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? '' }}">
@include('crud::fields.inc.wrapper_end')
@push('crud_fields_styles')
    <style type="text/css">
        #map {
            height: 300px;
            width: 500px;
        }
    </style>
@endpush

@push('crud_fields_scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgbvhp1row82f7t_EvmWXIcgRNlEfHrsY&callback=getLocation&v=weekly"
        async
    ></script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(initMap);
            } else {
                window.alert('Geolocation is not supported by this browser.');
            }
        }

        function initMap(position) {
            document.getElementsByName('lat')[0].value = position.coords.latitude;
            document.getElementById('long').value = position.coords.longitude;

            const myLatlng = { lat: position.coords.latitude, lng: position.coords.longitude };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: myLatlng,
            });
            let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get Lat/Lng!",
                position: myLatlng,
            });

            infoWindow.open(map);
            map.addListener("click", (mapsMouseEvent) => {
                infoWindow.close();
                infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
                });
                var latLng= mapsMouseEvent.latLng.toJSON()
                infoWindow.setContent(
                    JSON.stringify(latLng, null, 2)
                );
                document.getElementsByName('lat')[0].value = latLng.lat;
                document.getElementById('long').value = latLng.lng;
                infoWindow.open(map);
            });
        }
    </script>
@endpush
