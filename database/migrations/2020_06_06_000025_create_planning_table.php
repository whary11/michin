<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePlanningTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'planning';
    /**
     * Run the migrations.
     * @table planning
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('topic', 45);
            $table->unsignedInteger('planning_teacher_id');
            $table->unsignedInteger('degree_planning_id');
            $table->unsignedInteger('status_id');
            $table->string('objective', 45);
            $table->string('methodology', 45);
            $table->string('achievement', 45)->comment('Logro');
            $table->string('strategy', 45);
            $table->string('tracing', 45)->comment('Seguimiento');
            $table->string('description');
            $table->unsignedInteger('area_id');
            $table->timestamps();


            $table->foreign('planning_teacher_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('degree_planning_id')
                ->references('id')->on('degrees')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('status_id')
                ->references('id')->on('statuses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('area_id')
                ->references('id')->on('areas')
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
