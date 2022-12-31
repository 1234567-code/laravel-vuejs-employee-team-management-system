<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\employee;

class user_account extends Model
{
    use HasFactory;


    protected $fillable = [
        'username',
        'password',
        'email',
        'first_name',
        'last_name',
        'is_project_manager',
    ];

    public function employee()
    {
        return $this->hasOne(user_account::class);

    }
    
}
