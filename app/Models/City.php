<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
    public function hotel(){
        return $this->hasMany(Hotel::class);

        }
    protected $fillable = [
        'name',
        'country',
    ];
    protected $casts = [

    ];

}
"esam";
