<div class="list card">
    <header class="card-header">
        <a class="card-header-title" href="{{ route('items_overview', ['list_id' => $list['id']]) }}">
            <span class="column">
                {{ $list['name'] }}
            </span>
            <span class="has-text-right column is-narrow">
                {{ $list['updated_at']->diffForHumans() }}
            </span>
        </a>
        <a class="card-header-icon"
           href="javascript:void(0);"
           onclick="showDetails(this)">
          <span class="icon rotatable">
            <i class="fa fa-angle-down"></i>
          </span>
        </a>
    </header>
    <footer class="card-footer is-narrow" style="display: none;">
        <a class="card-footer-item"
           href="javascript:void(0);"
           onclick="showFormModal({{ $list['id'] }});">
            <i class="fa fa-pencil"></i> &nbsp;
            <span class="is-hidden-mobile">
                Edit
            </span>
        </a>
        <a class="card-footer-item">
            <i class="fa fa-check"></i> &nbsp;
            <span class="is-hidden-mobile">
                Done
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