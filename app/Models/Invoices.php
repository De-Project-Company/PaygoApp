<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(InvoiceItems::class);
    }

    public function scopeFilter($query, array $filters){
       
        if ($filters['search'] ?? false) {
            $query->where('invoice_item','like','%' . request('search'). '%')
            ->orWhere('invoice_number', 'like','%'.request('search').'%')
            ->orWhere('customer', 'like','%'.request('search').'%')
            ->orWhere('invoice_note', 'like','%'.request('search').'%');
        }
    }

    protected $fillable = [
        'customer', 
        'invoice_due_date', 
        'invoice_note',
        'invoice_vat',
        'invoice_discount',
        'payment_method',
        'invoice_number',
        'invoice_total'
    ];

}
