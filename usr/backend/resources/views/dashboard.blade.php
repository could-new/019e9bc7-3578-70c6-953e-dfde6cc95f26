<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>業務管理システム</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 text-white shadow-md">
            <div class="container mx-auto px-6 py-4">
                <h1 class="text-2xl font-bold">業務管理システム (Work Management System)</h1>
            </div>
        </header>
        
        <main class="flex-grow container mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">プロジェクト一覧</h2>
                <!-- Sample Dashboard Structure -->
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3 border">プロジェクト名</th>
                            <th class="p-3 border">顧客名</th>
                            <th class="p-3 border">ステータス</th>
                            <th class="p-3 border">書類出力</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-3 border">ウェブサイト改修</td>
                            <td class="p-3 border">株式会社サンプル</td>
                            <td class="p-3 border"><span class="px-2 py-1 bg-green-200 text-green-800 rounded">進行中</span></td>
                            <td class="p-3 border space-x-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">表紙PDF</button>
                                <button class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 text-sm">請求書Excel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
