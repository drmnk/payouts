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
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            /*
                В реальности это скорее был бы foreignId в таблицу users,
                но сейчас это выходит за пределы тестового задания
            */
            $table->string('username');
            $table->text('details');
            $table->decimal('amount', 12, 2);
            /*
                И currency скорее всего тоже было бы ссылкой на справочник валют
            */
            $table->string('currency');
            $table->string('status')->default('Не оплачен');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payouts');
    }
};
