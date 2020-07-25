<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEscolaridadesNnaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'escolaridades_nna';
    /**
     * Run the migrations.
     * @table escolaridades_nna
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->unsignedInteger('estado_id');
            $table->string('scope', 45);
            $table->timestamps();


            $table->foreign('estado_id')
                ->references('id')->on('estados')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
