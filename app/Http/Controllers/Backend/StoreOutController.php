<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreOutController extends Controller
{
    public function index(){
        return view('backend.pages.store_out.index');
    }

    public function create(){
        return view('backend.pages.store_out.create');
    }
}
