<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bookmarks
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $folder_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Bookmarks whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bookmarks whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bookmarks whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bookmarks whereFolderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bookmarks whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bookmarks whereUpdatedAt($value)
 */
class Bookmarks extends Model
{
    protected $table = 'bookmarks';

    protected $guarded = [];
}
