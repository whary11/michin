<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSchoolHeadquarterDegreeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'school_headquarter_degree';
    /**
     * Run the migrations.
     * @table school_headquarter_degree
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('Para que un docente puedas impartir clases en varias sedes.');
            $table->unsignedInteger('school_headquarter_id');
            $table->unsignedInteger('school_headquarter_degree_id');
            $table->timestamps();


            $table->foreign('school_headquarter_id')
                ->references('id')->on('school_headquarters')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('school_headquarter_degree_id')
                ->references('id')->on('degrees')
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
