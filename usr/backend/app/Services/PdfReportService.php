<?php

namespace App\Services;

use setasign\Fpdi\Fpdi;
use App\Models\WorkReport;
use App\Models\Project;

class PdfReportService
{
    /**
     * Generate Work Report PDF using an existing template.
     */
    public function generateWorkReportPdf(WorkReport $report, string $templatePath): string
    {
        $pdf = new Fpdi();
        
        // Add Japanese font support (e.g., using TCPDF or appropriate FPDI configuration if extended)
        // Note: For full Japanese support in standard FPDF/FPDI, a Japanese font extension like TFDF is typically required.
        $pdf->AddMBFont('Gothic', 'SJIS'); 

        $pageCount = $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1);

        $pdf->AddPage();
        $pdf->useTemplate($templateId, 0, 0, 210); // A4 width

        $pdf->SetFont('Gothic', '', 12);

        // Populate values at exact template coordinates (X, Y)
        // Project Name
        $pdf->SetXY(40, 50);
        $pdf->Write(10, mb_convert_encoding($report->project->project_name, 'SJIS', 'UTF-8'));

        // Worker Name
        $pdf->SetXY(40, 60);
        $pdf->Write(10, mb_convert_encoding($report->worker_name, 'SJIS', 'UTF-8'));

        // Date
        $pdf->SetXY(150, 30);
        $pdf->Write(10, $report->report_date);

        // Details
        $pdf->SetXY(40, 80);
        $pdf->Write(10, mb_convert_encoding($report->work_details, 'SJIS', 'UTF-8'));

        // Hours
        $pdf->SetXY(40, 150);
        $pdf->Write(10, $report->hours_worked . ' 時間');

        $outputPath = storage_path('app/public/reports/work_report_' . $report->id . '.pdf');
        $pdf->Output('F', $outputPath);

        return $outputPath;
    }
    
    /**
     * Generate Cover Report PDF
     */
    public function generateCoverReportPdf(Project $project, string $templatePath): string
    {
        $pdf = new Fpdi();
        $pdf->AddMBFont('Gothic', 'SJIS'); 

        $pdf->setSourceFile($templatePath);
        $templateId = $pdf->importPage(1);

        $pdf->AddPage();
        $pdf->useTemplate($templateId, 0, 0, 210);

        $pdf->SetFont('Gothic', '', 16);
        $pdf->SetXY(50, 100);
        $pdf->Write(10, mb_convert_encoding($project->project_name . ' 報告書', 'SJIS', 'UTF-8'));

        $outputPath = storage_path('app/public/reports/cover_report_' . $project->id . '.pdf');
        $pdf->Output('F', $outputPath);

        return $outputPath;
    }
}
