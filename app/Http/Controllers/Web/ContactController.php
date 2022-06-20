<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $moduleName = ['moduleName'=>'contact'];
        return view('contact', $moduleName);
    }

    public function store()
    {
        redirect('success');
    }
}
