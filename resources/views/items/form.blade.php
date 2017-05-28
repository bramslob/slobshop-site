@extends('layout')

@section('subtitle')
    Nieuw item in '{{ $data['list']['name'] }}'
@endsection

@section('content')
    <div class="lists-container">
        {!! Form::open(['route' => ['items_create', $data['list']['id']]]) !!}
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
                <label class="label">Amount</label>
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
        {!! Form::close() !!}
    </div>
@endsection