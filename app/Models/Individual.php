<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'cust_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['cust_id', 'first_name', 'last_name', 'birth_date'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'cust_id', 'cust_id');
    }
}
