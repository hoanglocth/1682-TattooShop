<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactUsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(ContactUsDataTable $dataTable)
    {
        return $dataTable->render('admin.contactus.index');
    }

    public function remove($id){
        if($contact = Contact::find($id)){
            if($contact->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Remove success']);
            }
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error can not be delete']);
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Not found']);
    }

}
