<?php

use App\Enums\MonthEnum;
use App\Enums\QuarterEnum;
use App\Enums\VisibilityStatusEnum;
use App\Enums\WeekdayEnum;

return [
    'visibility_statuses' => [
        VisibilityStatusEnum::ACTIVE->value   => 'Ativo',
        VisibilityStatusEnum::INACTIVE->value => 'Inativo',
    ],
    'weekdays' => [
        WeekdayEnum::SUNDAY->value    => 'Domingo',
        WeekdayEnum::MONDAY->value    => 'Segunda-feira',
        WeekdayEnum::TUESDAY->value   => 'Terça-feira',
        WeekdayEnum::WEDNESDAY->value => 'Quarta-feira',
        WeekdayEnum::THURSDAY->value  => 'Quinta-feira',
        WeekdayEnum::FRIDAY->value    => 'Sexta-feira',
        WeekdayEnum::SATURDAY->value  => 'Sábado',
    ],
    'months' => [
        MonthEnum::JANUARY->value   => 'Janeiro',
        MonthEnum::FEBRUARY->value  => 'Fevereiro',
        MonthEnum::MARCH->value     => 'Março',
        MonthEnum::APRIL->value     => 'Abril',
        MonthEnum::MAY->value       => 'Maio',
        MonthEnum::JUNE->value      => 'Junho',
        MonthEnum::JULY->value      => 'Julho',
        MonthEnum::AUGUST->value    => 'Agosto',
        MonthEnum::SEPTEMBER->value => 'Setembro',
        MonthEnum::OCTOBER->value   => 'Outubro',
        MonthEnum::NOVEMBER->value  => 'Novembro',
        MonthEnum::DECEMBER->value  => 'Dezembro',
    ],
    'quarter_months' => [
        QuarterEnum::FIRST_MONTH->value  => 'Primeiro Mês',
        QuarterEnum::SECOND_MONTH->value => 'Segundo Mês',
        QuarterEnum::THIRD_MONTH->value  => 'Terceiro Mês',
    ]
];
