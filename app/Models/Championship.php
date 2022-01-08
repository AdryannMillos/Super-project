<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Championship
 *
 * @package App\Http\Entities
 * @property int $id
 * @property mixed $name
 * @property string $logo
 * @property bool $weak_off
 * @property string $status
 */
class Championship extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'championships';

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
}
