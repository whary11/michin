<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSchoolHeadquartersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'school_headquarters';
    /**
     * Run the migrations.
     * @table school_headquarters
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('Sedes de cada instituciones.');
            $table->string('code', 45)->comment('A, B, C…..');
            $table->unsignedInteger('institution_id');
            $table->string('address', 100)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('phone1', 45)->nullable();
            $table->string('phone2', 45)->nullable();
            $table->string('email1', 45)->nullable();
            $table->string('email2', 45)->nullable();
            $table->timestamps();


            $table->foreign('institution_id')
                ->references('id')->on('institutions')
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
