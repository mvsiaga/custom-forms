@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Forms</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('forms.create') }}" type="submit" class="btn btn-primary float-right">Add Form</a>
                        </div>
                    </div>

                    <table class="table mt-3">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                            <tr>
                                <td>{{ $form->name }}</td>
                                <td><a href="{{ env('APP_URL') . 'public-forms/' . $form->slug }}" target="_blank">{{ env('APP_URL'). 'public-forms/' . $form->slug }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
