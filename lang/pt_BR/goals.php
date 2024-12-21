<?php

use App\Enums\SpendTypeEnum;
use App\Enums\VisibilityStatusEnum;

return [
    'title' => 'Metas',
    'title_singular' => 'Meta',
    'actions' => [
        'deposit' => 'Depositar',
        'withdraw' => 'Sacar',
    ],
    'fields' => [
        'name' => 'Nome',
        'amount' => 'Valor',
        'target_date' => 'Data Alvo',
        'currency_code' => 'Código da Moeda',
        'color' => 'Cor',
        'wallet' => 'Carteira',
        'from_wallet' => 'Da Carteira',
        'to_wallet' => 'Para a Carteira',
        'goal' => 'Meta',
        'target_amount' => 'Valor Alvo',
        'balance' => 'Saldo',
        'target_from' => 'Alvo Desde',
        'target_until' => 'Alvo Até',
    ],
];
