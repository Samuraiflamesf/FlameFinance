<?php

use App\Enums\SpendTypeEnum;
use App\Enums\TransactionTypeEnum;
use App\Enums\VisibilityStatusEnum;

return [
    'title' => 'Relatórios',
    'title_singular' => 'Lançamento',
    'fields' => [
        'amount' => 'Valor',
        'confirmed' => 'Confirmado',
        'category' => 'Categoria',
        'account' => 'Conta',
        'happened_at' => 'Data do Ocorrido',
        'description' => 'Descrição',
        'type' => 'Tipo',
        'wallet' => 'Carteira',
        'from_wallet' => 'Da Carteira',
        'to_wallet' => 'Para a Carteira',
        'note' => 'Nota',
        'attachment' => 'Anexo',
    ],
    'types' => [
        TransactionTypeEnum::DEPOSIT->value   => [
            'id' => TransactionTypeEnum::DEPOSIT->value,
            'label' => 'Depósito',
            'description' => 'Depósito na sua carteira',
        ],
        TransactionTypeEnum::WITHDRAW->value  => [
            'id' => TransactionTypeEnum::WITHDRAW->value,
            'label' => 'Saque',
            'description' => 'Saque da sua carteira',
        ],
        TransactionTypeEnum::TRANSFER->value  => [
            'id' => TransactionTypeEnum::TRANSFER->value,
            'label' => 'Transferência',
            'description' => 'Transferência entre suas carteiras',
        ],
        TransactionTypeEnum::PAYMENT->value  => [
            'id' => TransactionTypeEnum::PAYMENT->value,
            'label' => 'Pagamento',
            'description' => 'Pagamento de uma carteira para outra carteira',
        ],
    ]
];
