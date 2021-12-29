<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class District extends Model
{
    use Sortable;
    protected $table = 'district';

    protected $fillable = [
        'name',
    ];

    public $sortable = ['id', 'name', 'created_at', 'updated_at'];

    public function provinces(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
