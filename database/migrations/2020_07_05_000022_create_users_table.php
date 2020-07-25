<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';
    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->unsignedInteger('genero_id');
            $table->unsignedInteger('orientacion_sexual_id')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedInteger('municipio_id')->nullable();
            $table->unsignedInteger('grupo_etnico_id')->nullable();
            $table->string('email')->nullable();
            $table->text('password')->nullable();
            $table->text('foto')->nullable();
            $table->unsignedInteger('estado_id');
            $table->unsignedInteger('escolaridad_id')->nullable();
            $table->unsignedInteger('estado_civil_id')->nullable();
            $table->unsignedInteger('ocupacion_id')->nullable();
            $table->timestamps();


            $table->foreign('genero_id')
                ->references('id')->on('generos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('municipio_id')
                ->references('id')->on('municipios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('orientacion_sexual_id')
                ->references('id')->on('orientaciones_sexual')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('grupo_etnico_id')
                ->references('id')->on('grupos_etnicos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('estado_id')
                ->references('id')->on('estados')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('escolaridad_id')
                ->references('id')->on('escolaridades_nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('estado_civil_id')
                ->references('id')->on('estados_civiles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ocupacion_id')
                ->references('id')->on('ocupaciones_familiares_nna')
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
