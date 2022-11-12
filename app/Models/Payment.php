<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='payments';
    protected $fillable = [
        'transaction_id',
        'transaction_code',
        'user_id' ,
        'money' ,
        'note',
        'vnpay_response_code',
        'code_vnpay',
        'code_bank',
        'time'
    ];
}
