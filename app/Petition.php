<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    //

    protected $table = 'petitions';
    protected $fillable = ['title','body'];
    public function user(){
       return $this->belongsTo(User::class);
    }

}
