<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'total',
        'customer_id'
    ];
    public function invoices(){        
        return $this->hasMany('App\Models\Invoice');
    }
}
