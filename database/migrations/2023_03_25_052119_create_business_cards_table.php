<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('alias');
            $table->string('linkedin_url');
            $table->string('github_url');
            $table->timestamps();

            //constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_cards', function (Blueprint $table) {
            $table->dropForeign('business_cards_user_id_foreign');
            $table->dropColumn(['timestamps', 'github_url', 'linkedin_url', 'alias', 'id']);
        });
    }
};
