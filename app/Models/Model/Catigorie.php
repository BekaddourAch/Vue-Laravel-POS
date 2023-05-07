<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catigorie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}