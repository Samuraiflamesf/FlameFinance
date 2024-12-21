<?php

use App\Enums\BudgetPeriodEnum;
use App\Enums\SpendTypeEnum;
use App\Enums\VisibilityStatusEnum;

return [
    'title' => 'Orçamentos',
    'title_singular' => 'Orçamento',
    'fields' => [
        'name' => 'Nome',
        'amount' => 'Valor',
        'actual_amount' => 'Valor Real',
        'spend_amount' => 'Valor Gasto',
        'period' => 'Período',
        'day_of_month' => 'Dia do Mês',
        'day_of_week' => 'Dia da Semana',
        'month_of_year' => 'Mês do Ano',
        'month_of_quarter' => 'Mês do Trimestre',
        'status' => 'Status',
        'color' => 'Cor',
        'categories' => 'Categorias',
        'recurrence' => 'Recorrência',
        'enabled' => 'Ativado?',
        'enabled_help_text' => 'Mostrar este orçamento no painel ou relatório',
    ],
    'periods' => [
        BudgetPeriodEnum::WEEKLY->value    => 'Semanal',
        BudgetPeriodEnum::MONTHLY->value   => 'Mensal',
        BudgetPeriodEnum::QUARTERLY->value => 'Trimestral',
        BudgetPeriodEnum::YEARLY->value    => 'Anual',
    ],
];
