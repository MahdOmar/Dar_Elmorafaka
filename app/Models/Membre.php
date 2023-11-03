<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','date_naissance','lieu_naissance','niveau_etude','residance','phone','email'];

    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_owners');
    }
}
