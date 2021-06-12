<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competition extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'code',
        'administrator_id',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'administrator_id', 'id');
    }

    public function objectives(){
        return $this->belongsTo(Objective::class,'objective_id','id');
    }

    public function evaluators(){
        return $this->belongsToMany(Evaluator::class,'competition_evaluator_objectives');
    }

    /*public static function boot(){
        parent ::boot() ;

        //to delete objectives related to a competition
        static ::deleting(function(Competition $competition){
            $competition->objectives()->delete();
        });

    }*/
}
