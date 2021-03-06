<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";

    protected $fillable = ['latar_belakang', 'visi', 'misi', 'model_konsep', 'kekuatan', 'fokus_wilayah', 'alamat', 'telepon', 'email', 'instagram', 'facebook', 'youtube', 'latar_belakang_img', 'visi_img', 'misi_img', 'model_konsep_img', 'jam_kerja'];
}
