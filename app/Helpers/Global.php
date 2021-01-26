<?php
use App\Siswa;
use App\Guru;
use App\Video;
use App\Document;
use App\Image;
use App\Audio;
use App\Post;
use App\Posting;
use App\Event;

function ranking5Besar()
{
    //harus dikonfigurasi dulu di composer.json dengan tulisan files
    $siswa = Siswa::all();
    $siswa->map(function($s){
        $s->rataRataNilai = $s->rataRataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);

    return $siswa;
}

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}

function totalVideo()
{
    return Video::count();
}

function totalDocument()
{
    return Document::count();
}

function totalImage()
{
    return Image::count();
}

function totalAudio()
{
    return Audio::count();
}

function totalPostingan()
{
    return Posting::count();
}

function totalPost()
{
    return Post::count();
}

function totalEvent()
{
    return Event::count();
}


