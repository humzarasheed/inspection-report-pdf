<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

class GenerateFourPointInspectionReportJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $type = 'draft') {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {

            $order = Order::firstOrCreate([
                'customer' => 'Abdul Mateen'
            ]);

            $html = view('four-point-report', [
                'order' => $order,
            ])->render();

            ini_set('memory_limit', '1024M');
            set_time_limit(300);

            $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait')->setOptions([
                'isRemoteEnabled' => true,
                'isHtml5ParserEnabled' => true
            ]);

            $pdf->getDomPDF()->set_option("isPhpEnabled", true);

            $fileName = "reports/Four_Point_" . time() . ".pdf";

            $disk = Storage::disk(config('filesystems.default'));

            $pdfOutput = $pdf->output();
            $sizeInBytes = strlen($pdfOutput);
            $pageCount = $pdf->getDomPDF()->getCanvas()->get_page_count();

            $disk->put($fileName, $pdfOutput);

            // free memory
            unset($pdf);
            unset($pdfOutput);
            gc_collect_cycles();
        } catch (Throwable $e) {

            Log::error('Error generating wind mitigation report', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
