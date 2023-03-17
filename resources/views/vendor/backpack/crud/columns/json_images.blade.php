@php
    $values = is_string($entry->{$column['name']}) ? json_decode($entry->{$column['name']}, true) : $entry->{$column['name']};
@endphp
@includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start')
<style>
    .modal-backdrop {
        display: none;
    }
</style>

@if (!is_null($values))
    <div class="row">
        @php
            $count = 0;
        @endphp
        @foreach ($values as $image)
            <div class="col-2 mb-2">
                <a data-toggle="modal" data-target="#exampleModal" onclick="view({{ $count }})"><img
                        src="{{ url(str_replace('public', 'storage', $image)) }}"
                        style="max-height: 50px; width: auto; border-radius: 3px;"></a>
            </div>
            @php
                $count++;
            @endphp
        @endforeach
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @if (!is_null($values))
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($values as $image)
                                    <li data-target="#carouselExampleIndicators" class="carousel-item-indicator" data-slide-to="{{ $count }}" id="image_indicator_{{ $count }}"></li>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                            @endif
                        </ol>
                        <div class="carousel-inner">
                            @if (!is_null($values))
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($values as $image)
                                    <div class="carousel-item" id="image_{{ $count }}">
                                        <img class="d-block w-100"
                                            src="{{ url(str_replace('public', 'storage', $image)) }}">
                                    </div>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function view($id) {
            $('.carousel-item').removeClass('active');
            $('.carousel-item-indicator').removeClass('active');
            $('#image_' + $id).addClass('active');
            $('#image_indicator_' + $id).addClass('active');
        }
    </script>
@endif

{{-- @if (!is_null($values))
<div class="row">
    @foreach ($values as $value)
        <div class="col-2 mb-3">
            <a href="" target="_blank" style="max-height: 50px; max-width: 50px;"><img src="{{url(str_replace('public','storage',$value))}}" style="max-height: 50px; width: auto; border-radius: 3px;"></a>
        </div>
    @endforeach
</div> --}}
@includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end')
