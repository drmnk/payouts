<?php

namespace App\Enums;

enum PayoutStatus: string
{
    case Paid = 'Оплачен';
    case Unpaid = 'Не оплачен';
}
