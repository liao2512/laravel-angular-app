<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('banco');
            $table->string('referencia');
            $table->decimal('monto', 7, 2);
            $table->string('concepto');
            $table->string('titular');
            $table->string('cedula');
            $table->text('comentarios');
            $table->boolean('status')->default(0);
            $table->integer('registration_id')->index();
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
		Schema::drop('payments');
	}

}
