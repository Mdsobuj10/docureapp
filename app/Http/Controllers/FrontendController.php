<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
   /* 
   show home page */
    public function index()
    {
        return view('frontend.home');
    }
/* 
login page show */
    public function login()
    {
        return view('frontend.login');
    }
 //patient riugister page show
 public function PatientRegister()
{
    return view('frontend.patient.register');
}

// patien deshboard 

public function PatientDeshboard() 
{
    return view('frontend.patient.deshboard');
}

/**
 * doctor registertion page
 **/
public function DoctorRegister()
{
     return view('frontend.doctor.register');
}
/**
 * doctor DoctorDeshboard page
 **/
public function DoctorDeshboard()
{
     return view('frontend.doctor.deshboard');
}


}
