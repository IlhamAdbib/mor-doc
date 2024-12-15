<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateBureauxTable extends Migration
{
    public function up()
    {
        Schema::create('bureaus', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom du bureau
            $table->foreignId('commune_id')->constrained('communes')->onDelete('cascade'); // Lien avec les communes
            $table->timestamps(); // Colonnes created_at et updated_at
        });

        // Pré-remplir la table bureaus avec les données des bureaux par commune
        $now = Carbon::now();
        $bureausByCommune = [
            "بني مكادة" => ["مكتب بني مكادة 1", "مكتب بني مكادة 2", "مكتب بني مكادة 3"],
            "مغوغة" => ["مكتب مغوغة 1", "مكتب مغوغة 2"],
            "تطوان المدينة" => ["مكتب تطوان المركز", "مكتب مرتيل", "مكتب السمارة"],
            "سايس" => ["مكتب سايس 1", "مكتب سايس 2", "مكتب سايس 3"],
            "أنفا" => ["مكتب أنفا 1", "مكتب أنفا 2", "مكتب أنفا 3"],
            "النخيل" => ["مكتب النخيل 1", "مكتب النخيل 2"],
            "جيليز" => ["مكتب جيليز 1", "مكتب جيليز 2"],
            "المدينة القديمة" => ["مكتب العيون 1", "مكتب العيون 2"],
        ];

        $bureaus = [];
        foreach ($bureausByCommune as $communeName => $bureauNames) {
            // Récupérer l'ID de la commune correspondante
            $commune = DB::table('communes')->where('name', $communeName)->first();
            if ($commune) {
                foreach ($bureauNames as $bureauName) {
                    $bureaus[] = [
                        'name' => $bureauName,
                        'commune_id' => $commune->id,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
        }

        DB::table('bureaus')->insert($bureaus);
    }

    public function down()
    {
        Schema::dropIfExists('bureaus');
    }
}
