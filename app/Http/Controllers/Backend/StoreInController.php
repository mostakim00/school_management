<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreInController extends Controller
{
    public function index(){
        return view('backend.pages.store_in.index');
    }

    public function create(){
        return view('backend.pages.store_in.create');
    }
}
