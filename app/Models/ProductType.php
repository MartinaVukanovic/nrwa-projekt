<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_type_cd';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['product_type_cd', 'name'];
}
