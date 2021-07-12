<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 20)->comment('Номер телефона');
            $table->enum('status', ['interviewed', 'not_interviewed'])->comment('Cтатус')->default('not_interviewed');
            $table->string('name')->nullable()->comment('Имя');
            $table->string('last_name')->nullable()->comment('Фамилия');
            $table->string('email')->unique()->nullable();
            $table->date('birthday')->nullable()->comment('Дата рождения');
            $table->bigInteger('service_id')->comment('Название оказанной услуги')->unsigned()->nullable();
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->string('assessment')->comment('Оценка качества')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
