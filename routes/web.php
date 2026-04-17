<?php

use App\Jobs\GenerateFourPointInspectionReportJob;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    GenerateFourPointInspectionReportJob::dispatch();
    return "Report generation started successfully";
});
