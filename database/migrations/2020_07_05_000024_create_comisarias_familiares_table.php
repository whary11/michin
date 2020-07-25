<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateComisariasFamiliaresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comisarias_familiares';
    /**
     * Run the migrations.
     * @table comisarias_familiares
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 45)->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono', 45)->nullable();
            $table->unsignedInteger('municipio_id');
            $table->timestamps();


            $table->foreign('municipio_id')
                ->references('id')->on('municipios')
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
