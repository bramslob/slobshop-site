<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        {!! Form::model($list, ['route' => 'lists_store']) !!}
        <header class="modal-card-head">
            <p class="modal-card-title">{{ $action === 'create' ? 'Nieuwe lijst' : 'Lijst wijzigen' }}</p>
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

        </section>
        <footer class="modal-card-foot">
            <button class="button is-success" type="submit">Save changes</button>
            <a class="button" href="javascript:void(0);" onclick="closeModal();">Cancel</a>
        </footer>
        {!! Form::close() !!}
    </div>
</div>