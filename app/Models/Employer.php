<?php

namespace App\Models;

use App\Models\Job;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    Protected $fillable = ['company_name'];


     public function jobs(){

        return $this->hasMany(Job::class,'employer_id');
    }

     public function user(){

        return $this->belongsTo(User::class,'user_id');
    }
}
