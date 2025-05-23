<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['table','name', 'image','icon','module_slug'];

    public function subMenus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
