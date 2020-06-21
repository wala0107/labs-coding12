<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public function article() {
        return $this->belongsTo('App\Article', 'article_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
