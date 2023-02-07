<?php

namespace App\Http\Controllers;
use Cloudinary\Cloudinary as Cloudinary;
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
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\forgetPwd;
use Illuminate\Support\Facades\Mail as FacadesMail;

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
      
      if(!empty($request->input('emp_id'))){
        // update
        $emp=$request->validate([
          'firstName' => 'required|string',
          'lastName' => 'required|string',
          'email' => 'required|string|email',
          'mobile' => 'required|string',
          'empCode' => 'required|string',
          'department' => 'required|string',
          'designation' => 'required|string',
          'address' => 'required|string',
          'joiningDate' => 'required|string',
          'ctc' => 'required|string',
        ]);
        $user = Employee::where('id',$request->input('emp_id'))->update($emp);
        if($user){
          return response()->json([
            'message'=>'Employee Updated',
            'type'=>'success'
          ]);
        }else{
          return response()->json([
            'message' => 'Opps! operation failed',
            'type'=>'failed'
          ], 401);
        }
      }else{
        // add
        $emp=$request->validate([
          'firstName' => 'required|string',
          'lastName' => 'required|string',
          'email' => 'required|string|email|unique:employees',
          'mobile' => 'required|string|unique:employees',
          'empCode' => 'required|string|unique:employees',
          'department' => 'required|string',
          'designation' => 'required|string',
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
      
    }

    // import excel
    public function importView(Request $request){
      return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportUser,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
    // excel end
    public function forgetPwdMail(Request $request)
    {
      $email=$request->validate([
        'email' => 'required|string'
      ]);
      $isExist=User::where('email',$email)->count();
      if($isExist>0){
        $pwd=rand(11111,99999);
        User::where('email',$email)->update(['password'=>hash::make($pwd)]);
        Mail::to($email)->send(new forgetPwd($pwd));
        return response()->json([
          'message'=>'New password sent on your mail',
          'type'=>'success'
        ]);
      }else{
        return response()->json([
          'message' => 'Opps! no user found with this Email Id',
          'type'=>'failed'
        ], 401);
      }
    }
    public function changePwd(Request $request){
      $params=$request->validate([
        'new_pwd' => 'required|string',
        'confirm_pwd' => 'required|string|same:new_pwd'
      ]);
      $update=User::where('id',Auth::user()->id)->update(['password'=>hash::make($params['new_pwd'])]);
      if($update){
        return response()->json([
          'message'=>'Password Updated',
          'type'=>'success'
        ]);  
      }else{
        return response()->json([
          'message' => 'Opps! Operation failed',
          'type'=>'failed'
        ], 401);
      }
    }
    public function manageEmp(){
      $emp=Employee::orderBy('id','desc')->get();
      return view('manage-emp',['employees'=>$emp]);
    }
    public function deleteEmployee(Request $request){
      $id=$request->validate([
        'id' => 'required',
      ]);
      $delete=Employee::where('id',$id)->delete();
      if($delete){
        return response()->json([
          'message'=>'Employee Deleted',
          'type'=>'success'
        ]);  
      }else{
        return response()->json([
          'message' => 'Opps! Operation failed',
          'type'=>'failed'
        ], 401);
      }
    }

    public function updateProfile(Request $request){
      $user=$request->validate([
        'name' => 'required|string',
        'email' => 'required|string|email',
        'mobile' => 'required|string',
        'logo' => 'required',
      ]);
      $cloudinary = new Cloudinary(
          [
              'cloud' => [
                  'cloud_name' => 'dp7qjwrsu',
                  'api_key'    => '192242161812764',
                  'api_secret' => '64puGHSNMlrT-fTVh3vCFkj1qGI',
                  'url' => [
    'secure' => true]
              ],
          ]
      );
      $data=$cloudinary->uploadApi()->upload($request->file('logo')->getRealPath());
      $user['logo']=$data['secure_url'];
      $update=User::where('id',Auth::user()->id)->update($user);
      if($update){
        return response()->json([
          'message'=>'Profile Updated',
          'type'=>'success'
        ]);  
      }else{
        return response()->json([
          'message' => 'Opps! Operation failed',
          'type'=>'failed'
        ], 401);
      }
    }

    public function account(){
      $data=User::where('id',Auth::user()->id)->get();
      return view('account',['data'=>$data[0]]);
    }
  }
