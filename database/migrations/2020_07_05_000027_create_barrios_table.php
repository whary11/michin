<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateBarriosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'barrios';
    /**
     * Run the migrations.
     * @table barrios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->unsignedInteger('localidad_id')->nullable();
            $table->unsignedInteger('estado_id');
            $table->timestamps();


            $table->foreign('localidad_id')
                ->references('id')->on('localidaddes')
                ->onDelete('no action')
                ->onUpdate('no action');

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
