<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Index extends Controller
{
  public function index()
  {
   $user= Auth::user();
   
    return view('content.dashboard.dashboard');
  }
}
