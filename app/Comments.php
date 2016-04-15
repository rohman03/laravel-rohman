<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  protected $fillable = ['title', 'content'];

  public static function valid($id = "") {
    return array(
      'title' => 'required|min:10|unique:articles,title'.($id ? ",$id" : ''),
      'content' => 'required|min:100|unique:articles,content'.($id ? ",$id" : '')
    );
  }
}
