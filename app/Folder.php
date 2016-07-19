<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Folder
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $title
 * @property integer $weight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bookmarks[] $bookmarks
 * @method static \Illuminate\Database\Query\Builder|\App\Folder whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Folder whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Folder whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Folder whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Folder whereUpdatedAt($value)
 */
class Folder extends Model
{
    protected $table = 'folder';

    protected $guarded = [];

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmarks', 'folder_id', 'id');
    }
}
