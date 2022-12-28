<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nic', 15)->nullable();
            $table->string('user_name', 100)->unique();
            $table->string('phone', 12)->nullable();
            $table->string('phone_two', 12)->nullable();
            $table->string('phone_land', 12)->nullable();
            $table->date('date_of_birth')->default(NULL)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('district', 100);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nic');
            $table->dropColumn('user_name');
            $table->dropColumn('phone');
            $table->dropColumn('phone_two');
            $table->dropColumn('phone_land');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('address');
            $table->dropColumn('district');
        });
    }
}
