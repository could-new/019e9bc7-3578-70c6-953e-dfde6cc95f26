<?php

namespace App\Exports;

use App\Models\Invoice;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class InvoiceExportService
{
    /**
     * Fills an existing Japanese Excel template using PhpSpreadsheet.
     */
    public function exportInvoice(Invoice $invoice, string $templatePath): string
    {
        // Load the existing template, preserving formats, merged cells, fonts, etc.
        $spreadsheet = IOFactory::load($templatePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Fill exact cells
        // e.g., B2: Invoice Number, E2: Date, B4: Client Name, etc.
        $sheet->setCellValue('B2', $invoice->invoice_number);
        $sheet->setCellValue('E2', $invoice->issue_date);
        
        // Populate Client Name (Appending '御中')
        $clientName = $invoice->project->client_name . ' 御中';
        $sheet->setCellValue('B4', $clientName);

        // Project Name
        $sheet->setCellValue('B6', '件名: ' . $invoice->project->project_name);

        // Amounts
        $sheet->setCellValue('D10', $invoice->total_amount);
        $sheet->setCellValue('D11', $invoice->tax_amount);
        $grandTotal = $invoice->total_amount + $invoice->tax_amount;
        $sheet->setCellValue('D12', $grandTotal);

        // Save filled template to new file
        $writer = new Xlsx($spreadsheet);
        $outputPath = storage_path('app/public/exports/invoice_' . $invoice->id . '.xlsx');
        
        // Ensure directory exists
        if (!file_exists(dirname($outputPath))) {
            mkdir(dirname($outputPath), 0755, true);
        }

        $writer->save($outputPath);

        return $outputPath;
    }
}
