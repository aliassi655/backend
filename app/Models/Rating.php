<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
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
        'rate',
        'comment',
    ];
    protected $casts = [
    ];
}
