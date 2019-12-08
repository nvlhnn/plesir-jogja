<?php

namespace App;

use App\Place;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['user_id', 'place_id', 'id_pemesanan', 'kode_tiket'];

    public function user()
    {
        return $this->belongsTo('App\User');

    }
    public function Place()
    {
        return $this->belongsTo('App\Place');
    }

}
