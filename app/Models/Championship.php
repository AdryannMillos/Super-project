<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Championship
 *
 * @package App\Http\Entities
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property bool $weak_off
 * @property string $status
 * @property string $created_at
 */
class Championship extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'championships';
    protected $dates = ['created_at','updated_at'];
    protected $dateFormat = 'd-m-Y';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'logo',
        'weak_off',
        'status',
    ];

    public function getCreatedAtAttribute($date): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }
}
