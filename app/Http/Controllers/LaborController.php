<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Labor;
use App\Models\code;
class LaborController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labors = Labor::all();
        return View('labor.index',compact('labors'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $buses=code::all();
        return View("labor.create",compact('buses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'phone'=>'required',
            'name'=>'required',
            'Bus_id'=>'required'
            ]);

        $customer = Labor::where('phone', $request->phone)->where('name', $request->name)->first();
            if ($customer){
                return redirect()->back()->with('Exist', 'Bus Already Exists!');
            }
            Labor::create($data);

            return redirect('labor')->with('success','Labor data Created Successfully');
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
        $data=Labor::all();
        // dd($data);
        $_here=Labor::find($id);
        return View('labor.edit',compact('data','_here'));
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
        $data=request()->validate([
            'phone'=>'required',
            'name'=>'required',
            'Bus_id'=>'required'
            ]);
            
            //Update Incomplete
            
        // $customer = Labor::where('phone', $request->phone)->where('name', $request->name)->first();
        //     if ($customer ){
        //         return redirect()->back()->with('Exist', 'Labor Already Exists!');
        //     }
            $labor = Labor::find($id);
            $labor->phone =$request->input('phone');
            $labor->name =$request->input('name');
            $labor->Bus_id =$data['Bus_id'];
            $labor->save();

            return redirect('labor')->with('success','Labor data Updated Successfully');
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
