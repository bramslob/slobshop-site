@extends('layout')

@section('subtitle')
    Nieuwe lijst
@endsection

@section('content')
    <div class="lists-container">
        {!! Form::open(['route' => 'lists_create']) !!}
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