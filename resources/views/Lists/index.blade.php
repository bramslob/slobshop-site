@extends('layout')

@section('subtitle')
    Alle lijsten
@endsection

@section('content')
    <div class="lists-container">
        @foreach($lists as $list)
            <div class="list card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{ $list['name'] }}
                    </p>
                    <a class="card-header-icon">
                  <span class="icon">
                    <i class="fa fa-angle-down"></i>
                  </span>
                    </a>
                </header>
                <footer class="card-footer">
                    <a class="card-footer-item">Archive</a>
                    <a class="card-footer-item">Edit</a>
                    <a class="card-footer-item">Details</a>
                </footer>
            </div>
        @endforeach
    </div>
@endsection