<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\User;
use App\Models\Hospital;
use Auth;
class CeoController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medics = User::where('permission_lvl', '>=' , '10')
        ->where('permission_lvl', '<' , '100')->get();
        return view("ceo.index", ['medics' => $medics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!(Auth::user()->permission_lvl>=100)){return redirect()->route('home');}
        return view('ceo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'surname' => $request['surname'],
            'address' => $request['address'],
            'ak' => $request['ak'],
            'phone' => $request['phone'],
            'status' => 1,
            'permission_lvl' => 100,
            'password' => Hash::make($request['password']),
        ]);
        Hospital::create([
            'name' => $request['hospital'],
            'user_id' => $user->id
        ]);
        return redirect()->route('patient.index');
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
    public function update(Request $request, $id)
    {
        //
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
    public function inactivedoctors(){
        if(!(Auth::user()->permission_lvl>=100)){return redirect()->route('home');}
        $unverifiedDoctors = User::where('status','=','0')
        ->where('permission_lvl','>=','10')
        ->where('permission_lvl','<','100')->get();
        return view('ceo.verifydoctor',['unverifiedDoctors'=>$unverifiedDoctors]);
    }
}
