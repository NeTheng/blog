<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Commune extends Model
{
    use Sortable;
    protected $table = 'commune';

    protected $fillable = [
        'name',
    ];
}
