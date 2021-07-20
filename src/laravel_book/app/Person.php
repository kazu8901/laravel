<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;


class Person extends Model
{
    //
    public function getData() {
        return $this->id . ':' . $this->name . '(' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str) {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $min) {
        return $query->where('age', '>=', $min);
    }

    public function scopeAgeLessThan($query, $max) {
        return $query->where('age', '<=', $max);
    }

    protected static function boot() {
        parent::boot();
    
        static::addGlobalScope(new ScopePerson);
    }
    
}
