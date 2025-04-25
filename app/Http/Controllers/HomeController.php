<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Category;

class HomeController extends Controller
{
    public function HomePage()
    {
        return view ('home');
    }

    public function AboutPage()
    {
        return view('about');
    }

    public function ShopPage()
    {
        $Items = Shop::with('category')
                    ->where('featured', 1)
                    ->where('visibility', 1)
                    ->get();
        
        $categories = Category::orderBy('category', 'asc')->get();

        return view('shop', compact('Items', 'categories'));
    }

    public function ContactPage()
    {
        return view('contact');
    }

    public function Dashboard()
    {
        return view('dashboard');
    }
     
}
