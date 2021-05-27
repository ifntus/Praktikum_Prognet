<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Courier::all();
        return view ('courier.courier',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cr = new Courier;
        $cr->courier = $request->courier;
        $cr->save();
        return redirect('/courier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        $courier = Courier::find($courier)->first();
        return view('courier.editcourier',compact('courier')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        $courier->courier = $request->courier;
        $courier->save();
        return redirect('/courier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        $courier->delete($courier);
        return redirect('/courier');
    }
    public function trash()
    {
            // mengambil data yang sudah dihapus
            $data = Courier::onlyTrashed()->get();
            return view('courier_trash',compact('data'));
            // dd($cat);
    }
    
        public function restore($id)
    {
            $data = Courier::onlyTrashed()->where('id',$id);
            $data->restore();
            return redirect('/courier/bin/trash');
    }   
    public function delete_permanen($id)
    {
            $data = Courier::onlyTrashed()->where('id',$id);
            $data->forceDelete();
     
            return redirect('/courier/bin/trash');
    }
}
