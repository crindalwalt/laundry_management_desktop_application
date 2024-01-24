<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    public  function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function account()
    {
        return $this->hasOne(Account::class);
    }
    public function transections()
    {
        return $this->hasMany(Transection::class);
    }
}
