<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * @property int $id
 * @property int $oid
 * @property string $name
 * @property string $sname
 * @property string $image
 * @property string $tel
 * @property string $growth
 * @property int $sort
 */
class Officer extends Model
{  use Sortable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'officer';

    /**
     * @var array
     */
    protected $fillable = ['oid', 'name', 'sname', 'image', 'tel', 'growth', 'sort'];

}
