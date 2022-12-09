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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgbvhp1row82f7t_EvmWXIcgRNlEfHrsY&callback=initMap&v=weekly"
        async
    ></script>
    <script>

        function initMap() {
            const myLatlng = { lat: parseFloat(document.getElementsByName('lat')[0].value), lng: parseInt(document.getElementById('long').value) };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: myLatlng,
            });
            let infoWindow = new google.maps.InfoWindow({
                content: '{ lat: '+parseFloat(document.getElementsByName('lat')[0].value)+', lng: '+parseFloat(document.getElementById('long').value)+' }',
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
