<?php

use App\Enums\SpendTypeEnum;

return [
    'title' => 'Categorias',
    'title_singular' => 'Categoria',
    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'icon' => 'Ícone',
        'color' => 'Cor',
        'monthly_balance' => 'Saldo Mensal',
        'total' => 'Total',
        'is_visible' => 'Está Visível?',
        'is_visible_help_text' => 'Ignore esta categoria no saldo total e não mostre na lista de transações',
    ],
    'types' => [
        SpendTypeEnum::INCOME->value   => [
            'id' => SpendTypeEnum::INCOME->value,
            'label' => 'Receita',
            'description' => 'sua categoria de receita',
        ],
        SpendTypeEnum::EXPENSE->value   => [
            'id' => SpendTypeEnum::EXPENSE->value,
            'label' => 'Despesa',
            'description' => 'sua categoria de despesa',
        ],
    ]
];
