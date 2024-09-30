<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToKeyManagementTable extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('key_management', 'user_id')) {
            Schema::table('key_management', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->after('id')->nullable();
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::table('key_management', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
