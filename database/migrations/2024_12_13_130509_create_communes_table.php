<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateCommunesTable extends Migration
{
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de la commune
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade'); // Lien avec les villes
            $table->timestamps(); // Colonnes created_at et updated_at
        });

        // Pré-remplir la table communes avec les données des communes par ville
        $now = Carbon::now();
        $communesByCity = [
            "طنجة" => ["بني مكادة", "مغوغة", "السواني"],
            "تطوان" => ["تطوان المدينة", "مرتيل", "السمارة"],
            "الحسيمة" => ["بني بوفراح", "بني حذيفة", "الرواضي"],
            "فاس" => ["فاس المدينة", "سايس", "زواغة"],
            "الرباط" => ["يعقوب المنصور", "أكدال الرياض", "السويسي"],
            "الدار البيضاء" => ["أنفا", "الفداء مرس السلطان", "عين الشق"],
            "مراكش" => ["المدينة", "النخيل", "جيليز"],
            "العيون" => ["المدينة القديمة", "المسيرة", "الإبداع"],
        ];

        $communes = [];
        foreach ($communesByCity as $cityName => $communeNames) {
            // Récupérer l'ID de la ville correspondante
            $city = DB::table('cities')->where('name', $cityName)->first();
            if ($city) {
                foreach ($communeNames as $communeName) {
                    $communes[] = [
                        'name' => $communeName,
                        'city_id' => $city->id,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
        }

        DB::table('communes')->insert($communes);
    }

    public function down()
    {
        Schema::dropIfExists('communes');
    }
}
