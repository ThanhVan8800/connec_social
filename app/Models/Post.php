<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
            "uuid",
            "user_id",
            'content',
            "status",
            "likes",
            "comments",
            "is_page_post",
            "page_id",
            "is_group_post",
            "group_id"
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'group_id');
    }
    public function commentss()
    {
        return $this->hasMany(Comment::class);
    }
}
