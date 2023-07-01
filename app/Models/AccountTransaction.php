<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    protected $table = 'acc_transaction';

    use HasFactory;
    public $timestamps = false;
}
