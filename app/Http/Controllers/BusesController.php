<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\code;
use Illuminate\Support\Str;
class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes=code::orderBy('id', 'DESC')->get();
        return View('code.index',[
            'codes'=>$codes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
        return view('code.create'); 
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
            'busNum'=>'required',
            'busAlph'=>'required'
            ]);

        $customer = code::where('busNum', $request->busNum)->where('busAlph', $request->busAlph)->first();
            if ($customer){
                return redirect()->back()->with('Exist', 'Bus Already Exists!');
            }
    //    array_push($data, 'barCodeImg'=> 'Google.com');
        $randomString = Str::random(30);
       $data['barCodeUrl'] = $randomString;
       
        code::create($data);

        return redirect('code')->with('success', 'Bus Add successfully!'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codes=code::where('barCodeUrl',$id)->get();
        return View('code.show',[
            'qrcode'=>$id,
            'codes'=>$codes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return View('code.edit',[
            'id'=>$id
        ]);
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
            'busNum'=>'required',
            'busAlph'=>'required'
        ]);
        $customer = code::where('busNum', $request->busNum)->where('busAlph', $request->busAlph)->first();
        if ($customer){
            return redirect()->back()->with('Exist', 'Bus Already Exist!');
        }
    //    array_push($data, 'barCodeImg'=> 'Google.com');
        $randomString = Str::random(30);
       $data['barCodeUrl'] = $randomString;

       
       $code = code::find($id);
       $code->busNum = $request->input('busNum');
       $code->busAlph = $request->input('busAlph');
       $code->barCodeUrl = $data['barCodeUrl'];
       $code->save();

        return redirect('code');
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
