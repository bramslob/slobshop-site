<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        {!! Form::model($item, ['route' => ['items_store', $list_id, $item_id], 'id' => 'items_form']) !!}
        {!! Form::hidden('action', $action) !!}
            <header class="modal-card-head">
            <p class="modal-card-title">{{ $action === 'create' ? 'Nieuw item' : 'Item wijzigen' }}</p>
            <span class="delete" onclick="closeModal();"></span>
        </header>
        <section class="modal-card-body">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Name</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            {!! Form::text('name', null, ['class' => 'input', 'placeholder' => 'name']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Hoeveelheid</label>
                </div>
                <div class="field-body">
                    <div class="field has-addons is-horizontal">

                        <p class="control">
                            {!! Form::number('data[amount]', 1, ['class' => 'input', 'placeholder' => 'Amount']) !!}
                        </p>
                        <p class="control">
                        <span class="select">
                            {!! Form::select('data[type]', ['pieces' => 'stuks', 'weight' => 'gram'], null, []) !!}
                        </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label">
                    <!-- Left empty for spacing -->
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-success" type="submit">Opslaan</button>
            <a class="button" href="javascript:void(0);" onclick="closeModal();">Annuleren</a>
        </footer>
        {!! Form::close() !!}
    </div>
</div>

<script>
    $('#lists_form').on('submit', function () {
        var $form = $(this);

        $form.attr('disabled', 'disabled');
        $form.find('.is-success')
            .attr('disabled', 'disabled')
            .addClass('is-loading')
    });
</script>