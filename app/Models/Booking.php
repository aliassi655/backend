<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function customer(){
        return $this->BelongsTo(Customer::class);
        
        }public function hotel(){
            return $this->BelongsTo(Hotel::class);
            
            }public function ticket(){
                return $this->BelongsTo(Ticket::class);
                
                }
    protected $fillable = [
        'ticket_id',
        'customer_id',
        'hotel_id',

    ];
    protected $casts = [


    ];
}
