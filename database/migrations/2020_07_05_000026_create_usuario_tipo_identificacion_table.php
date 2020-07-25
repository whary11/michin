<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsuarioTipoIdentificacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'usuario_tipo_identificacion';
    /**
     * Run the migrations.
     * @table usuario_tipo_identificacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('tipo_identificacion_id');
            $table->integer('principal')->default('0');
            $table->string('identificacion');
            $table->date('fecha_expedicion')->nullable();
            $table->string('notaria')->nullable()->comment('sólo para registro civil');
            $table->string('numero_notaria')->nullable()->comment('sólo para registro civil');
            $table->string('registraduria')->nullable()->comment('sólo para registro civil');
            $table->string('codigo_notaria')->nullable()->comment('sólo para registro civil');
            $table->string('serial')->nullable()->comment('solo para registro civil');
            $table->timestamps();


            $table->foreign('usuario_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_identificacion_id')
                ->references('id')->on('tipos_identificacion')
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
