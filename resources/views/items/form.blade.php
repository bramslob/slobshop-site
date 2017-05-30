@extends('layout')

@section('subtitle')
    Nieuw item in '{{ $data['list']['name'] }}'
@endsection

@section('content')
    <div class="lists-container">
        {!! Form::open(['route' => ['items_create', $data['list']['id']]]) !!}

        {!! Form::close() !!}
    </div>
@endsection