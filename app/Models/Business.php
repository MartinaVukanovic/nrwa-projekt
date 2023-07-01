<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';

    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'cust_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['cust_id', 'name', 'state_id', 'incorp_date'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'cust_id', 'cust_id');
    }
}
