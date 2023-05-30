<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactFormController extends Controller
{
    public function store(){
        
        $contact_form_data =  request()->all();
    }
}
