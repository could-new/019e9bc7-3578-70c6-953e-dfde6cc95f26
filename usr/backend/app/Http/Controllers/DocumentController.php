<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Invoice;
use App\Models\WorkReport;
use App\Exports\InvoiceExportService;
use App\Services\PdfReportService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentController extends Controller
{
    protected $pdfService;
    protected $invoiceExport;

    public function __construct(PdfReportService $pdfService, InvoiceExportService $invoiceExport)
    {
        $this->pdfService = $pdfService;
        $this->invoiceExport = $invoiceExport;
    }

    public function downloadInvoiceExcel(Invoice $invoice): BinaryFileResponse
    {
        $templatePath = resource_path('templates/excel/invoice_template.xlsx');
        $filePath = $this->invoiceExport->exportInvoice($invoice, $templatePath);
        
        return response()->download($filePath, '請求書_' . $invoice->invoice_number . '.xlsx');
    }

    public function downloadWorkReportPdf(WorkReport $report): BinaryFileResponse
    {
        $templatePath = resource_path('templates/pdf/work_report_template.pdf');
        $filePath = $this->pdfService->generateWorkReportPdf($report, $templatePath);
        
        return response()->download($filePath, '作業報告書_' . $report->report_date . '.pdf');
    }
    
    public function downloadCoverPdf(Project $project): BinaryFileResponse
    {
        $templatePath = resource_path('templates/pdf/cover_template.pdf');
        $filePath = $this->pdfService->generateCoverReportPdf($project, $templatePath);
        
        return response()->download($filePath, '表紙_' . $project->id . '.pdf');
    }
}
