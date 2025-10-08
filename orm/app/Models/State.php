<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
class State extends Model
{
     protected $fillable=['country_id','state_name'];

     public function country(){
         return $this->belongsTo(Country::class);
     }
}
