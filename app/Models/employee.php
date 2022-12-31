<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_account;
use App\Models\team_member;

class employee extends Model
{
    use HasFactory;


    protected $fillable = [
        'employee_code',
        'employee_name',
        'user_accounts_id'
    ];
    
    public function user_account()
    {
        return $this->belongsTo(user_account::class);
    }

    public function team_member()
    {
        return $this->haveMany(team_member::class);
    }
}
