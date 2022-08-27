<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ["title","description", "no_of_pages", "summary", "image", "author_id"];

    # this function represent the relation ----> ability
    function author(){
        return $this->belongsTo(Author::class);  # this relation will return with object
    }

    function authors(){
        return $this->belongsTo(Author::class);
    }

    function get_show_url(){
        return route("books.show", $this->id);
    }
    function get_edit_url(){
        return route("books.edit", $this->id);
    }
    function get_update_url(){
        return route("books.update", $this->id);
    }
    function get_delete_url(){
        return route("books.delete", $this->id);
    }
}
