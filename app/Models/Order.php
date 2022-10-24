<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
 
    // relation one to many from user table
    public function user() {

        return $this->belongsTo(User::class);
    }
}
