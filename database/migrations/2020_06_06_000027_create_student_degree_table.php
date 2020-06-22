<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateStudentDegreeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'student_degree';
    /**
     * Run the migrations.
     * @table student_degree
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->comment('Estudiante');
            $table->unsignedInteger('degree_id');
            $table->string('school_year', 4)->comment('Año electivo');
            $table->unsignedInteger('status_id');
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('degree_id')
                ->references('id')->on('degrees')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('status_id')
                ->references('id')->on('statuses')
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
