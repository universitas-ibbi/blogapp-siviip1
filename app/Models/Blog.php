<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "tblblog";

    protected $fillable = ["judul","isi","kategori_id","user_id"];

    // SELECT TBLBLOG.JUDUL,TBLKATEGORI.ID
    // FROM TBLBLOG
    // JOIN TBLKATEGORI ON TBLBLOG.KATEGORI_ID=TBLKATEGORI.ID

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
