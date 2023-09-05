<?php

namespace Database\Seeders;

use App\Models\ArabicAlphabet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArabicAlphabetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["lettre" => "أ"],
            ["lettre" => "ب"],
            ["lettre" => "ت"],
            ["lettre" => "ث"],
            ["lettre" => "ج"],
            ["lettre" => "ح"],
            ["lettre" => "خ"],
            ["lettre" => "د"],
            ["lettre" => "ذ"],
            ["lettre" => "ر"],
            ["lettre" => "ز"],
            ["lettre" => "س"],
            ["lettre" => "ش"],
            ["lettre" => "ص"],
            ["lettre" => "ض"],
            ["lettre" => "ط"],
            ["lettre" => "ظ"],
            ["lettre" => "ع"],
            ["lettre" => "غ"],
            ["lettre" => "ف"],
            ["lettre" => "ق"],
            ["lettre" => "ك"],
            ["lettre" => "ل"],
            ["lettre" => "م"],
            ["lettre" => "ن"],
            ["lettre" => "ه"],
            ["lettre" => "و"],
            ["lettre" => "ي"]
        ];
        ArabicAlphabet::insert($data);
    }
}
