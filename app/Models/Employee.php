<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'firstName',
        'middleName',
        'lastName',
        'email',
        'mobile',
        'mobile2',
        'department',
        'designation',
        'address',
        'city',
        'grade',
        'esic_no',
        'p_address',
        'joiningDate',
        'dob',
        'marital_status',
        'gender',
        'ctc',
        // 'aadhar',
        // 'pancard',
        // 'passport',
        // 'photo',
        // 'bank',
        // 'account_no',
        // 'name_bank',
        // 'branch_name',
        // 'ifsc',
        'is_senior',
    ];
}
