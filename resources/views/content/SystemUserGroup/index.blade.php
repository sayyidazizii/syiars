@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('js')
<script>
    function check_all() {
        $(':checkbox').prop('checked', true);
    }

    function uncheck_all() {
        $(':checkbox').prop('checked', false);
    }
</script>
@stop

@section('content')
    <form method="post" action="{{ route('system-user-group.store') }}" enctype="multipart/form-data">
        @csrf 
        <div class="form-group">
            <label for="user_group_name" class="text-dark">Nama Group 
                <span class="text-danger">*</span>
            </label>
            <input class="form-control input-bb" type="text" name="user_group_name" id="user_group_name" value=""/>
        </div>

        <button type="button" onclick="check_all()" class="btn btn-sm btn-info" title="Check All">Check All</button> 
        <button type="button" onclick="uncheck_all()" class="btn btn-sm btn-info" title="Uncheck All">Uncheck All</button>
        
        @foreach($systemmenu as $val) 
            <div class="{{ $val['indent_level'] == 1 ? 'indent_first' : ($val['indent_level'] == 2 ? 'indent_second' : 'indent_third') }}"> 
                <input type="checkbox" class="checkboxes" name="checkbox_{{ $val['id_menu'] }}" id="checkbox_{{ $val['id_menu'] }}" value="1"/> 
                {{ $val['text'] }}
            </div>
        @endforeach
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
