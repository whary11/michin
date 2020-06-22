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
            $table->string('names', 45);
            $table->string('email', 100);
            $table->string('password', 200);
            $table->string('email_verified_at', 45)->nullable();
            $table->string('remember_token', 45);
            $table->string('avatar')->default('https://pluralsight.imgix.net/paths/path-icons/nodejs-601628d09d.png');
            $table->unsignedInteger('neighborhood_user_id')->nullable();
            $table->unsignedInteger('eps_user_id')->nullable();
            $table->unsignedInteger('sexe_user_id')->nullable();
            $table->unsignedInteger('pension_user_id')->nullable();
            $table->unsignedInteger('arl_user_id')->nullable();
            $table->unsignedInteger('compensation_box_id')->nullable();
            $table->unsignedInteger('blood_group_id')->nullable()->comment('Grupo sanguíneo');
            $table->unsignedInteger('document_type_user_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('document', 45);
            $table->unsignedInteger('responable_user_id')->nullable();
            $table->string('name_ref', 100)->nullable()->comment('Nombre de la persona en caso de emergencia.');
            $table->string('phone_ref', 100)->nullable()->comment('Telefono de la persona en caso de emergencia.');
            $table->string('relationship_ref', 45)->nullable()->comment('Parentesco del contacto en caso de emergencia.');
            $table->string('phone1', 45)->nullable();
            $table->string('phone2', 45)->nullable();
            $table->string('surnames', 200)->nullable();
            $table->longText('firm')->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('is_active')->default('1')->comment('1 activo o 0 inactivo ');
            $table->string('uid');
            $table->timestamps();


            $table->foreign('neighborhood_user_id')
                ->references('id')->on('neighborhoods')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('eps_user_id')
                ->references('id')->on('eps')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('sexe_user_id')
                ->references('id')->on('sexes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pension_user_id')
                ->references('id')->on('pensions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('arl_user_id')
                ->references('id')->on('arl')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('compensation_box_id')
                ->references('id')->on('compensations_box')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('blood_group_id')
                ->references('id')->on('blood_groups')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('document_type_user_id')
                ->references('id')->on('document_types')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('responable_user_id')
                ->references('id')->on('users')
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
