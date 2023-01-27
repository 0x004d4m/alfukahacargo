@php
    $values = is_string($entry->{$column['name']}) ?
        json_decode($entry->{$column['name']}, true) :
        $entry->{$column['name']};
@endphp
@includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start')
@if (!is_null($values))
<div class="row p-0 m-0">
    @foreach ($values as $value)
        <div class="col-2 p-0 m-0 mb-3">
            <a href="{{asset('storage/'.str_replace('public/','',$value))}}" target="_blank" style="max-height: 50px; max-width: 50px;"><img src="{{url(str_replace('public','storage',$value))}}" style="max-height: 50px; width: auto; border-radius: 3px;"></a>
        </div>
    @endforeach
</div>
@else
    <span>No Attachments</span>
@endif
@includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end')
