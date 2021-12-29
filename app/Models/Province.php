<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Province extends Model
{
    use Sortable;
    protected $table = 'province';

    protected $fillable = [
        'name',
    ];
    
    public $sortable = ['id', 'name', 'created_at', 'updated_at'];

    public function districts()
    {
        // return $this->hasMany(District::class);
    }
}
