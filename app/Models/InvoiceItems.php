<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoices;

class InvoiceItems extends Model
{
    use HasFactory;

    public function invoice()
    {
        return $this->belongsTo(Invoices::class);
    }

    protected $fillable = [
        'description', 
        'quantity',
        'unit_cost'
    ];
}
