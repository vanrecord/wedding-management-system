<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'go_with',
        'address',
        'reil',
        'usd',
        'code'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $last = static::orderBy('id', 'desc')->first();
            if (!$last) {
                $number = 1;
            } else {
                $lastNumber = (int) $last->code;
                $number = $lastNumber + 1;
            }
            $model->code = $number;
        });
    }
}
