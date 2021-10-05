<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
            'order_id',            
            'product_id',
            'cnt',
            'total'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class,'invoices');
    }
    public function order(){
        return $this->belongsTo(Order::class,'invoices');
    }
    public function product(){
        return $this->belongsTo(Product::class,'invoices');
    }
}
