<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        "title","auther","content","img"
        
    ];
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}