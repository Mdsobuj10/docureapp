<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientRegisterController extends Controller
{
    /**
     * patient registar 
     * @return Post 
     **/
    public function Register(Request $request)
    {
        $this -> validate($request, [
           'name'            => 'required',
           'email'           => 'required|email',
           'cell'            => 'required|',
           'password'        => 'required|confirmed',
        ]); 
        /**
         * patient data store 
        */

        Patient::create([
          'name'     => $request -> name,
          'cell'     => $request -> cell,
          'email'     => $request -> email,
          'password'     => Hash::make($request -> password),
        ]);

        return redirect() -> route('patient.register.page') -> with('success', 'data success fuly store');
    }
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function PatientLogin(Request $request)
    {
        $this -> validate($request,[
            'email'    => 'required',
            'password'    => 'required'
        ]);


       if (Auth::guard('patient') -> attempt([ 'email' => $request -> email, 'password' => $request -> password  ]) || Auth::guard('patient') -> attempt([ 'cell' => $request -> email, 'password' => $request -> password  ]) ) {
            return redirect() -> route('patient.deshboard.page');
       }else{
        return redirect() -> route('login.page');
       }
    }

    /**
    *log out patient 
     **/
    public function PatientLogout()
    {
         Auth::guard('patient') -> logout();
         return redirect() -> route('login.page');
    }
}
