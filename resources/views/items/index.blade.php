@extends('layout')

@section('subtitle')
    Lijst {{ $data['list']['name'] }}
@endsection

@section('content')

    <nav class="level is-mobile">
        <div class="level-left">
            <div class="level-item">

                <a class="button is-medium"
                   href="{{ route('lists_overview') }}">

                    <span class="icon">
                      <i class="fa fa-angle-left"></i>
                    </span>
                    <span class="is-hidden-mobile">Lijsten</span>
                </a>
            </div>
            <div class="level-item">
                <p class="subtitle">
                    <strong>{{ count($data['items']) }}</strong> items
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
                <span class="is-hidden-mobile">Create</span>
            </a>
        </div>
    </nav>

    <div id="modal_container"></div>

    <div class="items-container">
        @foreach($data['items'] as $item)

            @include('items.partials.item')

            @if(!$loop->last)
                <br/>
            @endif
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        var form_url = {!!  json_encode(route('items_form', ['list_id' => $data['list']['id']])) !!},
            details_sliding = false,
            $modal_container = $('#modal_container');

        function showFormModal(list_id) {
            var url = form_url;

            if (parseInt(list_id) > 0) {
                url += '/' + parseInt(list_id);
            }

            var request = $.ajax({
                method: 'GET',
                url: url,
                dataType: 'html'
            });

            request.done(function (response) {
                $modal_container
                    .html(response);

                $modal_container
                    .find('.modal')
                    .addClass('is-active');
            });
        }

        function closeModal() {
            $modal_container
                .find('.modal')
                .removeClass('is-active');
        }

        function showDetails(element) {
            if (details_sliding !== false) {
                return false;
            }

            details_sliding = true;

            var $element = $(element),
                $parent = $element.parents('.card'),
                $arrow = $element.find('.icon'),
                $details = $parent.find('.card-footer');

            if ($parent.data('openDetails') !== true) {

                $arrow.addClass('rotated');
                $details.slideDown(200, function () {
                    $parent.data('openDetails', true);
                    details_sliding = false;
                });
                return;
            }

            $arrow.removeClass('rotated');
            $details.slideUp(200, function () {

                $parent.data('openDetails', false);
                details_sliding = false;
            });
        }
    </script>
@endsection