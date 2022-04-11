<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Admin';
        $products = Product::paginate(5);

        return view('admin.index')
            ->with('title', $title)
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'image' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:5000',
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = str_replace(' ', '', $request->input('name'));
        $imageName = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/p-img', $imageName);

        $created = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $imageName,

        ]);

        if ($created) {
            # code...
            return redirect()->route('admin.create')->with('success', 'Created Successfully');
        } else {
            # code...
            return redirect()->back()->with('error', 'Creation Unsuccessful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('admin.editImage', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('admin.editProduct', ['product' => $product]);
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
        //
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required',
        ]);

        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $type = $request->input('type');

        $update = array('name' => $name, 'description' => $description, 'price' => $price, 'type' => $type);

        DB::table('products')->where('id', $id)->update($update);

        return redirect()->route('admin.index');
    }

    public function editImage(Request $request, $id)
    {

        $this->validate($request, [
            'image' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:5000',

        ]);
        //handle file upload
        if ($request->hasFile('image')) {
            # code...
            $product = Product::find($id);
            $exists = Storage::disk('local')->exists('public/p-img/' . $product->image);
            if ($exists) {

                Storage::delete('public/p-img' . $product->image);
                # code...
            }
            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //filename with timestamp to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/p-img', $product->image);
        }

        //
        // $image = Product::find($id);
        // if ($request->hasFile('image')) {
        //     $image->image = $filenameToStore;
        // }
        // $image->save();

        return redirect()->route('admin.index')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $product = Product::find($id);
        $exists = Storage::disk('local')->exists('/public/p-img/' . $product->image);

        if ($exists == true) {
            # code...
            Storage::delete('/public/p-img/' . $product->image);
        }
        Product::destroy($id);
        return redirect()->route('admin.index')->with('delete', 'Product Deleted');
    }
}
