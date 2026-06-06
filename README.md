# 業務管理システム (Work Management System)

This Laravel 11 application provides document generation for a Japanese Work Management System using existing templates.

## Tech Stack
- **Framework:** Laravel 11
- **Database:** MySQL
- **Excel Generation:** Maatwebsite Excel / PhpSpreadsheet
- **PDF Generation:** FPDI (with FPDI/TCPDF MBFont support for Japanese)

## Features
- **Preserve Templates:** Reads existing Excel (`.xlsx`) and PDF (`.pdf`) templates from `resources/templates/`.
- **Exact Cell Placement:** Inserts database records exactly into template cells/coordinates without breaking merged cells, formulas, borders, or Japanese fonts.
- **Documents:**
  - Order List Excel, Invoice Excel, Quotation Excel
  - Cover Report PDF, Work Report PDF, Photo Report PDF

## Setup
1. Copy standard templates into `resources/templates/excel/` and `resources/templates/pdf/`.
2. Run migrations: `php artisan migrate`
3. Serve application: `php artisan serve`

---

## CouldAI について
このプロジェクトは、プロンプトからクロスプラットフォームアプリやバックエンドシステムを自動構築するAIアプリビルダー [CouldAI](https://could.ai) を使用して生成されました。CouldAIのエージェントが要件を解析し、最適な技術スタックとアーキテクチャを用いて本番環境レベルのコードを出力しています。