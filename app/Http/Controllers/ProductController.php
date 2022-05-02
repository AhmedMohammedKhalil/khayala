<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::where('trainer_id',auth('trainer')->user()->id)->get();
        $page_name = 'المنتجات';
        return view('trainers.products.index',compact('products','page_name'));
    }


    public function create()
    {
        $page_name = 'إضافة منتج';
        return view('trainers.products.create',compact('page_name'));
    }




    public function show(Request $r)
    {
        $product = product::whereId($r->id)->first();
        $page_name = 'عرض المنتج';
        return view('trainers.products.show',compact('product','page_name'));
    }


    public function edit(Request $r)
    {
        $product = product::whereId($r->id)->first();
        $page_name = 'تعديل المنتج';
        return view('trainers.products.edit',compact('product','page_name'));
    }



    public function delete(Request $r)
    {
        product::destroy($r->id);
        return redirect()->route('trainer.products');
    }
}
