<?php

namespace App\Console\Commands;

use App\Http\Controllers\SeedController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migración de datos iniciales.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public $migrate;
    public function __construct()
    {
        parent::__construct();
        $this->migrate = new SeedController;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $status = false;
        $message = "Datos creados con éxito.";
        DB::beginTransaction();
        try {
            $this->migrate->runCountries();
            $this->migrate->runDepartments();
            $this->migrate->runCities();
            $this->migrate->runUsers();
            $this->migrate->runArl();
            $this->migrate->runSubjects();
            $this->migrate->runAreas();
            $this->migrate->runInstitutions();
            $this->migrate->runSchoolHeadquarter();
            $this->migrate->runDocumentType();
            $this->migrate->runBloodGroups();
            $this->migrate->runEps();
            $this->migrate->runSexes();
            $this->migrate->runNeighborhoods();
            $this->migrate->runPensions();
            $this->migrate->runConfiInit();
            $status = true;
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            $message = $th->getMessage();
        }

        if ($status) {
            $this->info($message);
        }else{
            $this->error($message);
        }

    }
}
