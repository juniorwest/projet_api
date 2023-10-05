<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendeurs extends Model
{
    use HasFactory, SoftDeletes;

    //protected $table2 = "Vendeurs";

    protected $fillable = ['nom', 'email', 'password'];

    public function latestComment()
    {
        return $this->hasOne(Commment::class)->latestOfMany();
    }
}
