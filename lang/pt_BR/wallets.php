<?php

use App\Enums\WalletTypeEnum;

return [
    'title' => 'Minhas Contas',
    'title_singular' => 'Conta',
    'actions' => [
        'refresh_balance' => 'Atualizar Saldo',
    ],
    'notifications' => [
        'balance_refreshed' => 'Saldo Atualizado',
    ],
    'fields' => [
        'name' => 'Nome',
        'type' => 'Tipo',
        'balance' => 'Saldo',
        'initial_balance' => 'Saldo Inicial',
        'credit_limit' => 'Limite de Crédito',
        'total_due' => 'Total Atual Devido',
        'currency_code' => 'Moeda',
        'description' => 'Descrição',
        'statement_day_of_month' => 'Dia do Mês do Extrato',
        'payment_due_day_of_month' => 'Dia do Mês para Pagamento',
        'icon' => 'Ícone',
        'color' => 'Cor',
        'exclude' => [
            'title' => 'Excluir',
            'help_text' => 'Ignorar o saldo desta carteira no saldo total',
        ]
    ],
    'types' => [
        WalletTypeEnum::GENERAL->value => 'Conta Bancária',
        WalletTypeEnum::CREDIT_CARD->value => 'Cartão de Crédito',
    ]
];
