<?php

// database/migrations/xxxx_xx_xx_add_user_id_to_entreprises_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToEntreprisesTable extends Migration
{
    public function up()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users'); // Associe à la table users
        });
    }

    public function down()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
