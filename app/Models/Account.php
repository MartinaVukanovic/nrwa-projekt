<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'account_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['account_id', 'avail_balance', 'close_date', 'last_activity_date', 'open_date', 'pending_balance', 'status', 'cust_id', 'open_branch_id', 'open_emp_id', 'product_cd'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'cust_id', 'cust_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_cd', 'product_cd');
    }

    public function branch()
    {
        return $this->hasOne(Branch::class, 'open_branch_id', 'branch_id');
    }
}
