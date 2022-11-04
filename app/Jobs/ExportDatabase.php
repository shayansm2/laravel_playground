<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ExportDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        foreach ($this->data as $table => $path) {
            $this->createCsvFile($table, $path);
        }
    }

    private function createCsvFile(string $table, string $path)
    {
        $tableData = $this->getTableData($table);
        $this->saveAsCsv($tableData, $path);
    }

    private function getTableData(string $tableName): array
    {
        return DB::table($tableName)->get()->toArray();
    }

    private function saveAsCsv(array $tableData, string $path): void
    {
        $csvFile = fopen($path, 'w');

        $columnNames = array_keys(get_object_vars($tableData[0]));

        fputcsv($csvFile, $columnNames);

        foreach ($tableData as $fields) {
            fputcsv($csvFile, get_object_vars($fields));
        }

        fclose($csvFile);
    }
}
