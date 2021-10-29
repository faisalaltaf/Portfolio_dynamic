<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;
    protected $fileable = [
        'header_logo_text',
        'image_logo',
        'image_header',
        'header_title',
        'Designation',
        'Brand_right_side'

    ];
}
