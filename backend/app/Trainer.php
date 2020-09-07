<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{       
    // para poder actulizar los soguientesa campos
    protected $fillable=['nombre','avatar'];
        //
        /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
