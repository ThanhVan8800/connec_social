<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        "uuid",
        "user_id",
        "icon",
        "thumbnail",
        "description",
        "name",
        "location",
        "type",
        "members",
        "is_private",
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
}
