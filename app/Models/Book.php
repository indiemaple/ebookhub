<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'body',
        'body_original',
        'deleted_at',
        'created_at',
        'updated_at',
        'cover',
        'baidu_source',
        'baidu_source_key',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function link($params = [])
    {
        $params = array_merge([$this->id], $params);
        $name = 'books.show';
        return str_replace(env('API_DOMAIN'), env('APP_DOMAIN'), route($name, $params));
    }

}
