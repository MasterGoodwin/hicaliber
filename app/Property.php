<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';
    public $timestamps = false;

    public function scopeFilter($query, $params)
    {
        if (isset($params['name']))
            $query->where("code", "LIKE", "%".trim($params['name'])."%");

        if (isset($params['price']))
            $query->whereBetween("price", $params['price']);

        if (isset($params['bedrooms']))
            $query->where("bedrooms", $params['bedrooms']);

        if (isset($params['bathrooms']))
            $query->where("bathrooms", $params['bathrooms']);

        if (isset($params['storeys']))
            $query->where("storeys", $params['storeys']);

        if (isset($params['garages']))
            $query->where("garages", $params['garages']);

        return $query;
    }
}
