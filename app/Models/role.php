<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\team_member;

class role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name'
    ];

    public function team_member()
    {
        return $this->haveMany(team_member::class);
    }
}
