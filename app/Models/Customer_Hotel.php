<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\Customer;
class Customer_Hotel extends Model
{
    use HasFactory;
    public function customer():object
        {
        return $this->BelongsTo(Customer::class);
        
        }
        public function hotel():object
        {
            return $this->BelongsTo(Hotel::class);
            
            }
    protected $fillable = [
        'customer_id',
        'hotel_id',
    ];
    protected $casts = [
    ];
}
