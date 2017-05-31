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
               onclick="App.showFormModal('{{ route('items_form', ['list_id' => $data['list']['id']]) }}')">

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

            @include('items.partials.item', ['list' => $data['list']])

            @if(!$loop->last)
                <br/>
            @endif
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        $('.items-container').on('click', '.item-check-button', function (event) {
            event.preventDefault();

            var $element = $(this),
                $icon = $element.find('.fa'),
                url = $element.attr('href'),
                checked = $element.data('checked'),
                new_checked = checked === 1 ? 0 : 1,
                request;

            request = $.ajax({
                method: 'POST',
                url: url,
            });

            $element.addClass('is-loading');
            $icon.removeClass('fa-square-o fa-check-square-o checked-item');

            request.done(function () {
                if (new_checked === 1) {
                    $icon.addClass('fa-check-square-o checked-item');
                }
                else {
                    $icon.addClass('fa-square-o');

                }
                $element.data('checked', new_checked);
                $element.removeClass('is-loading');
            });

        });
    </script>
@endsection