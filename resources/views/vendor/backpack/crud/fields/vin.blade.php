@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    <div class="input-group">
        @if(isset($field['prefix'])) <div class="input-group-prepend"><span class="input-group-text">{!! $field['prefix'] !!}</span></div> @endif
        <input
            id="VIN"
            type="text"
            name="{{ $field['name'] }}"
            value="{{ old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? '' }}"
            @include('crud::fields.inc.attributes')
        >
        <div class="input-group-append"><button type="button" class="btn btn-success" onclick="checkVIN($('#VIN').val())">Check VIN</button></div>
    </div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

@push('crud_fields_scripts')
    <script>
        function checkVIN(VIN) {
            $.ajax({
                url: "https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVinValues/"+VIN+"?format=json",
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    if(res.Results[0].ModelYear != ""){
                        $('input[name="year"]').val(res.Results[0].ModelYear);
                    }
                    if(res.Results[0].Make != ""){
                        $('input[name="make"]').val(res.Results[0].Make);
                    }
                    if(res.Results[0].Model != ""){
                        $('input[name="model"]').val(res.Results[0].Model);
                    }
                    if(res.Results[0].VehicleType != ""){
                        $('input[name="type"]').val(res.Results[0].VehicleType);
                    }
                    if(res.Results[0].ModelYear == "" && res.Results[0].Make == "" && res.Results[0].Model == "" && res.Results[0].ModelYear == ""){
                        alert("No Data");
                    }
                }
            });
        }
    </script>
@endpush
