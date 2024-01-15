<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    private function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoices::class);
    }


    public function scopeFilter($query, array $filters){
       
        if ($filters['search'] ?? false) {
            $query->where('invoice_number','like','%' . request('search'). '%')
            ->orWhere('payment_status', 'like','%'.request('search').'%')
            ->orWhere('customer', 'like','%'.request('search').'%')
            ->orWhere('amount', 'like','%'.request('search').'%');
        }
    }

    protected $fillable = [
        'user_id', 
        'invoice_id', 
        'payment_id', 
        'invoice_number',
        'amount',
        'payment_status',
        'channel',
    ];
}
