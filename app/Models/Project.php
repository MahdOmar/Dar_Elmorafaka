<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
   protected $fillable=['stucture_id','user_id','projet','lieu_projet','type_projet','nombre_participants','but_projet','domaine','',
'categorie','concurrence','conditions','benifices'];


public function orientation()
{
    return $this->hasOne(Orientation::class);
}
public function membres()
{
    return $this->belongsToMany(Membre::class,'project_owners');
}
public function links(){
    return $this->hasMany('App\Models\ProjectLinks','project_id','id');
}
public function structure(){
    return $this->belongsTo(Structure::class,'stucture_id','id');
}


}
