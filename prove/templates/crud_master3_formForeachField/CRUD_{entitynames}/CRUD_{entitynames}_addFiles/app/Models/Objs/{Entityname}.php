<?php

namespace App\Models\Objs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class {Entityname} extends Model
{
    protected $table = '{entityname}';
    protected $primaryKey = 'id_{entityname_abbrev}';
    public function getRouteKeyName()
    {
        return $this->primaryKey;
    }
    protected $fillable = [
    ];
}
