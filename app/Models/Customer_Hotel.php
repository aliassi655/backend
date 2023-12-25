<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Hotel extends Model
{
    use HasFactory;
    public function customer(){
        return $this->BelongsTo(Customer::class);
        
        }
        public function hotel(){
            return $this->BelongsTo(Hotel::class);
            
            }
    protected $fillable = [
        'customer_id',
        'hotel_id',
    ];
    protected $casts = [
    ];
}
