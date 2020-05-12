<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'link';
    protected $fillable = ['url','title', 'description', 'image', 'opengraph_url', 'session_id'];
    // protected $fillable = ['id', 'url', 'title', 'description', 'image', 'opengraph_url'];
}
