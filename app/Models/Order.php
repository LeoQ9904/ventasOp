<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'invoice_id',
        'cnt',
        'total',
        'descu',
        'total_descu'
    ]; 
    public function producto(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }   
}
