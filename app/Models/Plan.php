<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $day
 * @property array $classes
 */
class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['day', 'classes'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'classes' => 'array',
    ];
}
