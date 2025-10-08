<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;
class Country extends Model
{
       protected $fillable=['country_name'];

       public function State(){
        return $this->hasMany(State::class);
       }
}
