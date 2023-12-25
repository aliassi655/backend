<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
    protected $fillable = [
        'title',
        'address',
        'phone',
    ];
    protected $casts = [
    ];

}
