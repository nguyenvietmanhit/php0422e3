<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // Ghi đè thuộc tính guarded của Model để bỏ qua các input
    //có name ko phải là trường trong bảng
    protected $guarded = ['_token'];
}
