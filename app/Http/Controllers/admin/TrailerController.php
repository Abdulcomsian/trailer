<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\Trailer;
use Illuminate\Support\Facades\Redirect;

class TrailerController extends Controller
{
    public function index()
    {
        $trailers = Trailer::with('user')->get();
        // dd($trailers);
        return view('admin.trailer.index', compact('trailers'));
    }      

    public function create(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        // try {
            $user_id = Auth::id();
            $trailer= new Trailer;

            $trailer->trailer_name = $request->trailer_name;
            $trailer->user_id = $user_id;
            $trailer->save();

            if($request->blog_id)
        {
            foreach($request->blog_id as $blog_id)
            {
                $recomended_blogs = new RecomendedBlog;
                $recomended_blogs->blog_id = $blog->id;
                $recomended_blogs->recomended_blog_id = $blog_id;
                $recomended_blogs->brand_profile_id = $request->profile_id;
                $recomended_blogs->type = 'blog';
                $recomended_blogs->save();
            }
        }
            toastSuccess('Trailer successfully added!');
            return Redirect::back();
        // } catch (\Exception $exception) {
        //     toastError('Something went wrong, try again!');
        //     return Redirect::back();
        // }
    }

    public function edit($id)
    {
        // try {
            $blog = Blog::where('id',$id)->first();
            $brand_profile = BrandProfile::with('category')->where('user_id',Auth::id())->first();
            $blogs = Blog::where('brand_profile_id',$brand_profile->id)->get()->except($blog->id);
            $products = Product::where('brand_profile_id',$brand_profile->id)->get();
            $recomended_blogs = RecomendedBlog::where([['blog_id',$id],['brand_profile_id',$brand_profile->id],['type','blog']])->get();
            $recomended_products = RecomendedBlog::where([['blog_id',$id],['brand_profile_id',$brand_profile->id],['type','product']])->get();
            $sub_categories = BrandsHasSubCategory::with('subcategory')->where('brand_profile_id',$brand_profile->id)->get();
            $addresses = BrandsHasAddress::with('brandprofile')->with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $brand_cities = BrandsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->get();
            $blog_cities = BlogsHasCity::with('city')->where('brand_profile_id',$brand_profile->id)->where('blog_id',$id)->get();

            // dd($blog_cities , $brand_cities);
            if(count($brand_cities) <= 0)
            {
                $brand_cities = User::where('id',Auth::id())->get();
            }
            return view('brand.blog.edit', compact('blog','brand_profile','sub_categories','addresses','brand_cities','blog_cities','blogs','products','recomended_blogs','recomended_products'));
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
    }

    public function update(Request $request,$blog)
    {
        // dd($request->all());
        $user_id = Auth::id();
        $brand_profile = BrandProfile::where('user_id',$user_id)->first();
        $this->validate($request,[ 
            'title'=>'required|min:3|max:180', 
            'sub_title'=>'required|min:3|max:180', 
            'category_id'=>'required', 
            'description'=>'required', 
            'profile_id'=>'required', 
            'sub_category_id'=>'required', 
            'city_id'=>'required', 
            'tags' => 'required',

        ]);
        $blog= Blog::find($blog);
        $blog->tags = $request->tags;
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->brand_profile_id = $request->profile_id;
        $blog->sub_category_id = $request->sub_category_id;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $extensions =$image->extension();

            $image_name =time().'.'. $extensions;
            $image->move('blog/',$image_name);
            $blog->image=$image_name;
        }

        $images = [];
        if($request->hasfile('images'))
        {
            // dd($request->file('images'));
            foreach(($request->file('images')) as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move('blog/', $name);  
                $files[] = $name; 
            }
            $blog->images = json_encode($files);;
            
        }
        
        $blog->save();

        RecomendedBlog::where('blog_id',$blog->id)->delete();

        if($request->blog_id){
            foreach($request->blog_id as $blog_id)
            {
                $recomended_blogs = new RecomendedBlog;
                $recomended_blogs->blog_id = $blog->id;
                $recomended_blogs->recomended_blog_id = $blog_id;
                $recomended_blogs->brand_profile_id = $request->profile_id;
                $recomended_blogs->type = 'blog';
                $recomended_blogs->save();
            }
        }

        if($request->product_id)
        {
            foreach($request->product_id as $product_id)
            {
                $recomended_products = new RecomendedBlog;
                $recomended_products->blog_id = $blog->id;
                $recomended_products->recomended_product_id = $product_id;
                $recomended_products->brand_profile_id = $request->profile_id;
                $recomended_products->type = 'product';
                $recomended_products->save();
            }
        }

        BlogsHasCity::where('blog_id',$blog->id)->delete();

        foreach($request->city_id as $city_id)
        {
            // dd($address);
            $blog_city= new BlogsHasCity;
            $blog_city->brand_profile_id=$request->profile_id;
            $blog_city->blog_id = $blog->id;
            $blog_city->city_id = $city_id;
            $blog_city->save();
        }
        return redirect('brand/blog');
    }

    public function destroy(Request $request , $id)
    {
        // try {
                $filePath = Blog::FindorFail($id);
                BlogsHasCity::where('blog_id',$id)->delete();
                RecomendedBlog::where('blog_id',$id)->delete();
                Blog::FindorFail($id)->delete();
                
                @unlink(public_path()."/blog/".$filePath->image );
               
                return Redirect::back();        
        // } catch (\Exception $exception) {
        //     return Redirect::back();
        // }
        
    }
}
