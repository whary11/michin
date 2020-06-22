<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDegreesSubjectsTeachersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'degrees_subjects_teachers';
    /**
     * Run the migrations.
     * @table degrees_subjects_teachers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('grados asignaturas docentes');
            $table->unsignedInteger('techaer_subject_id')->nullable();
            $table->unsignedInteger('student_degree_id');
            $table->string('school_year', 4);
            $table->timestamps();


            $table->foreign('techaer_subject_id')
                ->references('techaer_id')->on('techaers_subjects')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('student_degree_id')
                ->references('id')->on('student_degree')
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
