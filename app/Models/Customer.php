<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function rating(){
        return $this->hasMany(Rating::class);
        
        }public function booking(){
            return $this->hasMany(Booking::class);
            
            }
            public function customer_hotel(){
                return $this->hasMany(Customer_Hotel::class);
                
                }
    protected $fillable = [
        'name',
        'mobile',
        'gender',
        'email',
    ];
    protected $casts = [
    ];

}
