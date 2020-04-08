@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Contacts</div>

                <div class="card-body">
                    <table class="table mt-3">
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>
                                <h5>
                                    @foreach($contact->contact_fields as $contact_field)
                                    <span class="badge badge-light"><strong>{{ $contact_field->field->name }}</strong>: {{ $contact_field->value }}</span>
                                    @endforeach
                                    </h5>
                                </td>
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
