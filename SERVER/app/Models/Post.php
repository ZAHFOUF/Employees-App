<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'content',
        'user',
        'edited'

    ];

    public $timestamps = true;

    public function comments () : HasMany
    {
      return   $this->hasMany(Comments::class,'post');
    }

    public function user () : BelongsTo
    {

        return  $this->belongsTo(User::class,'user');

    }

    public function categorie () : BelongsTo
    {

        return $this->belongsTo(Categorie::class,'categorie') ;

    }
}
