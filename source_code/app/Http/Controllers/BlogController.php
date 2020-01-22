<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class BlogController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index()

     {
        $countries = DB::table('countries')->select('name')->get();

         $blogs = Blog::latest()->paginate(5);



         return view('blogs.index',compact('blogs'))
             ->with('countries', $countries)
             ->with('i', (request()->input('page', 1) - 1) * 5);

     }



     /**

      * Show the form for creating a new resource.

      *

      * @return \Illuminate\Http\Response

      */

     public function create()

     {

         return view('blogs.create');

     }



     /**

      * Store a newly created resource in storage.

      *

      * @param  \Illuminate\Http\Request  $request

      * @return \Illuminate\Http\Response

      */

     public function store(Request $request)
     {

        $this->validate($request, [

             'title' => 'required',

             'body' => 'required',

             'country' => 'required',

             'image' => 'required|mimes:jpeg,png,jpg,gif,svg',

         ]);

         $blog = new Blog;

         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/uploads/blogs');
             $imagePath = $destinationPath . "/" . $name;
             $image->move($destinationPath, $name);
             $blog->image = $name;
         }

        //  $blog->user_id = $request->user_id;
         $blog->title = $request->title;
         $blog->body = $request->body;
         $blog->country_id = $request->country;
         $blog->gps = $request->gps;
         $blog->save();


        //  Blog::create($request->all());



         return redirect()->route('blogs.index')

                         ->with('success','Blog created successfully.');

     }



     /**

      * Display the specified resource.

      *

      * @param  \App\Blog  $blog

      * @return \Illuminate\Http\Response

      */

     public function show(Blog $blog)

     {

         return view('blogs.show',compact('blog'));

     }



     /**

      * Show the form for editing the specified resource.

      *

      * @param  \App\Blog  $blog

      * @return \Illuminate\Http\Response

      */

     public function edit(Blog $blog)

     {
        $countries = Country::all();

         return view('blogs.edit')
         ->with('countries', $countries)
         ->with('blog', $blog);

     }



     /**

      * Update the specified resource in storage.

      *

      * @param  \Illuminate\Http\Request  $request

      * @param  \App\Blog  $blog

      * @return \Illuminate\Http\Response

      */

     public function update(Request $request, $id)

     {

        $this->validate($request, [

             'title' => 'required',

             'body' => 'required',

             'country' => 'required',

             'image' => 'required|mimes:jpeg,png,jpg,gif,svg',

         ]);

         $blog = new Blog;
         $countries = new Country;

         $countries = Country::findOrFail($id);
         $countries->update($request->all());

         $blog = Blog::findOrFail($id);
         $blog->update($request->all());

         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/uploads/blogs');
             $imagePath = $destinationPath . "/" . $name;
             $image->move($destinationPath, $name);
             $blog->image = $name;
         }

         $blog->save();
         $countries->save();


         return redirect()->route('blogs.index')

                         ->with('success','Blog updated successfully');

     }



     /**

      * Remove the specified resource from storage.

      *

      * @param  \App\Blog  $blog

      * @return \Illuminate\Http\Response

      */

     public function destroy(Blog $blog)

     {

         $blog->delete();



         return redirect()->route('blogs.index')

                         ->with('success','Blog deleted successfully');
     }

}
