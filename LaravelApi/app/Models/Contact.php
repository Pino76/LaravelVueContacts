<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    public const TABLE_NAME = 'contacts';
    protected $table = self::TABLE_NAME;
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','designation','contact_no'];
}
