<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\Trailer;  
use App\Models\TrailerTimming;  
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
       
        try {
            $user_id = Auth::id();
            $trailer= new Trailer;

            $trailer->trailer_name = $request->trailer_name;
            $trailer->per_hour_price=$request->per_hour_price;
            $trailer->user_id = $user_id;
            $trailer->pass_key=$request->pass_key;
            $trailer->save();

            foreach($request->addmore as $address)
            {
                //  dd($address);
                $trailer_timming= new TrailerTimming;
                $trailer_timming->trailer_id = $trailer->id;
                $trailer_timming->time = $address['time'];
                $trailer_timming->price = $address['price'];
                $trailer_timming->save();
            }

       
            toastr()->success('Trailer successfully added!');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function edit($id)
    {
        $trailer = Trailer::with('user','trailer_timming')->where('id',$id)->first();

        return view('admin.trailer.edit', compact('trailer'));
    }

    public function update(Request $request,$trailer)
    {
        
        try {
            $user_id = Auth::id();
            $trailer= Trailer::find($trailer);

            $trailer->trailer_name = $request->trailer_name;
            $trailer->per_hour_price=$request->per_hour_price;
            $trailer->user_id = $user_id;
            $trailer->pass_key=$request->pass_key;
            $trailer->save();

            TrailerTimming::where('trailer_id',$trailer->id)->delete();

            foreach($request->addmore as $address)
            {
                //  dd($address);
                $trailer_timming= new TrailerTimming;
                $trailer_timming->trailer_id = $trailer->id;
                $trailer_timming->time = $address['time'];
                $trailer_timming->price = $address['price'];
                $trailer_timming->save();
            }
       
            toastr()->success('Trailer successfully updated!');
            return redirect('admin/trailers');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function destroy(Request $request , $id)
    {
        try {
            Trailer::FindorFail($id)->delete();
            TrailerTimming::where('trailer_id',$id)->delete();
            toastr()->error('Trailer successfully deleted!');
            return Redirect::back();        
        } catch (\Exception $exception) {
            return Redirect::back();
        }
        
    }
}
