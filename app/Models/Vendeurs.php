<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendeurs extends Model
{
    use HasFactory;

    protected $table2 = "Vendeurs";

    protected $fillable2 = ["nom", "email", "password"];
}
