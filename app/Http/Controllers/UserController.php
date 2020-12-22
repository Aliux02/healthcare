<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\User;
use App\Models\Hospital;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ceos = User::where('permission_lvl', '>=' , '100')
        ->where('permission_lvl', '<' , '1000')
        ->where('status', '!=' , '0')->get();
        return view("admin.index", ['ceos' => $ceos]);
        //return view('home');
    }

    public function hospitals()
    {
        $hospitals = Hospital::select('name')
        ->groupBy('name')
        ->get();
        return view("hospitals",['hospitals'=>$hospitals]);
    }

    // public function doctorIndex()
    // {   
    //     $patients = User::where('permission_lvl', '>=' , '1')
    //     ->where('permission_lvl', '<' , '10')->get();
    //     return view("doctor.index", ['patients' => $patients]);
    // }

    // public function inactivedoctors(){
    //     if(!(Auth::user()->permission_lvl>=100)){return redirect()->route('home');}
    //     $unverifiedDoctors = User::where('status','=','0')
    //     ->where('permission_lvl','>=','10')
    //     ->where('permission_lvl','<','100')->get();
    //     return view('ceo.verifydoctor',['unverifiedDoctors'=>$unverifiedDoctors]);
    // }

    // public function verifydoctor(Request $request){
    //     $user = User::find($request->id);
    //     $user->status=1;
    //     $user->update();
    //     return back();
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     if(!Auth::user()->status){return redirect()->route('home');}
    //     return view('patient.create');
    // }
    // public function createCEO()
    // {
        
    //     return view('ceo.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function storePatient(Request $request)
    // {
    //     User::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'surname' => $request['surname'],
    //         'address' => $request['address'],
    //         'ak' => $request['ak'],
    //         'phone' => $request['phone'],
    //         'status' => 1,
    //         'permission_lvl' => 1,
    //         'password' => Hash::make(UserController::generateRandomString()),
    //     ]);



    //     return redirect()->route('doctor.index');
    // }
    // public function storeCEO(Request $request)
    // {
    //     $user = User::create([
    //         'name' => $request['name'],
    //         'email' => $request['email'],
    //         'surname' => $request['surname'],
    //         'address' => $request['address'],
    //         'ak' => $request['ak'],
    //         'phone' => $request['phone'],
    //         'status' => 1,
    //         'permission_lvl' => 100,
    //         'password' => Hash::make($request['password']),
    //     ]);
    //     Hospital::create([
    //         'name' => $request['hospital'],
    //         'user_id' => $user->id
    //     ]);
    //     return redirect()->route('patient.index');
    // }

        public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
