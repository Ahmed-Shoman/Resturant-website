<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   protected $fillable = [
        'first_name', 'last_name', 'email', 'tel_number', 'res_date', 'status', 'table_id'
    ];


    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}