<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'branch_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['branch_id', 'address', 'city', 'name', 'state', 'zip_code'];

}
