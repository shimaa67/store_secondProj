<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
   public function index()
   {
    $products = Products::all();
        return view('home.index', compact('products'));
   }
}
