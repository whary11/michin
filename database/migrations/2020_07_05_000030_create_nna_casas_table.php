<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateNnaCasasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'nna_casas';
    /**
     * Run the migrations.
     * @table nna_casas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('casa_id');
            $table->unsignedInteger('nna_id');
            $table->unsignedInteger('estado_id');
            $table->timestamps();


            $table->foreign('casa_id')
                ->references('id')->on('casas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nna_id')
                ->references('id')->on('nna')
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
