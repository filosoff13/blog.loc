<?php

namespace App;

use function App\Helpers\customFormatDate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    /**
     * Return DATE in format "1 Серпня 2019, 10:10"
     * @return string
     */
    public function getCreatedAtPostAttribute()
    {
        return customFormatDate($this->created_at);
    }
}
