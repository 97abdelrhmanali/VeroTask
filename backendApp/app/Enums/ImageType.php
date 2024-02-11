<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum ImgType: string {
    case Picture = 'picture';
    case Background = 'background';
}
