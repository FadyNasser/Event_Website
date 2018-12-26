<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    // Table Name
    protected $table = 'applicants';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
