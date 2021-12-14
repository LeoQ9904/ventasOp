<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Invoice;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descript',
        'price',
        'reference',
        'category',
        'iva',
    ];
    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
