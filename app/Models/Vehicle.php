<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class vehicle
 *
 * @property $id
 * @property $brand
 * @property $type
 * @property $powermotor
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehicle extends Model
{
    
    static $rules = [
		'brand' => 'required',
		'type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['brand','type','tires','powermotor'];



}
