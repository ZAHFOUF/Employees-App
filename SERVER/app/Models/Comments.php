<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public function post () : BelongsTo
    {

       return  $this->belongsTo(Post::class,'post');

    }

    public function user () : BelongsTo
    {

       return  $this->belongsTo(User::class)->withDefault();

    }
}
