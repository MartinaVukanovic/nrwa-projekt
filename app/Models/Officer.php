<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'officer_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['officer_id', 'cust_id','first_name', 'last_name', 'end_date', 'start_date',
    'title'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'cust_id', 'cust_id');
    }
}
