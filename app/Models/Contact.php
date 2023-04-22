<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'id',
        'name',
        'phone'
    ];

    public function getContactList() {
        $query = $this->get();

        return $query;
    }

    public function getContactById(int $id = null) {
        $query = $this->where('id', $id)->select('*')->first();

        return $query;
    }
}
