<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    use HasFactory;
    protected $table = 'nguoidung';
    protected $fillable = ['username', 'password','fullname','address', 'phone','email', 'created_by' , 'updated_by', 'status'];
    public $timestamps = true;
}
