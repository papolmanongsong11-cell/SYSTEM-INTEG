<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Book Management System')</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Arial, Helvetica, sans-serif;
            color: #202b27;
            background: #f4f7f5;
        }

        * { box-sizing: border-box; }
        body { margin: 0; min-width: 320px; }
        a { color: #176b50; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .shell { width: min(1040px, calc(100% - 32px)); margin: 44px auto; }
        .brand { margin-bottom: 28px; color: #176b50; font-size: 13px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        h1 { margin: 0 0 8px; font-size: clamp(28px, 4vw, 36px); letter-spacing: -.03em; }
        h2 { margin-top: 0; }
        p { line-height: 1.55; }
        .muted { color: #69766f; }
        .page-heading { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 24px; }
        .page-heading p { margin: 0; }
        .card { padding: 24px; border: 1px solid #e0e8e3; border-radius: 14px; background: #fff; box-shadow: 0 10px 30px rgba(34, 63, 49, .05); }
        .button, button { display: inline-flex; align-items: center; justify-content: center; min-height: 42px; padding: 0 16px; border: 1px solid #176b50; border-radius: 8px; background: #176b50; color: #fff; font: inherit; font-weight: 700; cursor: pointer; }
        .button:hover, button:hover { background: #10563f; text-decoration: none; }
        .button.secondary { border-color: #d7e1db; background: #fff; color: #26362f; }
        .button.secondary:hover { background: #f4f7f5; }
        .search-row { display: flex; gap: 10px; margin-bottom: 20px; }
        input { width: 100%; min-height: 42px; padding: 9px 12px; border: 1px solid #cbd7cf; border-radius: 8px; color: #202b27; font: inherit; }
        input:focus { outline: 3px solid #c5e5d6; border-color: #176b50; }
        .search-row input { max-width: 420px; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 14px 12px; border-bottom: 1px solid #e8eeea; vertical-align: middle; }
        th { color: #68766f; font-size: 12px; letter-spacing: .07em; text-transform: uppercase; }
        tr:last-child td { border-bottom: 0; }
        .actions { display: flex; align-items: center; gap: 14px; white-space: nowrap; }
        .delete-form { display: inline; }
        .link-button { min-height: 0; padding: 0; border: 0; background: transparent; color: #a33d37; font-weight: 400; }
        .link-button:hover { background: transparent; color: #7c2925; text-decoration: underline; }
        .notice { margin-bottom: 18px; padding: 13px 16px; border: 1px solid #b9dfc9; border-radius: 8px; background: #eef9f2; color: #17583e; }
        .empty-state { padding: 28px 12px; text-align: center; }
        .empty-state h2 { margin-bottom: 6px; }
        .form-card { max-width: 680px; }
        .field { margin-bottom: 18px; }
        .field label { display: block; margin-bottom: 7px; font-weight: 700; }
        .field-error { margin: 6px 0 0; color: #a33d37; font-size: 14px; }
        .form-actions { display: flex; gap: 10px; margin-top: 24px; }
        .back-link { display: inline-block; margin-bottom: 18px; }

        @media (max-width: 620px) {
            .shell { margin: 28px auto; }
            .page-heading { align-items: start; flex-direction: column; }
            .card { padding: 18px; }
            .search-row { flex-wrap: wrap; }
            .search-row input { max-width: none; }
            th, td { padding: 11px 8px; }
        }
    </style>
</head>
<body>
    <main class="shell">
        <div class="brand">Book Management System</div>
        @yield('content')
    </main>
</body>
</html>
