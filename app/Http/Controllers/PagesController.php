<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function index()
    {
        $title = 'Home';
        //return view('pages.index');
        return view('pages.index')->with('title', $title);
    }

    public function about()
    {
        $title = 'About us';
        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        //$data = array('title' => 'Our Services', 'services' => ['Web Design', 'Programming', 'SEO']);
        $title = 'Services';
        return view('pages.services')->with('title', $title);
    }
    public function gallery()
    {
        //$data = array('title' => 'Our Services', 'services' => ['Web Design', 'Programming', 'SEO']);
        $title = 'Gallery';
        return view('pages.gallery')->with('title', $title);
    }
    public function gallery2()
    {
        //$data = array('title' => 'Our Services', 'services' => ['Web Design', 'Programming', 'SEO']);
        $title = 'Gallery';
        return view('pages.gallery2')->with('title', $title);
    }

    // public function products()
    // {
    //     $title = 'Product';
    //     return view('pages.product')->with('title', $title);
    // }
    public function products2()
    {
        $title = 'Product';
        return view('pages.products2')->with('title', $title);
    }


    //PAGES FOR ITEMS IN PRODUCTS
    public function product1()
    {
        $title = 'Product';
        return view('products.product1')->with('title', $title);
    }
    public function product2()
    {
        $title = 'Product';
        return view('products.product2')->with('title', $title);
    }
    public function product3()
    {
        $title = 'Product';
        return view('products.product3')->with('title', $title);
    }
    public function product4()
    {
        $title = 'Product';
        return view('products.product4')->with('title', $title);
    }
    public function product5()
    {
        $title = 'Product';
        return view('products.product5')->with('title', $title);
    }
    public function product6()
    {
        $title = 'Product';
        return view('products.product6')->with('title', $title);
    }
    public function product7()
    {
        $title = 'Product';
        return view('products.product7')->with('title', $title);
    }
    public function product8()
    {
        $title = 'Product';
        return view('products.product8')->with('title', $title);
    }
    public function product9()
    {
        $title = 'Product';
        return view('products.product9')->with('title', $title);
    }
    public function product10()
    {
        $title = 'Product';
        return view('products.product10')->with('title', $title);
    }
    public function product11()
    {
        $title = 'Product';
        return view('products.product11')->with('title', $title);
    }
    public function product12()
    {
        $title = 'Product';
        return view('products.product12')->with('title', $title);
    }
    public function product13()
    {
        $title = 'Product';
        return view('products.product13')->with('title', $title);
    }
    public function product14()
    {
        $title = 'Product';
        return view('products.product14')->with('title', $title);
    }
    public function product15()
    {
        $title = 'Product';
        return view('products.product15')->with('title', $title);
    }
    public function product16()
    {
        $title = 'Product';
        return view('products.product16')->with('title', $title);
    }
    public function product17()
    {
        $title = 'Product';
        return view('products.product17')->with('title', $title);
    }
    public function product18()
    {
        $title = 'Product';
        return view('products.product18')->with('title', $title);
    }
    public function product19()
    {
        $title = 'Product';
        return view('products.product19')->with('title', $title);
    }
    public function product20()
    {
        $title = 'Product';
        return view('products.product20')->with('title', $title);
    }
    public function product21()
    {
        $title = 'Product';
        return view('products.product21')->with('title', $title);
    }




    //PAGES FOR SERVICES

    public function service1()
    {
        $title = 'Services';
        return view('services.service1')->with('title', $title);
    }

    public function service2()
    {
        $title = 'Services';
        return view('services.service2')->with('title', $title);
    }

    public function service3()
    {
        $title = 'Services';
        return view('services.service3')->with('title', $title);
    }
}
