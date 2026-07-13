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
    
   @yield('content')
   
</body>
</html>