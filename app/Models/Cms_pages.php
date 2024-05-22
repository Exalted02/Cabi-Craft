<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms_pages extends Model
{
    use HasFactory;
	protected $fillable = [
        'cms_page_name',
        'slug',
        'cms_page_content',
        'cms_page_content_de',
        'cms_page_content_fr',
        'cms_page_content_it',
        'status',
    ];
}
