<?php

namespace App\Http\Controllers;

use App\Models\Products;

class TestController extends Controller
{
    public function index()
    {
        return Products::all();
    }
}
