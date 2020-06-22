<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateQualificationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'qualifications';
    /**
     * Run the migrations.
     * @table qualifications
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('period_id');
            $table->string('observation', 200)->nullable();
            $table->unsignedInteger('degree_subject_teacher_id');
            $table->timestamps();


            $table->foreign('period_id')
                ->references('id')->on('periods')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('degree_subject_teacher_id')
                ->references('id')->on('degrees_subjects_teachers')
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
