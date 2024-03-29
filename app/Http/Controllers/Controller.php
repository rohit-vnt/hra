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
use App\Mail\Slip;
use App\Models\Salary;
use PDF;
use Illuminate\Support\Facades\DB;
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
    public function dashboard(){
      $empCount=Employee::where('status',1)->count();
      $inActive=Employee::where('status',0)->count();
      $notice=Employee::where('on_notice',1)->count();
      $salary_date=Salary::orderBy('id','desc')->limit(1)->get();
      $date=!empty($salary_date[0]['salary_date'])?$salary_date[0]['salary_date']:'';
      return view('index',['count'=>$empCount,'inactive'=>$inActive,'salary_date'=>$date,'notice'=>$notice]);
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
    public function salarySlip(){
      return view('salarySlip');
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
          'middleName' => 'required|string',
          'lastName' => 'required|string',
          'email' => 'required|string|email',
          'mobile' => 'required|string',
          'mobile2' => 'required|string',
          'department' => 'required|string',
          'designation' => 'required|string',
          'address' => 'required|string',
          'city' => 'required|string',
          'grade' => 'required|string',
          'esic_no' => 'required|string',
          'p_address' => 'required|string',
          'joiningDate' => 'required|string',
          'ctc' => 'required|string',
          'dob' => 'required|string',
          'marital_status' => 'required',
          'gender' => 'required',
          // 'aadhar' => 'required',
          // 'pancard' => 'required',
          // 'passport' => 'required',
          // 'bank' => 'required',
          // 'account_no' => 'required',
          // 'name_bank' => 'required',
          // 'branch_name' => 'required',
          // 'ifsc' => 'required',
          'is_senior' => 'required',
        ]);
        if(!empty($request->file('photo'))){
          $path = $request->file('photo')->store('photo');
          $emp['photo']=$path;
        }
        
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
          'middleName' => 'required|string',
          'lastName' => 'required|string',
          'email' => 'required|string|email|unique:employees',
          'mobile' => 'required|string|unique:employees',
          'mobile2' => 'required|string',
          'department' => 'required|string',
          'designation' => 'required|string',
          'address' => 'required|string',
          'city' => 'required|string',
          'grade' => 'required|string',
          'esic_no' => 'required|string',
          'p_address' => 'required|string',
          'joiningDate' => 'required|string',
          'ctc' => 'required|string',
          'dob' => 'required|string',
          'marital_status' => 'required',
          'gender' => 'required',
          // 'aadhar' => 'required',
          // 'pancard' => 'required',
          // 'passport' => 'required',
          // 'bank' => 'required',
          // 'account_no' => 'required',
          // 'name_bank' => 'required',
          // 'branch_name' => 'required',
          // 'ifsc' => 'required',
          'is_senior' => 'required',
        ]);
        if($request->reporting)
        $emp['reporting']=$request->reporting;
        if(!empty($request->file('photo'))){
          $path = $request->file('photo')->store('photo');
          $emp['photo']=$path;
        }
        $emp['company_id']=Auth::user()->id;
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
        $import=Excel::import(new ImportUser,
                      $request->file('file')->store('files'));
        if($import)
        return response()->json([
          'message'=>'Excel uploaded',
          'type'=>'success'
        ]);
        else
        return response()->json([
          'message'=>'operation failed',
          'type'=>'failed'
        ]);
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
    public function addEmp(){
      $senior=Employee::where('is_senior',1)->get();
      return view('add-employee',['seniors'=>$senior]);
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
                  'api_key'    => env('CLOUD_KEY'),
                  'api_secret' => env('CLOUD_SECRET'),
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
    public function salaryMail(Request $request){
      $data=$request->validate([
        'date' => 'required|string'
      ]);
      $emp=DB::table('salaries')->join('employees','salaries.empCode','=','employees.user_id')->select('salaries.slip_url','employees.email','employees.firstName')->whereDate('salaries.salary_date',$data['date'])->get();
      $count=0;
      foreach($emp as $em){
        Mail::to($em->email)->send(new Slip(array('name'=>$em->firstName,'attach'=>$em->slip_url)));
        $count++;
      }
      if($count>0){
        return response()->json([
          'message'=>$count.' Mail Sent',
          'type'=>'success'
        ]);  
      }else{
        return response()->json([
          'message' => 'No data found for this date',
          'type'=>'failed'
        ], 401);
      }

    }
  }
