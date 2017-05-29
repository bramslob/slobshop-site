@extends('layout')

@section('subtitle')
    Alle lijsten
@endsection

@section('content')

    <nav class="level">
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ count($data['lists']) }}</strong> posts
                </p>
            </div>
        </div>
        <div class="level-right">
            <a class="button is-medium" href="{{ route('lists_create') }}">
                <span class="icon">
                  <i class="fa fa-plus"></i>
                </span>
                <span>Create</span>
            </a>
        </div>
    </nav>

    <div class="lists-container">
        @foreach($data['lists'] as $list)
            <div class="list card">
                <header class="card-header">
                    <a class="card-header-title">
                        {{ $list['name'] }}
                        {{ $list['updated_at']->diffForHumans() }}
                    </a>
                </header>
            </div>
        @endforeach
    </div>
@endsection