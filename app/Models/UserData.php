<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $table = 'user_datas';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'username', 'full_name', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
