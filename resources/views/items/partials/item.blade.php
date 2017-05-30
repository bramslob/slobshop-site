<div class="list card">
    <header class="card-header">
        <div class="card-header-title" href="{{ route('items_overview', ['list_id' => $item['id']]) }}">
            <div class="column is-narrow">
                <a class="item-check-button button is-white" href="javascript:void(0);" onclick="checkItem({{ $item['id'] }})">
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
           onclick="showDetails(this)">

          <span class="icon rotatable">
            <i class="fa fa-angle-down"></i>
          </span>
        </a>
    </header>
    <footer class="card-footer is-narrow is-flex-mobile" style="display: none;">
        <a class="card-footer-item"
           href="javascript:void(0);"
           onclick="showFormModal({{ $item['id'] }});">
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