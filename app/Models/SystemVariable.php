<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemVariable extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'field_key', 'values', 'detail' ];
}
