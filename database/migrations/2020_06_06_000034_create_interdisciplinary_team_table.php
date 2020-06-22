<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateInterdisciplinaryTeamTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'interdisciplinary_team';
    /**
     * Run the migrations.
     * @table interdisciplinary_team
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {           
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('Equipo interdisciplinar.');
            $table->string('name', 45)->nullable();
            $table->unsignedInteger('interdisciplinary_team_user_id')->comment('Equipo de apoyo a quien se remite el estudiante.');
            $table->unsignedInteger('d_s_t_interdisciplinary_team_id');
            $table->unsignedInteger('interdisciplinary_role_id');
            $table->timestamps();


            $table->foreign('interdisciplinary_team_user_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('d_s_t_interdisciplinary_team_id')
                ->references('id')->on('degrees_subjects_teachers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('interdisciplinary_role_id')
                ->references('id')->on('interdisciplinary_roles')
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
