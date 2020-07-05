<?php

return [
    'pagination' => env('PAGINATION_PER_PAGE') ?? 10,
    'front_pagination' => env('FRONT_PAGINATION_PER_PAGE') ?? 12,
    'rajaongkir_key' => env('RAJAONGKIR_KEY',null),
    'shop_origin' => env('SHOP_ORIGIN', 36),

    'couriers' => [
        'jne' => 'Jalur Nugraha Ekakurir',
        'tiki' => 'Citra Van Titipan Kilat',
        'pos' => 'POS Indonesia'
    ],

    'bank' => [
        'bank_name' => 'BRI',
        'account_name' => 'Fachrurazzi',
        'account_number' => 123456789
    ]
];