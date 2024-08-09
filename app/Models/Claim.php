<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claim';

    protected $fillable = ['nip','nama','instansi','no_hp','diagnosa','tgl_kejadian'];
}
