<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Animale
 *
 * @property $id
 * @property $nombre
 * @property $tipo
 * @property $lugar
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Animale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'tipo', 'lugar'];


}
