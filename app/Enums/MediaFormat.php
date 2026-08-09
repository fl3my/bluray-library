<?php

namespace App\Enum;

enum MediaFormat: string
{
    case Bluray = 'bluray';
    case Bluray3D = '3d_bluray';
    case Bluray4K = '4k_bluray';

    public function label(): string
    {
        return match ($this) {
            self::Bluray => 'Blu-ray',
            self::Bluray3D => '3D Blu-ray',
            self::Bluray4K => '4K Blu-ray',
        };
    }
}
