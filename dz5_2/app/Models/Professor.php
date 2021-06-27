<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professors';

    public $timestamps = false;

    protected $primaryKey = 'ProfessorId';

    protected $fillable = [
        'Name', 'Departaments_DepartamentId'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'Departaments_DepartamentId', 'DepartamentId');
    }

    public function titles()
    {
        return $this->belongsToMany(Title::class, 'professors_titles', 'Professors_ProfessorId');
    }

}
