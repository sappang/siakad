<?php 

namespace App\Enums;

enum FeeStatus: string {
    case PENDING = 'tertunda' ;
    case SUCCESS =  'Sukses';
    case FAILED = 'Gagal';
    case CANCELLED = 'Dibatalkan';

    public static function options(): array{

        return collect(self::cases())->map(fn($item)=>[
                'value' => $item->value,
                'label' => $item->value
        ])->values()->toArray();
    }
}
?>