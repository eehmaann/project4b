<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Request;
use App\Auth;

class Goal extends Model
{
     public function area() {
        return $this->belongsTo('App\Area');
    }
     public function workouts() {
        return $this->hasMany('App\Workout');
    } 
    
     public static function getForDropdown($currentuser) {
    	
        $goals = Goal::where('user_id', $currentuser)->orderBy('description', 'ASC')->get();
        $goals_for_dropdown = [];
        foreach($goals as $goal) {
            $goals_for_dropdown[$goal->id] = $goal->description.' '.$goal->quantifier;
        }
        return $goals_for_dropdown;
    }
    public function user() {
    return $this->belongsTo('App\User');
}
}
