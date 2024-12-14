<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de la ville
            $table->foreignId('region_id')->constrained('regions')->onDelete('cascade'); // Lien avec les régions
            $table->timestamps(); // Colonnes created_at et updated_at
        });

        // Pré-remplir la table cities avec les données des villes par région
        $now = Carbon::now();
        $citiesByRegion = [
            1 => ["طنجة", "تطوان", "الحسيمة", "شفشاون"],
            2 => ["فاس", "مكناس", "إفران", "الحاجب"],
            3 => ["الرباط", "سلا", "القنيطرة", "تمارة"],
            4 => ["الدار البيضاء", "الجديدة", "سطات", "برشيد"],
            5 => ["مراكش", "آسفي", "الصويرة", "شيشاوة"],
            6 => ["بني ملال", "خنيفرة", "الفقيه بن صالح", "أزيلال"],
            7 => ["أكادير", "تارودانت", "تزنيت", "إنزكان"],
            8 => ["كلميم", "طانطان", "سيدي إفني"],
            9 => ["العيون", "بوجدور", "طرفاية"],
            10 => ["الداخلة", "أوسرد"],
            11 => ["الرشيدية", "ورزازات", "زاكورة"],
            12 => ["وجدة", "الناظور", "بركان"],
        ];

        $cities = [];
        foreach ($citiesByRegion as $regionId => $cityNames) {
            foreach ($cityNames as $cityName) {
                $cities[] = [
                    'name' => $cityName,
                    'region_id' => $regionId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('cities')->insert($cities);
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
