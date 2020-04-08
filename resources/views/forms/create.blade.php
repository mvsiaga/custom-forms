@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add New Form</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="POST" action="{{ route('forms.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                                </div>

                                <div class="form-group mt-5">
                                    <h5 class="font-weight-bold">Fields</h5>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="field_name">Name</label>
                                                <input id="field_name" type="text" class="form-control" name="field_name[]" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="field_order">Order</label>
                                                <input id="field_order" type="number" class="form-control" name="field_order[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="fields_container"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary btn-sm float-right" onclick="addField()">
                                                Add Field
                                            </button>
                                        </div>
                                    </div>
                                </div>

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

@section('content-scripts')
<script>
    function addField() {
        let el = document.getElementById('fields_container');

        el.innerHTML += `<div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control" name="field_name[]" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input id="name" type="number" class="form-control" name="field_order[]">
                                </div>
                            </div>
                        </div>`;
        
    }
</script>
@endsection
