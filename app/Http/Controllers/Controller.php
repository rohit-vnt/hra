<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Imports\ImportUser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|',
            'c_password'=>'required|same:password',
            'mobile' => 'required|string',
          ]);
      
          $user = new User([
            'name' => $request->name,
            'password' =>  bcrypt($request->password),
            'email' => $request->email,
            'mobile' => $request->mobile,
            'username' => $request->username,
            'register_ip' => '168.192.1.92', // need to make it dynamic
            'status' => 1,
          ]);
          if($user->save()){
            return redirect('/dev');
          }else{
            return response()->json(['error'=>'Provide proper details']);
          }
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
          ]);
          $credentials = request(['email', 'password']);
          if(!Auth::attempt($credentials))
            return response()->json([
              'message' => 'Unauthorized',
              'type'=>'failed'
            ], 401);
          // return redirect('/dev/home');
          return response()->json([
            'message'=>'welcome',
            'type'=>'success'
          ]);
    }
    public function logout()
    {
      Auth::logout();
      return redirect()->route('login');
    }
    public function addEmployee(Request $request){
      $emp=$request->validate([
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'email' => 'required|string|email|unique:employees',
        'mobile' => 'required|string|unique:employees',
        'empCode' => 'required|string|unique:employees',
        'department' => 'required|string',
        'address' => 'required|string',
        'joiningDate' => 'required|string',
        'ctc' => 'required|string',
      ]);
      $emp['user_id']=Auth::user()->id;
      $user = new Employee($emp);
      if($user->save()){
        return response()->json([
          'message'=>'Employee Added',
          'type'=>'success'
        ]);
      }else{
        return response()->json([
          'message' => 'Opps! operation failed',
          'type'=>'failed'
        ], 401);
      }
    }

    // excel

    public function importView(Request $request){
      return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportUser,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
  }
