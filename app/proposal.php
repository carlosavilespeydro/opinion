<?php

namespace opinion;

use Illuminate\Database\Eloquent\Model;

class proposal extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
