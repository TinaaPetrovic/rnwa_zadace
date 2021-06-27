<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $table = 'titles';

    public $timestamps = false;

    protected $primaryKey = 'TitleId';

    protected $fillable = [
        'Name'
    ];

    public function professors()
    {
        return $this->belongsToMany(Professor::class, 'professors_titles', 'Titles_TitleId');
    }

}
