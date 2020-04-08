@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ $form->name }}</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('public-forms.store', ['slug' => $form->slug]) }}">
                                @csrf

                                @foreach($form->fields as $field)
                                <div class="form-group">
                                    <label for="{{ $field->tag }}">{{ $field->name }}</label>
                                    <input id="{{ $field->tag }}" type="text" class="form-control" name="{{ $field->tag }}">
                                </div>
                                @endforeach

                                <div class="form-group row mb-0">
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-success">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection