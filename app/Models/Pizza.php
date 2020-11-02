<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    // prevent someone to change his/her role by
    // $fillable = ['column_name'] -> column_name are columns that u allow to be changed.
    // if a column is not part of the variable $fillable, then u should explicitly assign
    // the value to it. i.e,
    // $food->user_type = 'admin';
    // $food->save();
    protected $fillable = ['name', 'type', 'base', 'toppings'];
    protected $casts = [
        'toppings' => 'array'
    ];
}