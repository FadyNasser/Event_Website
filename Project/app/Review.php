<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
        // Table Name
        protected $table = 'reviews';
        // Primary Key
        public $primarykey = 'id';
        // Timestamps
        public $timestamps = true;
}
