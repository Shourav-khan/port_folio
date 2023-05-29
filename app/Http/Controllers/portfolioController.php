<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class portfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $portfolios = Portfolio::all();
        return view('pages.portfolio.list' , compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolio.create');
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

            'title'=>'required|string',
            'description'=>'required|string',
            'big_img'=>'required|image',
            'small_img'=>'required|image',
            'category'=>'required|string'
        ]);

        $portfolio = new Portfolio;
        $portfolio->title = $request->title;
        $portfolio->description = $request->description ;
        $portfolio->category = $request->category ;

        $port1 = $request->file('big_img');
        Storage::putFile('public/img/', $port1);
        $portfolio->big_img = "storage/img/".$port1->hashName();

        $port2 = $request->file('small_img');
        Storage::putFile('public/img/', $port2);
        $portfolio->small_img = "storage/img/".$port2->hashName();

        $portfolio->save();

    return redirect()->route('admin.portfolio.create')->with('success','Save SUCCCESSFULLY');


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ports = Portfolio::find($id);
        return view('pages.portfolio.edit',compact('ports'));
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
        $this->validate($request, [

            'title'=>'required|string',
            'description'=>'required|string',
            'category'=>'required|string'
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->description = $request->description ;
        $portfolio->category = $request->category ;

        if($request->file('big_img')){
        $port1 = $request->file('big_img');
        Storage::putFile('public/img/', $port1);
        $portfolio->big_img = "storage/img/".$port1->hashName();
        }

        if($request->file('small_img')){

            $port2 = $request->file('small_img');
            Storage::putFile('public/img/', $port2);
            $portfolio->small_img = "storage/img/".$port2->hashName();
        }

       

        $portfolio->save();

    return redirect()->route('admin.portfolio.list')->with('success','Edit SUCCCESSFULLY');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolios = Portfolio::find($id);
        @unlink(public_path($portfolios->big_img));
        @unlink(public_path($portfolios->small_img));
        $portfolios->delete();

         return redirect()->route('admin.portfolio.list')->with('success','Portfolio Delete Successfull');
    }
}
