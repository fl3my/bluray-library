<?php

namespace App\Models;

use App\Enum\MediaFormat;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected function casts(): array
    {
        return [
            'format' => MediaFormat::class,
        ];
    }
}
