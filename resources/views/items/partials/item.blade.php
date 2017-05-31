<div class="item card">
    <header class="card-header">
        <div class="card-header-title">
            <div class="column is-narrow">
                <a class="item-check-button button is-white"
                   href="{{ route('items_check', ['list_id' => $list['id'], 'item_id' => $item['id']]) }}"
                   data-checked="{{ $item['checked'] }}">
                    <span class="icon is-medium">
                      <i class="fa {{ (bool)$item['checked'] !== false ? 'fa-check-square-o checked-item' : 'fa-square-o' }}"></i>
                    </span>
                </a>
            </div>
            <div class="column">
                {{ $item['name'] }}
            </div>
            <div class="has-text-right column is-narrow is-hidden-phone">
                {{ $item['updated_at']->diffForHumans() }}
            </div>
        </div>
        <a class="card-header-icon is-hidden-mobile"
           href="javascript:void(0);"
           onclick="App.showDetails(this)">

          <span class="icon rotatable">
            <i class="fa fa-angle-down"></i>
          </span>
        </a>
    </header>
    @if(!empty($item['data']))
        <div class="card-content">
            <div class="columns">
                <div class="column">
                    {{ array_get($item['data'], 'amount', 1) }}
                    @include('items.partials.types', ['type' => array_get($item['data'], 'type', 'pieces')])
                </div>
                <div class="column is-narrow is-visible-phone">
                    {{ $item['updated_at']->diffForHumans() }}
                </div>
            </div>
        </div>
    @endif
    <footer class="card-footer is-narrow is-flex-mobile" style="display: none;">
        <a class="card-footer-item"
           href="javascript:void(0);"
           onclick="App.showFormModal('{{ route('items_form', ['list_id' => $list['id'], 'item_id' => $item['id']]) }}')">

            <i class="fa fa-pencil"></i> &nbsp;
            <span class="is-hidden-mobile">
                Edit
            </span>
        </a>
        <a class="card-footer-item">
            <i class="fa fa-trash"></i> &nbsp;
            <span class="is-hidden-mobile">
                Delete
            </span>
        </a>
    </footer>
</div>