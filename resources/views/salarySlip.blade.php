<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
                font-size: 10px;
                font-family: sans-serif;          
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="14" style="text-align: center;">PAYSLIP FOR THE MONTH OF {{date('M Y',strtotime($row[15]))}}</td>
            </tr>
            <tr>
                <td colspan="8">EMP NO : EMP-{{$row[0]}}</td>
                <td colspan="6">DAYS WORKED : {{$row[1]}}</td>
            </tr>
            <tr>
                <td colspan="8">NAME : {{ucfirst($emp['firstName']).' '.ucfirst($emp['middleName']).' '.ucfirst($emp['lastName'])}}</td>
                <td colspan="6">EMP DOJ : {{$emp['dob']}}</td>
            </tr>
            <tr>
                <td colspan="8">GENDER : {{$emp['gender']==1?'Female':'Male'}}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="8">GRADE : </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="8">DESG CD: {{$emp['designation']}}</td>
                <td colspan="6">EMP PAN : {{$emp['pancard']}}</td>
            </tr>
            <tr>
                <td colspan="8">DEPARTMENT:  {{$emp['department']}}</td>
                <td colspan="6">ESIC NO:  </td>
            </tr>
            <tr>
                <td colspan="8">LOCATION:  {{$emp['address']}}</td>
                <td colspan="6">UAN:  {{$emp['aadhar']}}</td>
            </tr>
            <tr>
                <td colspan="8">BANK NAME:  {{$emp['bank']}}</td>
                <td colspan="6">BANK A/C :  {{$emp['account_no']}}</td>
            </tr>   
            <tr>
                <td colspan="2">EARNING</td>
                <td colspan="2">RATE</td>
                <td colspan="2">CURRENT MONTH</td>
                <td colspan="2">ARREAR (+/-)</td>
                <td colspan="2">GROSS</td>
                <td colspan="2">DEDUCTIONS</td>
                <td colspan="2">CURRENT MONTH</td>
            </tr>
            <tr>
                <td colspan="2">BASIC</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">PROVIDENT FUND DEDUCTOIN</td>
                <td colspan="2">XXX.00</td>
            </tr>
            <tr>
                <td colspan="2">HRA</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">PROFESSION TAX</td>
                <td colspan="2">XXX.00</td>
            </tr>
            <tr>
                <td colspan="2">CITY COMPENSATORY ALLOWAN</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">ESIC</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">SHIFT ALLOWANCE</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">ADV. AGAINST STAT BONUS</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">SKILL ALLOWANCE</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">LEAVE ENCASHMENT</td>
                <td colspan="2"></td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2">GROSS ENCASHMENT</td>
                <td colspan="2"></td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">0.00</td>
                <td colspan="2">XXXX.00</td>
                <td colspan="2">TOTAL DEDUCTION</td>
                <td colspan="2">XXXX.00</td>
            </tr>
            <tr>
                <td colspan="14">NET PAY : 50000</td>
            </tr>
            <tr>
                <td colspan="14">NET PAY IN WORDS : FIFTY THOUSAND ONLY</td>
            </tr>
            <tr>
                <td colspan="14" style="text-align: center;">*This is a computer generated pay slip and does not require signature.</td>
            </tr>
        </table>
    </body>
</html>