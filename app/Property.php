<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';
    public $timestamps = false;

    public function scopeFilter($query, $params)
    {
        if (!empty($params['name']))
            $query->where("name", "LIKE", "%".trim($params['name'])."%");

        if (!empty($params['priceFrom']))
            $query->where("price", '>=', $params['priceFrom']);

        if (!empty($params['priceTo']))
            $query->where("price", '<=', $params['priceTo']);

        if (!empty($params['bedrooms']))
            $query->where("bedrooms", $params['bedrooms']);

        if (!empty($params['bathrooms']))
            $query->where("bathrooms", $params['bathrooms']);

        if (!empty($params['storeys']))
            $query->where("storeys", $params['storeys']);

        if (!empty($params['garages']))
            $query->where("garages", $params['garages']);

        return $query;
    }
}
