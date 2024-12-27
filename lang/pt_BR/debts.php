<?php

use App\Enums\DebtActionTypeEnum;
use App\Enums\DebtTypeEnum;

return [
    'title' => 'Lançamentos',
    'title_singular' => 'Lançamento',
    'actions' => [
        'debt_transaction' => 'Transferências',
    ],
    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'amount' => 'Valor',
        'description' => 'Descrição',
        'start_at' => 'Início',
        'color' => 'Cor',
        'wallet' => 'Carteira',
        'initial_wallet' => 'Carteira Inicial',
        'happened_at' => 'Data do Ocorrido',
        'debt' => 'Dívida',
        'action_type' => 'Tipo de Ação',
        'from_wallet' => 'Da Carteira',
        'total_debt_amount' => 'Valor Total da Dívida',
    ],
    'types' => [
        DebtTypeEnum::PAYABLE->value => 'A Pagar',
        DebtTypeEnum::RECEIVABLE->value => 'A Receber',
    ],
    'action_types' => [
        DebtTypeEnum::RECEIVABLE->value => [
            DebtActionTypeEnum::DEBT_COLLECTION->value => 'Cobrança de Dívida',
            DebtActionTypeEnum::LOAN_INCREASE->value   => 'Aumento de Empréstimo',
            DebtActionTypeEnum::LOAN_INTEREST->value   => 'Juros',
        ],
        DebtTypeEnum::PAYABLE->value => [
            DebtActionTypeEnum::REPAYMENT->value     => 'Pagamento',
            DebtActionTypeEnum::DEBT_INCREASE->value => 'Aumento de Dívida',
            DebtActionTypeEnum::DEBT_INTEREST->value => 'Juros',
        ],
    ]
];
