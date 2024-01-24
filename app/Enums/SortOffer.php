<?php

namespace App\Enums;

enum SortOffer: string
{
    case NEW = 'najnowsze';
    case OLD = 'najstarsze';
    case POPULAR = 'najpopularniejsze';
    case LOCATION = 'najbliższe';
    case RECOMMENDED = 'polecane';
}
