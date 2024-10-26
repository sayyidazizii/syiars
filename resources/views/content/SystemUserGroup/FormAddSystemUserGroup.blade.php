@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header') < h1 > Dashboard</h1>
@stop

@section('js') < script > function check_all() {
    $(':checkbox').each(function () {
        this.checked = true;
    });
}
function uncheck_all() {
    $(':checkbox').each(function () {
        this.checked = false;
    });
}
</script>
@stop

@section('content') < form method = "post" action = "{{ route('system-user-group.store') }}" enctype = "multipart/form-data" > @csrf < div class = "form-group" > <a class="text-dark">Nama Group<a class="text-danger">
        *</a>
</a>
<input
    class="form-control input-bb"
    type="text"
    name="user_group_name"
    id="user_group_name"
    value=""/>
</div>

<button onclick="check_all()" class="btn btn-sm btn-info" title="Check All">Check All</button> < button onclick = "uncheck_all()" class = "btn btn-sm btn-info" title = "Uncheck All" > Uncheck All</button>

@foreach($systemmenu as $key => $val)
@if($val['indent_level'] == 1) < div class = "indent_first" > <input
    type="checkbox"
    class="checkboxes"
    name="checkbox_{{ $val['id_menu'] }}"
    id="checkbox_{{ $val['id_menu'] }}"
    value="1"/>{{ $val['text'] }} < /div>
        @elseif($val['indent_level'] == 2)
            <div class="indent_second">
                <input type="checkbox" class="checkboxes" name="checkbox_{{ $val['id_menu'] }}" id="checkbox_{{ $val['id_menu'] }}" value="1" / > {{ $val['text'] }} < /div>
        @elseif($val['indent_level'] == 3)
            <div class="indent_third">
                <input type="checkbox" class="checkboxes" name="checkbox_{{ $val['id_menu'] }}" id="checkbox_{{ $val['id_menu'] }}" value="1" / > {{ $val['text'] }} < /div>
        @endif
    @endforeach
</form > @stop

@section('css') < link rel = "stylesheet" href = "/css/admin_custom.css" > @stop
