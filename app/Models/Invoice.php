<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
            'n_invoice',                        
            'customer_id',
            'seller_id',
            'company_id',
            'status',
            'total_iva',
            'total_dec',            
            'total'
    ];    
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    
}
