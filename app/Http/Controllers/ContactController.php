<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::latest()->get();
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

//        $imageName = time() . '-' . preg_match_all('/data\:image\/([a-zA-Z]+)\;base64/',$request->photo,$matched).'.jpg';
        $imageName = time() . '.' . explode('/',explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
         \Image::make($request->photo)->save(public_path('/assets/uploaded_images/'). $imageName);
//       dd($imageName);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->position = $request->position;
        $contact->company = $request->company;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->photo = $imageName;
        $contact->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact = Contact::findorFail($contact->id);
        if ($request->photo != $contact->photo){
            $image_path = "assets/uploaded_images/".$contact->photo;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time() . '.' . explode('/',explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('/assets/uploaded_images/'). $imageName);
        }
        else {
            $imageName = $request->photo;
        }
//        dd($imageName);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->position = $request->position;
        $contact->company = $request->company;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->photo = $imageName;
        $contact->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact = Contact::findorFail($contact->id);
        $image_path = "assets/uploaded_images/".$contact->photo;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $contact->delete();
    }
}
