@extends('layout')

@section('subtitle')
    Alle lijsten
@endsection

@section('content')

    <nav class="level is-mobile">
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ count($data['lists']) }}</strong> posts
                </p>
            </div>
        </div>
        <div class="level-right">
            <a class="button is-medium"
               href="javascript:void(0);"
               onclick="App.showFormModal('{{ route('lists_form') }}')">

                <span class="icon">
                  <i class="fa fa-plus"></i>
                </span>
                <span class="is-hidden-mobile">Create</span>
            </a>
        </div>
    </nav>

    <div id="modal_container"></div>

    <div class="lists-container">
        @foreach($data['lists'] as $list)

            @include('lists.partials.listitem')

            @if(!$loop->last)
                <br/>
            @endif
        @endforeach
    </div>
@endsection