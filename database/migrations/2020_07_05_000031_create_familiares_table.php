<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateFamiliaresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'familiares';
    /**
     * Run the migrations.
     * @table familiares
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('nna_id');
            $table->unsignedInteger('familiar_id');
            $table->unsignedInteger('parentesco_id');
            $table->integer('contacto')->default('0')->comment('0 = NO, 1 = SI
solo puede haber un familiar principal de contanto');
            $table->integer('habita')->default('0')->comment('0 = no , 1 = si');
            $table->unsignedInteger('estado_id');
            $table->timestamps();


            $table->foreign('parentesco_id')
                ->references('id')->on('parentescos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nna_id')
                ->references('id')->on('nna')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('familiar_id')
                ->references('id')->on('users')
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
