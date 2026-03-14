<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id_event';
    protected $fillable = ['id_event', 'nama_event', 'deskripsi_event', 'tanggal_event', 'waktu_event', 'tempat_event', 'penyelenggara_event'];

    // public function save(array $options = [])
    // {
    //     $id = str_pad($this->id, 5, '0', STR_PAD_LEFT);
    //     $this->id_event = $id;
    //     return parent::save($options);
    // }
}
