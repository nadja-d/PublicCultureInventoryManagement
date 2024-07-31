<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
    ];
    protected $primaryKey = 'adminID';
    public $timestamps = false;

    public static function verifyAdmin($username, $password)
    {
        $result = DB::select('CALL authorizeAdmin(?, ?)', [$username, $password]);
        return !empty($result);
    }
}