<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid','user_id','icon','thumbnail','description','name','location','type'
    ];
    public function page()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get all of the comments for the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    
}
