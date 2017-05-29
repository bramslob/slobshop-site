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
        <a class="card-header-icon">
          <span class="icon">
            <i class="fa fa-angle-down"></i>
          </span>
        </a>
    </header>
    <footer class="card-footer is-narrow" style="display: none;">
        <a class="card-footer-item">Save</a>
        <a class="card-footer-item">Edit</a>
        <a class="card-footer-item">Delete</a>
    </footer>
</div>