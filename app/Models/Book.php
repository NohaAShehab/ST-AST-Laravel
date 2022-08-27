<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ["title","description", "no_of_pages", "summary", "image", "author_id"];

    function author(){
        return $this->belongsTo(Author::class);
    }
}
