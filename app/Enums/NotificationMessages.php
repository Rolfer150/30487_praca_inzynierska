<?php

namespace App\Enums;

enum NotificationMessages: string
{
    case OFFERCREATE = 'Oferta została dodana';
    case OFFERDELETE = 'Oferta została usunięta';
}
