<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', 'Dashboard') — Stackify Admin</title>
    <link rel="icon" href="{{ \App\Support\SiteBranding::faviconUrl($settings ?? []) }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --dark:    #0d1b2a;
            --dark-2:  #12243a;
            --gold:    #d4a017;
            --gold-lt: rgba(212,160,23,0.12);
            --text:    #4a5568;
            --border:  #e8ecf0;
            --bg:      #f5f7fa;
            --white:   #ffffff;
            --success: #10b981;
            --danger:  #ef4444;
            --info:    #3b82f6;
            --sidebar-w: 260px;
            --topbar-h:  64px;
            --radius:  12px;
            --shadow:  0 4px 20px rgba(13,27,42,0.08);
        }

        body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; display: flex; }

        /* Scrollbar: thin, site thumb colors, transparent track (admin) */
        html {
            scrollbar-width: thin;
            scrollbar-color: #1b3a6b transparent;
        }
        ::-webkit-scrollbar { width: 4px; height: 4px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb {
            background: #1b3a6b;
            border-radius: 100px;
        }
        ::-webkit-scrollbar-thumb:hover { background: #0e9c7f; }
        ::-webkit-scrollbar-corner { background: transparent; }
        /* Hide stepper arrows (Chromium/WebKit; OS may still paint in rare cases) */
        ::-webkit-scrollbar-button {
            -webkit-appearance: none !important;
            appearance: none !important;
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }
        ::-webkit-scrollbar-button:single-button,
        ::-webkit-scrollbar-button:double-button,
        ::-webkit-scrollbar-button:start:decrement,
        ::-webkit-scrollbar-button:end:increment,
        ::-webkit-scrollbar-button:vertical:start:decrement,
        ::-webkit-scrollbar-button:vertical:end:increment,
        ::-webkit-scrollbar-button:horizontal:start:decrement,
        ::-webkit-scrollbar-button:horizontal:end:increment {
            -webkit-appearance: none !important;
            appearance: none !important;
            display: none !important;
            width: 0 !important;
            min-width: 0 !important;
            height: 0 !important;
            min-height: 0 !important;
        }

        /* ═══ SIDEBAR ═══════════════════════════════════════════════════ */
        .adm-sidebar {
            width: var(--sidebar-w);
            background: var(--dark);
            height: 100vh;
            max-height: 100vh;
            position: fixed;
            left: 0; top: 0; bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: width 0.3s ease;
            overflow: hidden;
        }

        .adm-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }
        .adm-brand-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--gold), #b8860b);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 900; font-size: 16px; color: var(--dark);
            flex-shrink: 0;
        }
        .adm-brand-text { line-height: 1.2; }
        .adm-brand-text span { display: block; font-size: 15px; font-weight: 800; color: #fff; }
        .adm-brand-text span strong { color: var(--gold); font-weight: 900; }
        .adm-brand-icon .ve-logo-img,
        .adm-brand-icon .site-logo-mark-img { width: 100%; height: 100%; object-fit: contain; border-radius: 10px; }
        /* span.ve-logo-icon is inline by default; flex + explicit box so monogram centers */
        .adm-brand-icon .ve-logo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            min-height: 0;
            font-size: 15px;
            font-weight: 900;
            line-height: 1;
            border-radius: 10px;
            color: var(--dark);
            font-family: 'Inter', sans-serif;
        }
        .adm-brand-text small { font-size: 11px; color: rgba(255,255,255,0.4); font-weight: 400; text-transform: uppercase; letter-spacing: 1px; }

        .adm-nav {
            padding: 16px 12px;
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
            scrollbar-color: #1b3a6b transparent;
        }
        /* Sidebar nav: explicit WebKit scrollbar (inherits thin thumb; kills steppers on scroll host) */
        .adm-nav::-webkit-scrollbar { width: 4px; }
        .adm-nav::-webkit-scrollbar-track { background: transparent; }
        .adm-nav::-webkit-scrollbar-thumb { background: #1b3a6b; border-radius: 100px; }
        .adm-nav::-webkit-scrollbar-thumb:hover { background: #0e9c7f; }
        .adm-nav::-webkit-scrollbar-button,
        .adm-nav::-webkit-scrollbar-button:single-button,
        .adm-nav::-webkit-scrollbar-button:double-button,
        .adm-nav::-webkit-scrollbar-button:start:decrement,
        .adm-nav::-webkit-scrollbar-button:end:increment,
        .adm-nav::-webkit-scrollbar-button:vertical:start:decrement,
        .adm-nav::-webkit-scrollbar-button:vertical:end:increment {
            -webkit-appearance: none !important;
            appearance: none !important;
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            min-width: 0 !important;
            min-height: 0 !important;
        }
        .adm-nav::-webkit-scrollbar-corner { background: transparent; }
        .adm-nav-label { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: rgba(255,255,255,0.25); padding: 16px 8px 8px; }

        .adm-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 9px;
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }
        .adm-nav a i { width: 18px; text-align: center; font-size: 14px; }
        .adm-nav a:hover { background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.9); }
        .adm-nav a.active { background: var(--gold-lt); color: var(--gold); font-weight: 600; }
        .adm-nav a.active i { color: var(--gold); }

        .adm-sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }
        .adm-sidebar-footer a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 9px;
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            font-size: 13px;
            transition: all 0.2s;
        }
        .adm-sidebar-footer a:hover { color: rgba(255,255,255,0.8); background: rgba(255,255,255,0.05); }
        .adm-sidebar-footer form { margin-top: 10px; }
        .adm-sidebar-logout {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 12px;
            border-radius: 9px;
            border: none;
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.55);
            font-size: 13px;
            font-family: inherit;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .adm-sidebar-logout:hover {
            color: rgba(255,255,255,0.9);
            background: rgba(255,255,255,0.1);
        }

        /* ═══ MAIN AREA ══════════════════════════════════════════════════ */
        /* min-width:0 lets flex child shrink with viewport (avoids stray horizontal scroll) */
        .adm-main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; min-width: 0; }

        /* ═══ TOPBAR ═════════════════════════════════════════════════════ */
        .adm-topbar {
            height: var(--topbar-h);
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 50;
            gap: 12px;
        }
        .adm-topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
            flex: 1;
        }
        .adm-menu-toggle {
            display: none;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            background: var(--white);
            color: var(--dark);
            font-size: 18px;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
        }
        .adm-menu-toggle:hover { border-color: var(--gold); background: var(--bg); }
        .adm-topbar-title { font-size: 17px; font-weight: 700; color: var(--dark); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .adm-topbar-right { display: flex; align-items: center; gap: 16px; flex-shrink: 0; }
        .adm-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), #b8860b);
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 800; color: var(--dark);
            cursor: pointer;
            text-decoration: none;
        }
        a.adm-avatar:hover { filter: brightness(1.05); transform: scale(1.04); }
        .adm-topbar-site-link {
            display: flex; align-items: center; gap: 7px;
            font-size: 13px; font-weight: 500; color: var(--text);
            text-decoration: none;
            padding: 7px 14px;
            border-radius: 8px;
            border: 1px solid var(--border);
            transition: all 0.2s;
        }
        .adm-topbar-site-link:hover { border-color: var(--gold); color: var(--dark); }

        /* ═══ CONTENT ════════════════════════════════════════════════════ */
        .adm-content { padding: 32px; flex: 1; min-width: 0; }

        /* ═══ PAGE INTRO (breadcrumb + title + lead) ═════════════════════ */
        .adm-page-intro { margin-bottom: 28px; }
        .adm-page-intro .adm-breadcrumb { margin-bottom: 10px; }
        .adm-breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 4px 10px;
            font-size: 13px;
            line-height: 1.45;
            color: #94a3b8;
        }
        .adm-breadcrumb a {
            color: #94a3b8;
            text-decoration: none;
            font-weight: 500;
        }
        .adm-breadcrumb a:hover { color: var(--dark); }
        .adm-breadcrumb-sep {
            color: #cbd5e1;
            font-weight: 500;
            font-size: 12px;
            user-select: none;
        }
        .adm-breadcrumb-current { color: var(--dark); font-weight: 600; }
        .adm-page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }
        .adm-page-intro .adm-page-header { margin-bottom: 0; }
        .adm-page-header:not(.adm-page-header--intro) { margin-bottom: 28px; }
        .adm-page-header-text { min-width: 0; flex: 1; }
        .adm-page-header-text h1,
        .adm-page-header > div > h1 {
            font-size: 26px;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -0.02em;
            line-height: 1.2;
        }
        .adm-page-header-text .adm-page-lead,
        .adm-page-header > div > p {
            font-size: 14px;
            color: #64748b;
            margin-top: 8px;
            font-weight: 400;
            line-height: 1.55;
            max-width: 42rem;
        }
        .adm-page-header-text .adm-page-lead strong,
        .adm-page-header > div > p strong { color: var(--dark); font-weight: 600; }
        .adm-page-header-actions {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* ═══ CARDS ══════════════════════════════════════════════════════ */
        .adm-card { background: var(--white); border-radius: var(--radius); border: 1px solid var(--border); box-shadow: var(--shadow); overflow: hidden; }
        .adm-card-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
        .adm-card-header h3 { font-size: 15px; font-weight: 700; color: var(--dark); }
        .adm-card-body { padding: 24px; }

        /* ═══ BUTTONS ════════════════════════════════════════════════════ */
        .adm-btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 9px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; text-decoration: none; transition: all 0.2s; }
        .adm-btn-primary { background: var(--dark); color: #fff; }
        .adm-btn-primary:hover { background: var(--dark-2); color: #fff; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(13,27,42,0.2); }
        .adm-btn-gold { background: var(--gold); color: var(--dark); }
        .adm-btn-gold:hover { background: #b8860b; color: var(--dark); transform: translateY(-1px); }
        .adm-btn-outline { background: transparent; color: var(--text); border: 1px solid var(--border); }
        .adm-btn-outline:hover { border-color: var(--dark); color: var(--dark); }
        .adm-btn-danger { background: #fef2f2; color: var(--danger); border: 1px solid #fecaca; }
        .adm-btn-danger:hover { background: var(--danger); color: #fff; }
        .adm-btn-sm { padding: 7px 14px; font-size: 12px; border-radius: 7px; }

        /* ═══ TABLE ══════════════════════════════════════════════════════ */
        .adm-table { width: 100%; border-collapse: collapse; }
        .adm-table thead tr { background: var(--bg); }
        .adm-table th { padding: 12px 16px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #9ca3af; text-align: left; border-bottom: 1px solid var(--border); }
        .adm-table td { padding: 16px; font-size: 14px; border-bottom: 1px solid var(--border); vertical-align: middle; }
        .adm-table tbody tr:last-child td { border-bottom: none; }
        .adm-table tbody tr:hover td { background: var(--bg); }
        .adm-table .adm-title-cell { font-weight: 600; color: var(--dark); }
        /* Horizontal scroll when table is wider than the card (index pages, dashboard, etc.) */
        .adm-table-scroll {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior-x: contain;
        }
        .adm-table-scroll > .adm-table {
            width: max-content;
            min-width: 100%;
        }
        .adm-badge { display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; background: var(--gold-lt); color: #92630a; }

        /* ═══ STATUS BADGES ══════════════════════════════════════════════ */
        .adm-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .adm-status-active { background: #ecfdf5; color: #059669; border: 1px solid #d1fae5; }
        .adm-status-inactive { background: #f3f4f6; color: #6b7280; border: 1px solid #e5e7eb; }
        .adm-status-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

        /* ═══ TOGGLE SWITCH ══════════════════════════════════════════════ */
        .adm-switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }
        .adm-switch input { opacity: 0; width: 0; height: 0; }
        .adm-slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #e2e8f0;
            transition: .4s;
            border-radius: 24px;
        }
        .adm-slider:before {
            position: absolute;
            content: "";
            height: 18px; width: 18px;
            left: 3px; bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        input:checked + .adm-slider { background-color: var(--success); }
        input:checked + .adm-slider:before { transform: translateX(20px); }

        /* ═══ FORMS ══════════════════════════════════════════════════════ */
        .adm-form-group { margin-bottom: 20px; }
        .adm-label { display: block; font-size: 13px; font-weight: 600; color: var(--dark); margin-bottom: 7px; }
        .adm-label small { font-weight: 400; color: #9ca3af; font-size: 12px; margin-left: 6px; }
        .adm-input, .adm-textarea, .adm-select {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            background: var(--white);
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .adm-input:focus, .adm-textarea:focus, .adm-select:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(212,160,23,0.12); }
        .adm-textarea { resize: vertical; }
        .adm-hint { font-size: 12px; color: #9ca3af; margin-top: 5px; }
        .adm-form-row { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .adm-form-row-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }

        /* ═══ ALERTS ══════════════════════════════════════════════════════ */
        .adm-alert { display: flex; align-items: center; gap: 12px; padding: 14px 18px; border-radius: 10px; margin-bottom: 24px; font-size: 14px; font-weight: 500; }
        .adm-alert-success { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
        .adm-alert-danger  { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

        /* ═══ STAT CARDS ════════════════════════════════════════════════ */
        .adm-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 148px), 1fr));
            gap: 20px;
            margin-bottom: 28px;
        }
        .adm-stat { background: var(--white); border: 1px solid var(--border); border-radius: var(--radius); padding: 22px 24px; display: flex; align-items: center; gap: 18px; min-width: 0; }
        .adm-stat-icon { position: relative; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
        .adm-stat-icon.gold { background: var(--gold-lt); color: var(--gold); }
        .adm-stat-icon.blue { background: rgba(59,130,246,0.1); color: var(--info); }
        .adm-stat-icon.green { background: rgba(16,185,129,0.1); color: var(--success); }
        .adm-stat-icon.purple { background: rgba(139, 92, 246, 0.12); color: #7c3aed; }
        .adm-stat-val { font-size: 28px; font-weight: 800; color: var(--dark); line-height: 1; }
        .adm-stat-label { font-size: 13px; color: var(--text); margin-top: 4px; }

        /* Dashboard two-column row (prevents grid min-content overflow) */
        .adm-dash-cols {
            display: grid;
            grid-template-columns: minmax(0, 2fr) minmax(0, 1fr);
            gap: 24px;
            margin-top: 24px;
        }
        .adm-dash-cols > * { min-width: 0; }

        /* Two-column admin layouts (main + sidebar card) */
        .adm-split {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 360px);
            gap: 24px;
            align-items: start;
        }
        .adm-split-2 {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
            align-items: start;
        }
        .adm-split > *,
        .adm-split-2 > * {
            min-width: 0;
        }
        .adm-split-side {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .adm-danger-outer {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
        }
        .adm-danger-inner { width: 100%; max-width: 360px; }

        /* ═══ DANGER ZONE ════════════════════════════════════════════════ */
        .adm-danger-zone { border: 1.5px dashed #fecaca; border-radius: var(--radius); padding: 20px 24px; margin-top: 24px; }
        .adm-danger-zone h4 { font-size: 14px; font-weight: 700; color: var(--danger); margin-bottom: 6px; }
        .adm-danger-zone p { font-size: 13px; color: #9ca3af; margin-bottom: 16px; }

        /* ═══ IMAGE PREVIEW ══════════════════════════════════════════════ */
        .adm-img-preview { 
            width: 100%; 
            height: 200px; 
            border-radius: var(--radius); 
            border: 2px dashed var(--border); 
            background: var(--bg);
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        .adm-img-preview img { width: 100%; height: 100%; object-fit: cover; }
        .adm-img-preview.contain-fit img { object-fit: contain; padding: 12px; background: #f1f5f9; }
        .adm-img-preview span { font-size: 12px; color: #9ca3af; }
        
        .adm-file-input-wrapper { position: relative; }
        .adm-file-input-wrapper input[type="file"] {
            position: absolute;
            width: 100%; height: 100%;
            opacity: 0; cursor: pointer;
            z-index: 2;
        }
        .adm-file-btn {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            background: var(--white);
            color: var(--text);
            font-size: 14px;
            font-weight: 500;
            display: flex; align-items: center; gap: 10px;
            transition: all 0.2s;
        }
        .adm-file-input-wrapper:hover .adm-file-btn { border-color: var(--gold); background: var(--bg); }
        .adm-checkbox-col { width: 40px; text-align: center; }
    .adm-bulk-bar {
        position: sticky;
        top: 20px;
        z-index: 100;
        background: #fff;
        padding: 12px 20px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        display: none;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        animation: slideDown 0.3s ease;
    }
    @keyframes slideDown { from { transform: translateY(-10px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    .bulk-count { font-weight: 700; color: var(--gold); margin-right: 15px; }

    /* Pagination Styling - Balanced Split Layout */
    .adm-pagination {
        padding: 1.2rem 24px;
        background: #fdfdfd;
        border-top: 1px solid var(--border);
    }
    .adm-pagination nav {
        display: block !important;
        width: 100%;
    }
    
    /* Reveal and style the main desktop flex container using EXACT Bootstrap classes */
    .adm-pagination div.d-sm-flex {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 1rem !important;
        width: 100% !important;
    }
    
    /* Showing summary text - Subtle & Left Aligned */
    .adm-pagination p {
        margin: 0 !important;
        font-size: 11px !important;
        color: #94a3b8 !important;
        font-weight: 600 !important;
        letter-spacing: 0.5px !important;
        text-transform: uppercase !important;
        text-align: left !important;
    }
    
    /* Hide simple mobile versions and redundant button sets */
    .adm-pagination nav > div:first-child,
    .adm-pagination nav > div.flex.justify-between.flex-1 {
        display: none !important;
    }

    .pagination {
        display: flex !important;
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
        gap: 6px !important;
        align-items: center;
        justify-content: flex-end !important;
    }
    .pagination li { list-style: none !important; }
    
    .pagination .page-link,
    .pagination .page-item span {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 38px;
        padding: 0 12px;
        border: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        background-color: #fff;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    
    /* Override standard arrows with text */
    .pagination .page-item:first-child .page-link::before {
        content: "PREVIOUS";
        font-size: 11px;
        font-weight: 700;
    }
    .pagination .page-item:last-child .page-link::before {
        content: "NEXT";
        font-size: 11px;
        font-weight: 700;
    }
    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        font-size: 0; 
        min-width: 90px;
        border-width: 2px;
        border-color: #e2e8f0;
        color: #d4a017;
    }
    
    /* Hover & Active States */
    .pagination .page-item.active span,
    .pagination .page-item.active .page-link {
        background-color: #d4a017 !important;
        border-color: #d4a017 !important;
        color: white !important;
        box-shadow: 0 4px 10px rgba(212, 160, 23, 0.2);
    }
    .pagination .page-link:hover:not(.active) {
        border-color: #d4a017;
        color: #d4a017;
    }

        /* ─── Mobile sidebar drawer + responsive layout ─── */
        .adm-sidebar-backdrop {
            display: none;
        }

        @media (max-width: 991.98px) {
            .adm-sidebar {
                transform: translateX(-100%);
                transition: transform 0.28s ease;
                box-shadow: none;
                z-index: 200;
            }
            body.adm-sidebar-open .adm-sidebar {
                transform: translateX(0);
                box-shadow: 12px 0 48px rgba(0, 0, 0, 0.35);
            }
            .adm-sidebar-backdrop {
                display: block;
                position: fixed;
                inset: 0;
                z-index: 150;
                background: rgba(13, 27, 42, 0.55);
                opacity: 0;
                pointer-events: none;
                transition: opacity 0.28s ease;
            }
            body.adm-sidebar-open .adm-sidebar-backdrop {
                opacity: 1;
                pointer-events: auto;
            }
            body.adm-sidebar-open {
                overflow: hidden;
            }
            .adm-main {
                margin-left: 0;
            }
            .adm-menu-toggle {
                display: inline-flex;
            }
            .adm-content {
                padding: 20px 16px 28px;
            }
            .adm-topbar {
                padding: 0 16px;
            }
            .adm-topbar-site-label {
                display: none;
            }
            .adm-form-row,
            .adm-form-row-3 {
                grid-template-columns: 1fr;
            }
            .adm-dash-cols {
                grid-template-columns: 1fr;
            }
            .adm-split,
            .adm-split-2 {
                grid-template-columns: 1fr;
            }
            .adm-danger-outer {
                justify-content: stretch;
            }
            .adm-danger-inner {
                max-width: none;
            }
            .adm-page-header-text h1,
            .adm-page-header > div > h1 {
                font-size: 20px;
            }
            .adm-card-header {
                flex-wrap: wrap;
                gap: 12px;
            }
            .adm-bulk-bar {
                flex-wrap: wrap;
                gap: 12px;
                justify-content: flex-start;
                padding: 12px 14px;
            }
            .adm-pagination div.d-sm-flex {
                flex-direction: column !important;
                align-items: stretch !important;
            }
            .adm-pagination .pagination {
                flex-wrap: wrap !important;
                justify-content: center !important;
            }
            .pagination .page-item:first-child .page-link,
            .pagination .page-item:last-child .page-link {
                min-width: auto !important;
                padding: 0 10px !important;
            }
        }

        @media (max-width: 575.98px) {
            .adm-stat {
                padding: 18px 16px;
            }
            .adm-stat-val {
                font-size: 24px;
            }
            .adm-topbar-right {
                gap: 8px;
            }
        }
</style>
</head>
<body>

    <!-- ====== SIDEBAR ====== -->
    <aside class="adm-sidebar" id="admSidebar">
        <div class="adm-brand">
            <div class="adm-brand-icon">@include('partials.site-logo-mark')</div>
            <div class="adm-brand-text">
                <span>@include('partials.logo-site-name')</span>
                <small>Admin Panel</small>
            </div>
        </div>

        <nav class="adm-nav">
            <div class="adm-nav-label">Overview</div>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-gauge-high"></i> Dashboard
            </a>
            <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa fa-sliders"></i> Site settings
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                <i class="fa fa-user"></i> My profile
            </a>

            <div class="adm-nav-label" style="margin-top:24px;">Content</div>
            <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <i class="fa fa-layer-group"></i> Projects
            </a>
            <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts*') ? 'active' : '' }}">
                <i class="fa fa-newspaper"></i> Blog Posts
            </a>
            <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <i class="fa fa-briefcase"></i> Services
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="{{ request()->routeIs('admin.faqs*') ? 'active' : '' }}">
                <i class="fa fa-circle-question"></i> FAQs
            </a>
            <a href="{{ route('admin.contact-cards.index') }}" class="{{ request()->routeIs('admin.contact-cards*') ? 'active' : '' }}">
                <i class="fa fa-address-card"></i> Contact cards
            </a>
            <a href="{{ route('admin.social-links.index') }}" class="{{ request()->routeIs('admin.social-links*') ? 'active' : '' }}">
                <i class="fa fa-share-nodes"></i> Social links
            </a>

            <div class="adm-nav-label" style="margin-top:24px;">Audience</div>
            <a href="{{ route('admin.leads.index') }}" class="{{ request()->routeIs('admin.leads*') ? 'active' : '' }}">
                <i class="fa fa-inbox"></i> Contact Leads
                @php $unreadLeads = \App\Models\Lead::where('is_read', false)->count(); @endphp
                @if($unreadLeads > 0)
                    <span style="background:var(--danger); color:#fff; font-size:10px; padding:2px 6px; border-radius:10px; margin-left:auto; font-weight:700;">{{ $unreadLeads }}</span>
                @endif
            </a>
            <a href="{{ route('admin.subscribers.index') }}" class="{{ request()->routeIs('admin.subscribers*') ? 'active' : '' }}">
                <i class="fa fa-envelope"></i> Subscribers
            </a>
        </nav>

        <div class="adm-sidebar-footer">
            <a href="{{ route('pages.home') }}" target="_blank">
                <i class="fa fa-arrow-up-right-from-square"></i> View Website
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="adm-sidebar-logout">
                    <i class="fa fa-right-from-bracket"></i> Log out
                </button>
            </form>
        </div>
    </aside>

    <div class="adm-sidebar-backdrop" id="admSidebarBackdrop" aria-hidden="true"></div>

    <!-- ====== MAIN ====== -->
    <div class="adm-main">
        <!-- Topbar -->
        <header class="adm-topbar">
            <div class="adm-topbar-left">
                <button type="button" class="adm-menu-toggle" id="admMenuToggle" aria-label="Open menu" aria-controls="admSidebar" aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <span class="adm-topbar-title">@yield('page_title', 'Dashboard')</span>
            </div>
            <div class="adm-topbar-right">
                <a href="{{ route('pages.home') }}" target="_blank" class="adm-topbar-site-link">
                    <i class="fa fa-globe"></i> <span class="adm-topbar-site-label">{{ $settings['public_site_label'] ?? 'stackifystudio.com' }}</span>
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="adm-avatar" title="My profile — {{ auth()->user()->email }}">{{ strtoupper(mb_substr((string) auth()->user()->name, 0, 1, 'UTF-8')) }}</a>
            </div>
        </header>

        <!-- Content -->
        <main class="adm-content">
            @yield('admin_content')
        </main>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Global Success Alert
            @if(session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonColor: '#d4a017',
                    timer: 3000,
                    timerProgressBar: true
                });
            @endif

            // Global Error Alert
            @if(session('error'))
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonColor: '#d4a017'
                });
            @endif
        });

        // Global Delete Confirmation Helper
        function confirmDelete(title = 'Are you sure?', text = 'This action cannot be undone!') {
            return Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#9ca3af',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            });
        }

        // Auto-attach to forms with data-confirm
        document.addEventListener('submit', function(e) {
            if (e.target.hasAttribute('data-confirm')) {
                e.preventDefault();
                const form = e.target;
                const message = form.getAttribute('data-confirm') || 'This action cannot be undone!';
                
                confirmDelete('Wait!', message).then((result) => {
                    if (result.isConfirmed) {
                        form.removeAttribute('data-confirm');
                        form.submit();
                    }
                });
            }
        });

        function setupImagePreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            
            if (!input || !preview) return;

            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    }
                    reader.readAsDataURL(file);
                    
                    // Update button text if exists
                    const btnText = this.parentElement.querySelector('.adm-file-btn span');
                    if (btnText) btnText.textContent = file.name;
                }
            });
        }

        function confirmIndividualDelete(url, message = 'Are you sure?') {
            Swal.fire({
                title: 'Confirm Deletion',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'Yes, Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('globalDeleteForm');
                    form.action = url;
                    form.submit();
                }
            });
        }
    </script>
    {{-- Global Hidden Delete Form --}}
    <form id="globalDeleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bulk Selection Logic
            const masterCheckbox = document.getElementById('selectAll');
            const rowCheckboxes = document.querySelectorAll('.row-checkbox');
            const bulkBar = document.getElementById('bulkBar');
            const selectedCountSpan = document.getElementById('selectedCount');

            if (masterCheckbox) {
                masterCheckbox.addEventListener('change', function() {
                    rowCheckboxes.forEach(cb => cb.checked = this.checked);
                    updateBulkBar();
                });

                rowCheckboxes.forEach(cb => {
                    cb.addEventListener('change', updateBulkBar);
                });
            }

            function updateBulkBar() {
                const checked = document.querySelectorAll('.row-checkbox:checked').length;
                if (checked > 0) {
                    bulkBar.style.display = 'flex';
                    selectedCountSpan.textContent = checked;
                } else {
                    bulkBar.style.display = 'none';
                    if (masterCheckbox) masterCheckbox.checked = false;
                }
            }

            // Global Bulk Action Handler
            window.submitBulkAction = function(action) {
                const form = document.getElementById('bulkForm');
                const actionInput = document.getElementById('bulkActionInput');
                
                let confirmMsg = `Are you sure you want to perform this bulk action on ${document.querySelectorAll('.row-checkbox:checked').length} items?`;
                if (action === 'delete') confirmMsg = `WARNING: This will permanently delete ${document.querySelectorAll('.row-checkbox:checked').length} selected items. Proceed?`;

                Swal.fire({
                    title: 'Confirm Action',
                    text: confirmMsg,
                    icon: action === 'delete' ? 'warning' : 'info',
                    showCancelButton: true,
                    confirmButtonColor: action === 'delete' ? '#ef4444' : '#d4a017',
                    confirmButtonText: 'Yes, Proceed'
                }).then((result) => {
                    if (result.isConfirmed) {
                        actionInput.value = action;
                        form.submit();
                    }
                });
            }
        });
    </script>
    <script>
        (function () {
            var key = 'stackfy_adm_nav_scroll';
            var nav = document.querySelector('.adm-nav');
            if (!nav) return;

            function persist() {
                sessionStorage.setItem(key, String(nav.scrollTop));
            }

            var raw = sessionStorage.getItem(key);
            if (raw !== null) {
                var top = parseInt(raw, 10);
                if (!isNaN(top)) {
                    nav.scrollTop = top;
                    requestAnimationFrame(function () {
                        nav.scrollTop = top;
                    });
                }
            }

            var scrollTimer;
            nav.addEventListener('scroll', function () {
                clearTimeout(scrollTimer);
                scrollTimer = setTimeout(persist, 80);
            }, { passive: true });

            window.addEventListener('pagehide', persist);
            window.addEventListener('beforeunload', persist);

            nav.addEventListener('click', function (e) {
                var a = e.target.closest('a[href]');
                if (a && nav.contains(a)) {
                    persist();
                }
            }, true);
        })();
    </script>
    <script>
        (function () {
            var mq = window.matchMedia('(max-width: 991.98px)');
            var body = document.body;
            var backdrop = document.getElementById('admSidebarBackdrop');
            var toggle = document.getElementById('admMenuToggle');
            var sidebar = document.getElementById('admSidebar');

            function closeSidebar() {
                body.classList.remove('adm-sidebar-open');
                if (toggle) toggle.setAttribute('aria-expanded', 'false');
                if (backdrop) backdrop.setAttribute('aria-hidden', 'true');
            }

            function openSidebar() {
                body.classList.add('adm-sidebar-open');
                if (toggle) toggle.setAttribute('aria-expanded', 'true');
                if (backdrop) backdrop.setAttribute('aria-hidden', 'false');
            }

            function isMobileNav() {
                return mq.matches;
            }

            if (toggle) {
                toggle.addEventListener('click', function () {
                    if (body.classList.contains('adm-sidebar-open')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }

            if (backdrop) {
                backdrop.addEventListener('click', closeSidebar);
            }

            if (sidebar) {
                sidebar.querySelectorAll('a[href]').forEach(function (a) {
                    a.addEventListener('click', function () {
                        if (isMobileNav()) closeSidebar();
                    });
                });
            }

            mq.addEventListener('change', function () {
                if (!mq.matches) closeSidebar();
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && body.classList.contains('adm-sidebar-open')) {
                    closeSidebar();
                }
            });
        })();
    </script>
    @stack('admin_scripts')
</body>
</html>
