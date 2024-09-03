<?php

namespace App\task048\Enum;

enum PositionCode: int
{
    case CONTINUE = 0;
    case WALL = 1;
    case START = 2;
    case FINISH = 3;
}
