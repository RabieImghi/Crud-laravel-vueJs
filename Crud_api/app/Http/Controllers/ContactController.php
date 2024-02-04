<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contacts(){
        $contacts = Contact::all();
        return response()->json(
            [
                'Contacts'=>$contacts,
                'message'=>"Contacts",
                'code'=> 200
            ]
        );
    }
    public function SaveConstact(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_no = $request->contact_no;
        $contact->save();
        return response()->json([
            'message'=>'Contact Created',
            'code'=>200,
        ]);
    }
    public function DeleteContact($id){
          $contact = Contact::find($id);
          $contact->delete();
          return response()->json(['message' => 'Contact deleted successfully', 'code'=>200]);
    }
    public function updateContact(Request $request,$id){
        Contact::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'designation'=>$request->designation,
            'contact_no'=>$request->contact_no,
        ],);
        return response()->json([
            'message'=>'Contact Created',
            'code'=>200,
        ]);
    }
}
