<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;


class Obj extends Model
{
    use HasFactory, HasRecursiveRelationships;

    protected $fillable = [
    	'parent_id'
    ];

    public static function booted()
    {
        static::creating(function($model){
        	$model->uuid = Str::uuid();
        });
    }

    public function scopeForCurrentTeam($query)
    {
        $query->where('team_id', auth()->user()->currentTeam->id);
    }

    public function objectable()
    {
    	return $this->morphTo();
    }
}
