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
}
