<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *
     *
     * 2. Créez la migration pour la table `relationships` en suivant le schéma suivant :
     * colonnes :
     * • id : bigint(20) unsigned NOT NULL AUTO_INCREMENT,
     * • created_by : bigint(20) unsigned NOT NULL,
     * • parent_id : bigint(20) unsigned NOT NULL,
     * • child_id : bigint(20) unsigned NOT NULL,
     * • *timestamps() : (created_at & updated_at)
     * colonnes indexées :
     * • id PRIMARY
     * • created_by
     * • parent_id
     * • child_id
 */
    public function up(): void
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('child_id');

            $table->index('created_by');
            $table->index('parent_id');
            $table->index('child_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
