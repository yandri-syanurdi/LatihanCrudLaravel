<?php
 
$bonus_karyawan = [
    'Andika' => 20000,
    'Sule' => '',
    'David' => false,
    'Meranti' => 0,
    'Indah' => 40000,
    'Sahfitri' => 12000,
];
 
var_dump($bonus_karyawan);
 
$bonus_karyawan = array_filter($bonus_karyawan);
var_dump($bonus_karyawan);