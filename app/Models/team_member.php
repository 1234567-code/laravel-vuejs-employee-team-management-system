<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\team;
use app\Models\role;
use app\Models\employee;

class team_member extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'member_name',
        'member_email',
        'teams_id',
        'employees_id',
        'roles_id'
    ];

    public function team()
    {
        return $this->belongsTo(team::class, 'foreign_key', 'owner_key');
    }
    public function role()
    {
        return $this->belongsTo(role::class, 'foreign_key', 'owner_key');
    }
    public function employee()
    {
        return $this->belongsTo(employee::class, 'foreign_key', 'owner_key');
    }
}

