<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';

    use HasFactory;
    protected $primaryKey = 'product_type_cd';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['product_type_cd', 'name'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'product_type_cd', 'product_type_cd');
    }
}
