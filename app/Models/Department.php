<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    use HasFactory;
    protected $primaryKey = 'dept_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = ['dept_id', 'name'];
}
