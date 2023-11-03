<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLinks extends Model
{
    use HasFactory;
    protected $fillable=['project_id','link'];

    public function projet(){
        return $this->belongsTo('App\Models\Project','project_id','id');
    }

}
