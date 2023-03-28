<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\salary;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use PDF;
class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        [$emp]=Employee::where('user_id',$row[0])->get();
        $renderedData=PDF::loadView('slip',compact('row','emp'));
        $file=public_path('pdf/').$row[0].time().'.'.'pdf';
        if($renderedData->save($file)){
        return new salary([
           'company_id' => Auth::user()->id,  
           'empCode' => $row[0],  
           'days_worked' => $row[1],
           'basic' => $row[2],
           'pf' => $row[3],
           'hra' => $row[4],
           'pt' => $row[5],
           'cca' => $row[6],
           'esic' => $row[7],
           'shift_allowance' => $row[8],
           'advance' => $row[9],
           'skill_allowance' => $row[10],
           'leave_encashment' => $row[11],
           'gross_earning' => $row[12],
           'total_deduction' => $row[13],
           'net_pay' => $row[14],
           'salary_date' => date('Y-m-d',strtotime($row[15])),
           'slip_url' => $file,
        ]);
    }
    }
}
