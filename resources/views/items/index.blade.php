@extends('layout')

@section('subtitle')
    Lijst {{ $data['list']['name'] }}
@endsection

@section('content')

    <nav class="level is-mobile">
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
                <span class="is-hidden-mobile">Create</span>
            </a>
        </div>
    </nav>

    <div class="items-container">
        @foreach($data['items'] as $item)
            <div class="item card">
                <header class="card-header">
                    <a class="card-header-title">
                        {{ $item['name'] }}
                        {{ $item['updated_at']->diffForHumans() }}
                    </a>
                </header>
            </div>
        @endforeach
    </div>
@endsection