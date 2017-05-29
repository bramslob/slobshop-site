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
            <a class="button is-medium"
               href="javascript:void(0);"
               onclick="showFormModal(0);">
                <span class="icon">
                  <i class="fa fa-plus"></i>
                </span>
                <span>Create</span>
            </a>
        </div>
    </nav>
    <div id="modal_container">

    </div>
    <div class="lists-container">
        @foreach($data['lists'] as $list)
            @include('lists.partials.listitem')

            @if(!$loop->last)
                <br/>
            @endif
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        var form_url = {!!  json_encode(route('lists_form')) !!};

        function showFormModal(list_id) {
            var url = form_url;
            if (parseInt(list_id) > 0) {
                url += '/' + parseInt(list_id);
            }

            var request = $.ajax({
                method: 'GET',
                url: url,
                dataType: 'html'
            })

            request.done(function (response) {
                $('#modal_container').html(response);
                $('#modal_container .modal').addClass('is-active');
            });
        }

        function showDetails(element)
        {

        }

    </script>
@endsection