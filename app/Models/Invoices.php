<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
       
        if ($filters['search'] ?? false) {
            $query->where('invoice_item','like','%' . request('search'). '%')
            ->orWhere('invoice_number', 'like','%'.request('search').'%')
            ->orWhere('customer', 'like','%'.request('search').'%')
            ->orWhere('invoice_note', 'like','%'.request('search').'%');
        }
    }

    protected $fillable = [
        'invoice_item', 
        'invoice_quantity', 
        'invoice_unit_cost', 
        'invoice_number', 
        'customer', 
        'invoice_due_date', 
        'invoice_note'
    ];

}
