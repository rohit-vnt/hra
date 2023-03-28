<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Slip</title>
   <style>
   *{
       margin:0;
       padding:0;
       box-sizing:border-box;
   }
   html{
    font-size:62.333%;
    
   }
   body{
    font-family: monospace;
    font-size:1.1rem;
   }

   .salarySlipWrap{
    padding:1.5rem;
    margin:2rem;
    border:.1rem solid #111111;
   }
   
   .salarySlipWrap table{
    width:100%;
   }
   .salarySlipWrap table tr{
    line-height:1.5;
   }
   .logoWrap .logo{
    text-align: center;
    padding-bottom:1rem;
   }
   .logoWrap .logo img{
    width: 200px;
   }
  .tableWrap{
    border-bottom:.1rem solid #ebebeb;
    padding:1rem 0;
  }
  .tableWrap.noBorder{
    border-bottom:0;
  }
 
  .salaryTotalBox2{
    border-top:.1rem solid #ebebeb;
    
  }
  .salaryTotalBox2 td{
    padding:1rem 0;
  }
  .salaryTotalBox2.pb0{
    padding-bottom:0 !important;
  }
.td5,.tdp{
    padding-left:1rem !important;
}

   </style>
</head>
<body>
    <div class="salarySlipWrap">
                <div class="tableWrap">
                        <table border="0" cellspacing="0" cellpadding="0" class="box1">
                        <tbody>
                        <tr class="logoWrap">
                        <td colspan="8">
                                <div class="logo">
                                    <img src="{{asset('assets/logo.png')}}" alt="">
                                </div>
                        </td>
                        </tr>
                
                        <tr class="salarypara">
                            <td colspan="8">
                                <p>PAYSLIP FOR THE MONTH OF {{strtoupper(date('M Y',strtotime($row[15])))}}</p>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="tableWrap">
                <table border="0" cellspacing="0" cellpadding="0" class="box2">
                    <tbody>
                        <tr class="salaryStructureBox">
                            <td width="60">EMP NO</td>
                            <td>:</td>
                            <td colspan="2">{{$row[0]}}</td>
                            
                            <td width="60">DAYS WORKED</td>
                            <td>:</td>
                            <td colspan="2">{{$row[1]}}</td>
                            
                        </tr>
                        <tr class="salaryStructureBox">
                            <td width="60">NAME</td>
                            <td>:</td>
                            <td colspan="2">{{ucfirst($emp['firstName']).' '.ucfirst($emp['middleName']).' '.ucfirst($emp['lastName'])}}</td>
                            
                            <td width="60">EMP DOJ</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['dob']}}</td>
                            
                        </tr>
                        <tr class="salaryStructureBox">
                            <td width="60">GENDER</td>
                            <td>:</td>
                            <td colspan="6">{{$emp['gender']==1?'Female':'Male'}}</td>
                        </tr>
                        <tr class="salaryStructureBox">
                            <td width="60">GRADE</td>
                            <td>:</td>
                            <td colspan="6">Pranav Zende Mumbai</td>
                        </tr>
                        <tr class="salaryStructureBox">
                            <td width="60">DESG CD</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['designation']}}</td>
                            <td width="60">EMP PAN</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['pancard']}}</td>
                        </tr>
                        <tr class="salaryStructureBox">
                            <td width="60">DEPARTMENT</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['department']}}</td>
                            <td width="60">ESIC NO</td>
                            <td>:</td>
                            <td colspan="2">Pranav Zende Mumbai</td>
                        </tr>
                        <tr class="salaryStructureBox">
                            <td width="60">LOCATION</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['address']}}</td>
                            <td width="60">UAN</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['aadhar']}}</td>
                        </tr>
                        <tr class="salaryStructureBox">
                            <td width="60">BANK NAME</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['bank']}}</td>
                            <td width="60">BANK A/C NO.</td>
                            <td>:</td>
                            <td colspan="2">{{$emp['account_no']}}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="tableWrap noBorder">
                <table border="0" cellspacing="0" cellpadding="0" class="box3">
                   <tbody>
                    <tr class="salaryTotalBox">
                        <td>EARNINGS</td>
                        <td align="center">RATE</td>
                        <td>CURRENT MONTH</td>
                        <td>ARREAR(+/—)</td>
                        <td align="center">GROSS</td>
                        <td>|</td>
                        <td class="td5">DEDUCTIONS</td>
                        <td>CURRENT MONTH</td>
                    </tr>
                    <br>
                    <tr>
                        <td>BASIC</td>
                        <td align="center">{{$row[2]}}</td>
                        <td align="center">{{$row[2]}}</td>
                        <td align="center">{{$row[2]}}</td>
                        <td align="center">{{$row[2]}}</td>
                        <td>|</td>
                        <td class="td5">PROVIDENT FUND DEDUCTION</td>
                        <td align="center">{{$row[3]}}</td>
                    </tr>
                    <tr>
                        <td>HRA</td>
                        <td align="center">{{$row[4]}}</td>
                        <td align="center">{{$row[4]}}</td>
                        <td align="center">{{$row[4]}}</td>
                        <td align="center">{{$row[4]}}</td>
                        <td>|</td>
                        <td class="td5">PROFESSION TAX</td>
                        <td align="center">{{$row[5]}}</td>
                    </tr>
                    <tr>
                        <td>CITY COMPENSATORY ALLOWAN</td>
                        <td align="center">{{$row[6]}}</td>
                        <td align="center">{{$row[6]}}</td>
                        <td align="center">{{$row[6]}}</td>
                        <td align="center">{{$row[6]}}</td>
                        <td>|</td>
                        <td class="td5">ESIC</td>
                        <td align="center">{{$row[7]}}</td>
                    </tr>
                    <tr>
                        <td>SHIFT ALLOWANCE</td>
                        <td align="center">{{$row[8]}}</td>
                        <td align="center">{{$row[8]}}</td>
                        <td align="center">{{$row[8]}}</td>
                        <td align="center">{{$row[8]}}</td>
                        <td>|</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>ADV. AGAINST STAT BONUS</td>
                        <td align="center">{{$row[9]}}</td>
                        <td align="center">{{$row[9]}}</td>
                        <td align="center">{{$row[9]}}</td>
                        <td align="center">{{$row[9]}}</td>
                        <td>|</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>SKILL ALLOWANCE</td>
                        <td align="center">{{$row[10]}}</td>
                        <td align="center">{{$row[10]}}</td>
                        <td align="center">{{$row[10]}}</td>
                        <td align="center">{{$row[10]}}</td>
                        <td>|</td>
                        <td colspan="2"></td>
                    </tr>
                    <br>
                    <tr >
                        <td>LEAVE ENCASHMENT</td>
                        <td align="center">{{$row[11]}}</td>
                        <td align="center">{{$row[11]}}</td>
                        <td align="center">{{$row[11]}}</td>
                        <td align="center">{{$row[11]}}</td>
                        <td>|</td>
                        <td colspan="2"></td>
                    </tr>
                    <br>
                    <tr class="salaryTotalBox2">
                        <td colspan="2" class="td1">GROSS EARNINGS</td>
                        <td align="center" class="td2" >{{$row[12]}}</td>
                        <td align="center"  class="td3">{{$row[12]}}</td>
                        <td align="center"   class="td4">{{$row[12]}}</td>
                        <td>|</td>
                        <td class="tdp">TOTAL DEDUCTIONS</td>
                        <td align="center" class="td6">{{$row[13]}}</td>
                    </tr>
                    <tr class="salaryTotalBox2">
                            <td colspan="8">
                                <p>NET PAY : {{$row[14]}}</p>
                            </td>
                        </tr>
                        <tr class="salaryTotalBox2 pb0">
                            <td colspan="8">
                                <p>( NET PAY IN WORDS ) {{convert_number($row[14])}}</p>
                            </td>
                        </tr>
                        <tr class="salaryTotalBox2 pb0">
                            <td colspan="8">
                                <p>* This is a computer generated pay slip and does not require signature.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
</body>
</html>