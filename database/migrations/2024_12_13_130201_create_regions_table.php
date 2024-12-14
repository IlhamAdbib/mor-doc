<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps(); // Ajoute les colonnes created_at et updated_at
        });

        // Pré-remplir la table avec les données des régions
        $now = Carbon::now(); // Utilise la date et heure actuelles pour created_at et updated_at
        DB::table('regions')->insert([
            ['id' => 1, 'name' => 'جهة طنجة تطوان الحسيمة', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name' => 'جهة فاس مكناس', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'name' => 'جهة الرباط سلا القنيطرة', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'name' => 'جهة الدار البيضاء سطات', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'name' => 'جهة مراكش آسفي', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'name' => 'جهة بني ملال خنيفرة', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'name' => 'جهة سوس ماسة', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'name' => 'جهة كلميم واد نون', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'name' => 'جهة العيون الساقية الحمراء', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'name' => 'جهة الداخلة وادي الذهب', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'name' => 'جهة درعة تافيلالت', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'name' => 'جهة الشرق', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
