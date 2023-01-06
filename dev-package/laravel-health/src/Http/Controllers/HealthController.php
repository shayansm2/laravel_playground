<?php

namespace QueraCollege\LaravelHealth\Http\Controllers;

use Illuminate\Routing\Controller;
use QueraCollege\LaravelHealth\Views\DatabaseHealthView;
use QueraCollege\LaravelHealth\Views\RoutesHealthVIew;

class HealthController extends Controller
{
    public function index()
    {
        $data = [];

        if (config('health.database')) {
            $data['database'] = $this->getDataBaseStatus();
        }

        if (config('health.migrations')) {
            $data['migrations'] = $this->getMigrationsStatus();
        }

        if (config('health.routes')) {
            $data['routes'] = $this->getRoutesStatus();
        }

        return view('health::index', compact('data'));
    }

    /**
     * @return array
     */
    private function getDataBaseStatus(): array
    {
        if (DatabaseHealthView::isWorkingCorrectly()) {
            return [
                'status' => true,
                'data' => null
            ];
        }

        return [
            'status' => false,
            'data' => 'اتصال به دیتابیس امکان‌پذیر نیست',
        ];
    }

    private function getMigrationsStatus(): array
    {
        if (DatabaseHealthView::hasMigratedCompletely()) {
            return [
                'status' => true,
                'data' => null,
            ];
        }

        return [
            'status' => false,
            'data' => 'در اجرا مایگریشن‌ها مشکلی وجود دارد',
        ];
    }

    private function getRoutesStatus(): array
    {
        if (RoutesHealthVIew::isGetRoutesWorkingCorrectly()) {
            return [
                'status' => true,
                'data' => null,
            ];
        }

        return [
            'status' => false,
            'data' => 'روت‌ها در درسترس نیستند',
        ];
    }
}
