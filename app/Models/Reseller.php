<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role',
        'name',
        'instagram',
        'gender',
        'email',
        'birthday',
        'address',
        'phone',
        'image',
    ];
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
