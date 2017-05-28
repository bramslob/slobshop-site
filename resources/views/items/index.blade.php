@extends('layout')

@section('subtitle')
    Lijst {{ $data['list']['name'] }}
@endsection

@section('content')

    <nav class="level">
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ count($data['items']) }}</strong> items
                </p>
            </div>
        </div>
        <div class="level-right">
            <a class="button is-medium" href="{{ route('items_create', ['list_id' => $data['list']['id']]) }}">
                <span class="icon">
                  <i class="fa fa-plus"></i>
                </span>
                <span>Create</span>
            </a>
        </div>
    </nav>

    <div class="lists-container">
        @foreach($data['items'] as $item)
            <div class="list card">
                <header class="card-header">
                    <a class="card-header-title">
                        {{ $item['name'] }}
                    </a>
                </header>
            </div>
        @endforeach
    </div>
@endsection