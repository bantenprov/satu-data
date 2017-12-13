<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;



class CreateLaravelOpdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opd', function (Blueprint $table) {
            //$table->increments('id');
            $table->uuid('id')->unique();
            $table->primary('id');
            $table->string('kunker')->index();
            $table->string('name');
            $table->string('kunker_sinjab')->nullable();            
            $table->string('kunker_simral')->nullable();
            $table->integer('levelunker');
            $table->string('njab');
            $table->string('npej');
            NestedSet::columns($table);
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
        Schema::dropIfExists('opd');
    }
}
