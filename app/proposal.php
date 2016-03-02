<?php

namespace opinion;

use Illuminate\Database\Eloquent\Model;

class proposal extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'Proposal_id');
    }
}
