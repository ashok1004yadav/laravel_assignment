<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
	protected $table = 'orders';

    protected $fillable = [ 'order', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'option_f', 'option_id', 'course_id', 'status_id' ];
            
}
