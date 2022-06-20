<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $moduleName = ['moduleName'=>'services'];
        return view('services', $moduleName);
    }
}
