<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelGroup extends Model
{
    protected $table = 'model_groups';
    protected $guarded = false;

    public function products(){
        return $this->hasMany(Product::class, 'model_group_id', 'id');
    }
}
