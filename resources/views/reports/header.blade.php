<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Template</title>
    
    <!-- 1. Pull in Tailwind via CDN (or your compiled Vite assets) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* 2. Critical PDF Hack: Force colors/backgrounds to show up when printing */
        html {
            -webkit-print-color-adjust: exact;
        }

        /* 3. Keep tables clean across page boundaries */
        tr {
            page-break-inside: avoid;
        }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased font-sans p-6">
    <!-- Header Section -->
    <div class="flex justify-between items-start border-b border-slate-200 pb-8 mb-8">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-slate-900">INVOICE</h1>
            <p class="text-sm text-slate-500 mt-1">#INV-2026-0042</p>
        </div>
        <div class="text-right">
            <h2 class="font-semibold text-slate-900">Your Company Inc.</h2>
            <p class="text-sm text-slate-500">123 Innovation Way</p>
            <p class="text-sm text-slate-500">Tech City, TC 94016</p>
        </div>
    </div>

   @yield('content')
   
</body>
</html>