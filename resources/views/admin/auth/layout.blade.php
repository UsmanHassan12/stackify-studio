<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('auth_title', 'Admin') — Stackify</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Nunito:wght@600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --dark: #0d1b2a;
            --gold: #d4a017;
            --border: #e8ecf0;
            --text: #4a5568;
            --danger: #ef4444;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body.adm-auth-body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: linear-gradient(160deg, #0d1b2a 0%, #1a2d4a 45%, #f5f7fa 45%);
        }
        .adm-auth-card {
            width: 100%;
            max-width: 400px;
            background: linear-gradient(165deg, #1a3358 0%, #0d1b2a 55%, #0a1628 100%);
            border-radius: 16px;
            padding: 32px 28px 36px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.35), inset 0 1px 0 rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(212, 160, 23, 0.22);
        }
        .adm-auth-brand { display: flex; align-items: center; gap: 14px; margin-bottom: 28px; }
        /* Same mark / monogram flow as public site (partials.site-logo-mark) */
        .adm-auth-logo-wrap {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .adm-auth-logo-wrap .ve-logo-img,
        .adm-auth-logo-wrap .site-logo-mark-img {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            object-fit: contain;
        }
        .adm-auth-logo-wrap .ve-logo-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--gold), #b8860b);
            color: var(--dark);
            font-weight: 900;
            font-size: 17px;
            font-family: 'Nunito', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* Same site name HTML as public .ve-logo-text (partials.logo-site-name) */
        .adm-auth-site-name.ve-logo-text {
            font-family: 'Nunito', sans-serif;
            font-size: 17px;
            font-weight: 600;
            color: #fff;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .adm-auth-site-name.ve-logo-text strong {
            color: var(--gold);
            font-weight: 900;
        }
        .adm-auth-brand-sub { font-size: 11px; color: rgba(255, 255, 255, 0.42); text-transform: uppercase; letter-spacing: 1px; margin-top: 2px; }
        .adm-auth-heading { font-size: 22px; font-weight: 800; color: #fff; margin-bottom: 6px; }
        .adm-auth-lead { font-size: 14px; color: rgba(255, 255, 255, 0.72); margin-bottom: 24px; }
        .adm-auth-field { margin-bottom: 18px; }
        .adm-auth-field label { display: block; font-size: 13px; font-weight: 600; color: rgba(255, 255, 255, 0.88); margin-bottom: 6px; }
        .adm-auth-field input {
            width: 100%;
            padding: 11px 14px;
            border-radius: 9px;
            border: 1.5px solid var(--border);
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .adm-auth-field input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.15);
        }
        .adm-auth-error { display: block; font-size: 12px; color: #fca5a5; margin-top: 6px; }
        .adm-auth-remember { display: flex; align-items: center; gap: 8px; font-size: 13px; color: rgba(255, 255, 255, 0.7); margin-bottom: 22px; cursor: pointer; }
        .adm-auth-submit {
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 9px;
            background: var(--gold);
            color: var(--dark);
            font-size: 14px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(212, 160, 23, 0.35);
        }
        .adm-auth-submit:hover { background: #e5b41f; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(212, 160, 23, 0.45); }
    </style>
</head>
<body class="adm-auth-body">
    @yield('auth_content')
</body>
</html>
