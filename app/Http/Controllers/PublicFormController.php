<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Field;
use App\Models\Contact;
use App\Models\ContactField;
use Illuminate\Http\Request;

class PublicFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = Form::where('slug', $request->slug)->first();

        if(!$form) {
            abort(404);
        }
        
        $contact = new Contact();
        $contact->form_id = $form->id;
        $contact->save();

        $form_data = $request->except(['_token', 'slug']);

        foreach($form_data as $key => $value)
        {
            $field = Field::where('form_id', $form->id)->where('tag', $key)->first();
            if($field) {
                $contact_fields[] = ['field_id' => $field->id, 'value' => $value];
            }
        }
        
        $contact->contact_fields()->createMany($contact_fields);

        return redirect()->back()->with('message', 'The form has been successfully submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::with(['fields' => function($query) {
                    $query->orderBy('sequence');
                }])->where('slug', $id)->first();

        if(!$form) {
            abort(404);
        }
        
        return view('forms/public/index', ['form' => $form]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
