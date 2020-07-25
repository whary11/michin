<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateNnaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'nna';
    /**
     * Run the migrations.
     * @table nna
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('estado_id');
            $table->integer('regional_ha')->nullable();
            $table->string('letra_ha', 45)->nullable();
            $table->string('numero_ha', 45)->nullable();
            $table->integer('anio_ha')->nullable();
            $table->integer('numero_hermanos')->nullable();
            $table->unsignedInteger('ubicacion_id')->nullable();
            $table->string('sim')->nullable();
            $table->unsignedInteger('trabajador_social_id')->nullable();
            $table->unsignedInteger('psicologo')->nullable();
            $table->date('fecha_ingreso_icbf')->nullable();
            $table->integer('numero_ingresos_icbf')->nullable();
            $table->date('fecha_ingreso')->comment('fecha de ingreso a la fundación');
            $table->unsignedInteger('tipo_resolucion_id');
            $table->string('numero_resolucion')->nullable();
            $table->date('fecha_resolucion')->nullable();
            $table->unsignedInteger('centro_zonal_id')->nullable();
            $table->unsignedInteger('comisaria_familiar_id')->nullable();
            $table->string('defensor')->nullable();
            $table->unsignedInteger('barrio_id')->nullable();
            $table->unsignedInteger('motivo_ingreso_id')->nullable();
            $table->text('descripcion_ingreso_icbf')->nullable();
            $table->text('descripcion_ingreso_psicosocial')->nullable();
            $table->unsignedInteger('escolaridad_id');
            $table->integer('enfermedad')->default('0')->comment('0 = no, 1 = si');
            $table->string('tipo_vacuna', 45)->comment('ECE, EIE');
            $table->integer('accidente')->default('0')->comment('0 = no, 1 = si');
            $table->unsignedInteger('estado_nutricional_id')->nullable();
            $table->unsignedInteger('tipo_discapacidad_id')->nullable();
            $table->string('regimen', 45)->comment('CONTRIBUTIVO, SUBSIDIADO,NINGUNA');
            $table->string('nombre_regimen')->nullable();
            $table->integer('area_social')->default('1')->comment('0 = no tiene familia, 1 = tiene familia');
            $table->unsignedInteger('tipo_familia_id')->nullable();
            $table->unsignedInteger('responsable_nna_id')->nullable();
            $table->unsignedInteger('antecedente_familiar_nna_id')->nullable();
            $table->unsignedInteger('ingreso_familiar_nna_id')->nullable();
            $table->unsignedInteger('ocupacion_familiar_nna_id')->nullable();
            $table->unsignedInteger('aporta_economicamente_familiar_nna_id')->nullable();
            $table->unsignedInteger('escolaridad_familiar_nna_id')->nullable();
            $table->string('nnacol', 45)->nullable();
            $table->timestamps();


            $table->foreign('ubicacion_id')
                ->references('id')->on('ubicaciones')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('trabajador_social_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('psicologo')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('estado_id')
                ->references('id')->on('estados')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_resolucion_id')
                ->references('id')->on('tipos_resolucion')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('centro_zonal_id')
                ->references('id')->on('centros_zonales')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('comisaria_familiar_id')
                ->references('id')->on('comisarias_familiares')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('barrio_id')
                ->references('id')->on('barrios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('motivo_ingreso_id')
                ->references('id')->on('motivos_ingreso')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('escolaridad_id')
                ->references('id')->on('escolaridades_nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('estado_nutricional_id')
                ->references('id')->on('estados_nutricionales')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_discapacidad_id')
                ->references('id')->on('tipos_discapacidad')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_familia_id')
                ->references('id')->on('tipos_familia')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('responsable_nna_id')
                ->references('id')->on('responsables_nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('antecedente_familiar_nna_id')
                ->references('id')->on('antecedentes_familiares_nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ingreso_familiar_nna_id')
                ->references('id')->on('ingresos_familiares_nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ocupacion_familiar_nna_id')
                ->references('id')->on('ocupaciones_familiares_nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('aporta_economicamente_familiar_nna_id')
                ->references('id')->on('responsables_nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('escolaridad_familiar_nna_id')
                ->references('id')->on('escolaridades_nna')
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
