<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LonerInformation extends Model
{
    use HasFactory;

    protected $table = 'loner_information';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
