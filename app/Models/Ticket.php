<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function city(){
        return $this->BelongsTo(City::class);
    }
    public function company(){
        return $this->BelongsTo(Company ::class);
    }
    public function booking(){
        return $this->hasMany(Booking::class);
        
        }
    protected $fillable = [
        'city_id',
        'company_id',
    ];
    protected $casts = [
    ];

}
