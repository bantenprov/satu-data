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
        

        Schema::create('ref_unkerjas', function (Blueprint $table) {            
            $table->increments('id');
            $table->string('kunker',191)->index();
            $table->string('name',191);
            $table->string('kunker_simral',191)->nullable();
            $table->integer('levelunker');
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
        Schema::dropIfExists('ref_unkerjas');
    }
}
