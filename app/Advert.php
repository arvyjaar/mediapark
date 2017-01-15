<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'user_id'];

    /**
     * Date mutator
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return substr($value, 0, 10);
    }

    /**
     * Relationship to User model.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
