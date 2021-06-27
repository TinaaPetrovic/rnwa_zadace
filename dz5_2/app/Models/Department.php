<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $primaryKey = 'DepartamentId';

    public $timestamps = false;

    protected $fillable = [
      'Name'
    ];

    public function professor()
    {
        return $this->hasMany(Professor::class, 'Departaments_DepartamentId', 'DepartamentId');
    }

}
