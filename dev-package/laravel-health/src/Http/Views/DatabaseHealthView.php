<?php

namespace QueraCollege\LaravelHealth\Http\Views;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseHealthView
{
    public static function isWorkingCorrectly(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function hasMigratedCompletely(): bool
    {
        try {
            Artisan::call('migrate:status');
            $output = Artisan::output();
            foreach (explode("\n", $output) as $migration) {
                if (strpos($migration, 'table')) {
                    if (!strpos($migration, 'Ran')) {
                        return false;
                    }
                }
            }

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}
