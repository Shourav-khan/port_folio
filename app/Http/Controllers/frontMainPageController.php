<?php

namespace App\Http\Controllers;

use App\Models\Frontmain;
use Illuminate\Http\Request;

class frontMainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Frontmain::first();
        return view('pages.main',compact('data'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            
            'title'=>'required|string',
            'sub_title'=>'required|string'

        ]);

        $main = Frontmain::first();

        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if($request->file('bc_img')){

            $var1 = $request->file('bc_img');
            $var1->storeAs('public/img/','bc_img'.$var1->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.'. $var1->getClientOriginalExtension();
        }

        if($request->file('resume')){

            $var2 = $request->file('resume');
            $var2->storeAs('public/pdf/','resume'.$var2->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.'. $var2->getClientOriginalExtension();
        }

        $main->save();

        return redirect()->route('main.page')->with('success','Added Successfully');
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
    }
}
