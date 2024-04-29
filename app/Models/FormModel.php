<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    use HasFactory;
    public $fillable = ['name','gender','address','phone','email','nationality','date_of_birth','education_background','contact_mode'];
}
