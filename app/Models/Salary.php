<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',  
        'empCode',  
        'days_worked',
        'basic',
        'pf',
        'hra',
        'pt',
        'cca',
        'esic',
        'shift_allowance',
        'advance',
        'skill_allowance',
        'leave_encashment',
        'gross_earning',
        'total_deduction',
        'net_pay',
        'slip_url',
        'salary_date',
    ];
}

