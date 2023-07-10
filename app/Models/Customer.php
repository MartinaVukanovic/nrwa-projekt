<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    use HasFactory;
    protected $primaryKey = 'cust_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = ['cust_id', 'address', 'city', 'cust_type_cd', 'fed_id', 'postal_code', 'state'];

    public function account()
    {
        return $this->hasMany(Account::class, 'cust_id');
    }

    public function individual()
    {
        return $this->hasOne(Individual::class, 'cust_id', 'cust_id');
    }
}
