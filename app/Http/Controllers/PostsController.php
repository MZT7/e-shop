<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Rules\Captcha;
// use App\Http\Controllers\PagesController;

class PostsController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Contact Us';
        return view('posts.contact')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'message' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'g-recaptcha-response'=> new Captcha(),

        ]);

       //dd($data);

        //create post
        $post = new post; 
        $post->message = $request->input('message');
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->subject = $request->input('subject');
        $post->phone = $request->input('phone');
        $post->save();

        Mail::to('oristouniversal@yahoo.com')->send(new ContactFormMail($data));
       //$jav =  "<script>alert('Your account has been created')</script>";
        //return "<script>alert('Your account has been created')</script>" ;
        return redirect()->back()->with('alert','c');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
