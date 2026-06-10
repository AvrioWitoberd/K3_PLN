<?php
$base_path = isset($base_path) ? $base_path : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual Book - SIM K3 PLN</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_path ?>assets/css/style.css">
    <style>
        /* Modern Interactive Layout Styles */
        body.manual-reader-body {
            background-color: #f0f4f8; 
            background-image: 
                radial-gradient(circle at 0% 0%, rgba(0, 162, 233, 0.15), transparent 40%),
                radial-gradient(circle at 100% 100%, rgba(0, 90, 141, 0.12), transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(0, 162, 233, 0.05), transparent 60%),
                linear-gradient(rgba(226, 232, 240, 0.3) 1px, transparent 1px),
                linear-gradient(90deg, rgba(226, 232, 240, 0.3) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 100% 100%, 40px 40px, 40px 40px;
            background-position: center center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        /* Topbar */
        .reader-topbar {
            height: 72px;
            box-sizing: border-box;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 0 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }
        .reader-brand {
            font-weight: 800;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #005A8D; /* PLN Blue to match portal logo */
            letter-spacing: -0.02em;
        }
        .reader-brand i { color: #00A2E9; font-size: 1.5rem; } /* PLN Cyan */
        
        .reader-actions {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .btn-reader {
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        /* Style for Download (Gradient Primary) */
        .btn-download-primary {
            background: linear-gradient(135deg, #00A2E9 0%, #005A8D 100%);
            color: #FFFFFF !important;
            box-shadow: 0 5px 15px rgba(0, 162, 233, 0.3);
        }
        .btn-download-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 162, 233, 0.5);
            background: linear-gradient(135deg, #005A8D 0%, #00A2E9 100%);
        }

        /* Layout with Sidebar */
        .manual-wrapper {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            gap: 40px;
            position: relative;
        }

        /* Sidebar Nav */
        .manual-sidebar {
            width: 280px;
            flex-shrink: 0;
            position: sticky;
            top: 112px; /* offset: topbar 72px + wrapper padding 40px */
            max-height: calc(100vh - 160px);
            overflow-y: auto;
            align-self: flex-start;
        }
        .sidebar-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            font-weight: 700;
            margin-bottom: 16px;
            padding-left: 12px;
        }
        .nav-list { list-style: none; padding: 0; margin: 0; }
        .nav-item { margin-bottom: 4px; }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            color: #475569;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 12px;
            transition: all 0.2s ease;
        }
        .nav-link i { font-size: 1.2rem; color: #94a3b8; transition: color 0.2s ease; }
        .nav-link:hover { background: #f1f5f9; color: #0f172a; }
        .nav-link:hover i { color: #3b82f6; }
        .nav-link.active {
            background: #eff6ff;
            color: #1d4ed8;
            font-weight: 700;
        }
        .nav-link.active i { color: #2563eb; }

        /* Content Area */
        .manual-content {
            flex: 1;
            min-width: 0;
        }

        /* Hero */
        .manual-hero {
            margin-bottom: 40px;
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
        }
        .manual-eyebrow {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 6px 16px;
            border-radius: 99px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .manual-hero h1 {
            font-size: 2.8rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 16px 0;
            line-height: 1.2;
        }
        .manual-hero p {
            font-size: 1.1rem;
            color: #475569;
            line-height: 1.6;
            margin: 0;
            text-align: justify;
        }

        /* Section Block */
        .section-block {
            background: white;
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
            scroll-margin-top: 100px; /* for smooth scroll offset */
        }
        .section-block p { text-align: justify; }
        .section-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 16px;
        }
        .section-icon {
            width: 48px;
            height: 48px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        .section-header h2 {
            font-size: 1.5rem;
            font-weight: 800;
            margin: 0;
            color: #0f172a;
        }

        /* Menu Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .menu-item {
            display: flex;
            gap: 16px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .menu-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.04);
            border-color: #cbd5e1;
        }
        .menu-icon { font-size: 1.8rem; }
        .menu-name { font-weight: 700; color: #1e3a8a; margin-bottom: 6px; font-size: 1.05rem; }
        .menu-desc { color: #475569; font-size: 0.9rem; line-height: 1.5; text-align: justify; }

        /* Interactive Accordion for Points */
        .accordion-item {
            margin-bottom: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
        }
        .accordion-header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            background: #f8fafc;
            border: none;
            cursor: pointer;
            text-align: left;
            transition: background 0.3s ease;
        }
        .accordion-header:hover { background: #f1f5f9; }
        .accordion-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            color: #1e293b;
            font-size: 1.05rem;
        }
        .accordion-num {
            background: #2563eb;
            color: white;
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 0.85rem;
        }
        .accordion-icon {
            color: #64748b;
            transition: transform 0.3s ease;
        }
        .accordion-item.active .accordion-icon {
            transform: rotate(180deg);
            color: #2563eb;
        }
        .accordion-item.active .accordion-header {
            background: #eff6ff;
            border-bottom: 1px solid #e2e8f0;
        }
        .accordion-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
            background: white;
        }
        .accordion-item.active .accordion-body {
            max-height: 2000px; /* enough to show content */
        }
        .accordion-content {
            padding: 24px;
            color: #334155;
            line-height: 1.6;
            font-size: 0.95rem;
            text-align: justify;
        }
        .accordion-content ul { padding-left: 20px; margin: 10px 0; }
        .accordion-content li { margin-bottom: 6px; }

        /* Stats & Badges */
        .stat-row { display: flex; flex-wrap: wrap; gap: 12px; margin: 16px 0; }
        .stat-chip {
            padding: 8px 16px; border-radius: 12px; font-size: 0.85rem; font-weight: 600; flex: 1; min-width: 200px;
        }
        .stat-chip.target { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .stat-chip.wajib { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .stat-chip.std { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; }
        
        .badge-row { display: flex; flex-wrap: wrap; gap: 10px; margin: 12px 0; }
        .badge-cat { padding: 6px 14px; border-radius: 99px; font-size: 0.8rem; font-weight: 700; border: 1px solid transparent; }
        .badge-cat.larangan { background: #fecaca; color: #7f1d1d; border-color: #fca5a5; }
        .badge-cat.perintah { background: #bfdbfe; color: #1e3a8a; border-color: #93c5fd; }
        .badge-cat.peringatan { background: #fde68a; color: #78350f; border-color: #fcd34d; }
        .badge-cat.aman { background: #bbf7d0; color: #14532d; border-color: #86efac; }
        .badge-cat.informasi { background: #e0f2fe; color: #0c4a6e; border-color: #bae6fd; }
        .badge-cat.berbahaya { background: #fecdd3; color: #881337; border-color: #fda4af; }
        .badge.rendah { background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 99px; font-size: 0.75rem; font-weight: 700;}
        .badge.sedang { background: #fef3c7; color: #92400e; padding: 4px 10px; border-radius: 99px; font-size: 0.75rem; font-weight: 700;}
        .badge.tinggi { background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 99px; font-size: 0.75rem; font-weight: 700;}

        /* Table */
        .manual-table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        .manual-table th, .manual-table td { border: 1px solid #e2e8f0; padding: 12px 16px; text-align: left; }
        .manual-table th { background: #f8fafc; font-weight: 700; color: #1e293b; font-size: 0.9rem; }
        .manual-table td { font-size: 0.9rem; vertical-align: top; }

        /* FAB */
        .fab-guide { display: grid; gap: 16px; }
        .fab-item { display: flex; gap: 16px; padding: 20px; border-radius: 16px; border: 1px solid #e2e8f0; align-items: flex-start; }
        .fab-item.fab-yellow { background: #fffbeb; border-color: #fde68a; }
        .fab-item.fab-blue { background: #eff6ff; border-color: #bfdbfe; }
        .fab-circle { width: 48px; height: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0; }
        .fab-circle.yellow { background: #facc15; }
        .fab-circle.blue { background: #3b82f6; color: white; }
        .fab-title { font-weight: 700; color: #0f172a; margin-bottom: 6px; font-size: 1.05rem; }
        .fab-desc { color: #475569; font-size: 0.9rem; line-height: 1.6; text-align: justify; }

        .warning-banner {
            background: #fffbeb;
            border-left: 6px solid #f59e0b;
            padding: 24px;
            border-radius: 16px;
            display: flex;
            gap: 16px;
            margin-top: 20px;
            border-top: 1px solid #fef3c7;
            border-right: 1px solid #fef3c7;
            border-bottom: 1px solid #fef3c7;
        }
        .warning-icon { font-size: 2rem; color: #f59e0b; }

        /* Responsive */
        @media (max-width: 992px) {
            .manual-wrapper { flex-direction: column; }
            .manual-sidebar { width: 100%; height: auto; position: static; margin-bottom: 20px; }
            .nav-list { display: flex; overflow-x: auto; padding-bottom: 10px; gap: 10px; }
            .nav-item { flex-shrink: 0; margin: 0; }
        }
        @media (max-width: 600px) {
            .manual-hero { padding: 30px 20px; }
            .section-block { padding: 30px 20px; }
            .accordion-header { padding: 16px; }
            .accordion-content { padding: 16px; }
        }

        /* ================= DARK MODE OVERRIDES ================= */
        @media screen {
            body.manual-reader-body.dark-mode,
            body.manual-reader-body.dark-mode p,
            body.manual-reader-body.dark-mode li,
            body.manual-reader-body.dark-mode span:not(.badge-cat):not(.stat-chip):not(.manual-eyebrow):not(.accordion-num):not(.badge) {
                color: #CBD5E1 !important;
            }

            body.manual-reader-body.dark-mode {
                background-color: #0F172A !important;
                background-image: 
                    radial-gradient(circle at 0% 0%, rgba(6, 182, 212, 0.05), transparent 40%),
                    radial-gradient(circle at 100% 100%, rgba(14, 165, 233, 0.05), transparent 40%),
                    radial-gradient(circle at 50% 50%, rgba(6, 182, 212, 0.02), transparent 60%),
                    linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px) !important;
            }
            body.manual-reader-body.dark-mode .reader-topbar {
                background: rgba(30, 41, 59, 0.95) !important;
                border-bottom: 1px solid rgba(255,255,255,0.1) !important;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
            }
            body.manual-reader-body.dark-mode .reader-brand { color: #F1F5F9 !important; }
            
            body.manual-reader-body.dark-mode .sidebar-title { color: #94A3B8 !important; }
            body.manual-reader-body.dark-mode .nav-link { color: #CBD5E1 !important; }
            body.manual-reader-body.dark-mode .nav-link:hover { background: rgba(255,255,255,0.05) !important; color: #F8FAFC !important; }
            body.manual-reader-body.dark-mode .nav-link.active { background: rgba(56, 189, 248, 0.1) !important; color: #38BDF8 !important; }
            
            body.manual-reader-body.dark-mode .manual-hero,
            body.manual-reader-body.dark-mode .section-block,
            body.manual-reader-body.dark-mode .menu-item,
            body.manual-reader-body.dark-mode .accordion-item,
            body.manual-reader-body.dark-mode .accordion-header,
            body.manual-reader-body.dark-mode .accordion-body,
            body.manual-reader-body.dark-mode .warning-banner {
                background-color: #1E293B !important;
                border-color: rgba(255, 255, 255, 0.05) !important;
            }
            
            body.manual-reader-body.dark-mode .manual-hero h1,
            body.manual-reader-body.dark-mode .section-header h2,
            body.manual-reader-body.dark-mode .menu-name,
            body.manual-reader-body.dark-mode .accordion-title,
            body.manual-reader-body.dark-mode .fab-title,
            body.manual-reader-body.dark-mode .manual-table th,
            body.manual-reader-body.dark-mode h3,
            body.manual-reader-body.dark-mode strong,
            body.manual-reader-body.dark-mode b {
                color: #F8FAFC !important;
            }
            
            body.manual-reader-body.dark-mode .manual-hero p,
            body.manual-reader-body.dark-mode .menu-desc,
            body.manual-reader-body.dark-mode .accordion-content,
            body.manual-reader-body.dark-mode .fab-desc,
            body.manual-reader-body.dark-mode .manual-table td {
                color: #CBD5E1 !important;
            }
            
            body.manual-reader-body.dark-mode .menu-item:hover {
                border-color: rgba(255, 255, 255, 0.15) !important;
                background-color: #334155 !important;
            }
            
            body.manual-reader-body.dark-mode .accordion-header { background: #1E293B !important; border-bottom-color: rgba(255, 255, 255, 0.05) !important; }
            body.manual-reader-body.dark-mode .accordion-header:hover { background: #334155 !important; }
            body.manual-reader-body.dark-mode .accordion-item.active .accordion-header { background: rgba(56, 189, 248, 0.1) !important; border-bottom-color: rgba(255, 255, 255, 0.05) !important; }
            
            body.manual-reader-body.dark-mode .manual-eyebrow { background: rgba(56, 189, 248, 0.1) !important; color: #38BDF8 !important; }
            body.manual-reader-body.dark-mode .section-header { border-bottom-color: rgba(255, 255, 255, 0.05) !important; }
            body.manual-reader-body.dark-mode .section-icon { background: rgba(56, 189, 248, 0.1) !important; color: #38BDF8 !important; }
            
            body.manual-reader-body.dark-mode .manual-table th { background: rgba(255, 255, 255, 0.05) !important; }
            body.manual-reader-body.dark-mode .manual-table th, 
            body.manual-reader-body.dark-mode .manual-table td { border-color: rgba(255, 255, 255, 0.05) !important; }
            
            body.manual-reader-body.dark-mode .fab-item.fab-yellow { background: rgba(250, 204, 21, 0.05) !important; border-color: rgba(250, 204, 21, 0.2) !important; }
            body.manual-reader-body.dark-mode .fab-item.fab-blue { background: rgba(59, 130, 246, 0.05) !important; border-color: rgba(59, 130, 246, 0.2) !important; }
            body.manual-reader-body.dark-mode .warning-banner { background: rgba(245, 158, 11, 0.05) !important; border-color: rgba(245, 158, 11, 0.2) !important; border-left-color: #f59e0b !important; }
            
            body.manual-reader-body.dark-mode .stat-chip.target { background: rgba(153, 27, 27, 0.2) !important; color: #fca5a5 !important; border-color: rgba(248, 113, 113, 0.3) !important; }
            body.manual-reader-body.dark-mode .stat-chip.wajib { background: rgba(146, 64, 14, 0.2) !important; color: #fcd34d !important; border-color: rgba(251, 191, 36, 0.3) !important; }
            body.manual-reader-body.dark-mode .stat-chip.std { background: rgba(30, 64, 175, 0.2) !important; color: #93c5fd !important; border-color: rgba(96, 165, 250, 0.3) !important; }

            /* Badges */
            body.manual-reader-body.dark-mode .badge-cat.larangan, body.manual-reader-body.dark-mode .badge.tinggi { color: #F87171 !important; border-color: rgba(248, 113, 113, 0.3) !important; background: rgba(248, 113, 113, 0.15) !important; }
            body.manual-reader-body.dark-mode .badge-cat.perintah { color: #60A5FA !important; border-color: rgba(96, 165, 250, 0.3) !important; background: rgba(96, 165, 250, 0.15) !important; }
            body.manual-reader-body.dark-mode .badge-cat.peringatan, body.manual-reader-body.dark-mode .badge.sedang { color: #FCD34D !important; border-color: rgba(251, 191, 36, 0.3) !important; background: rgba(251, 191, 36, 0.15) !important; }
            body.manual-reader-body.dark-mode .badge-cat.aman, body.manual-reader-body.dark-mode .badge.rendah { color: #34D399 !important; border-color: rgba(52, 211, 153, 0.3) !important; background: rgba(52, 211, 153, 0.15) !important; }
            body.manual-reader-body.dark-mode .badge-cat.informasi { color: #22D3EE !important; border-color: rgba(34, 211, 238, 0.3) !important; background: rgba(34, 211, 238, 0.15) !important; }
            body.manual-reader-body.dark-mode .badge-cat.berbahaya { color: #F87171 !important; border-color: rgba(248, 113, 113, 0.3) !important; background: rgba(248, 113, 113, 0.15) !important; }
        }

        /* ================= PRINT / DOWNLOAD PDF CSS ================= */
        @media print {
            @page { size: A4 portrait; margin: 15mm; }
            body { background: white !important; font-size: 11pt !important; color: #0f172a !important; }
            
            /* Give headers and titles strong visual weight (fixes "tipis" issue in BOTH modes) */
            h1, h2, h3, .menu-name, .fab-title, .accordion-title { font-weight: 700 !important; }
            p, .menu-desc, .accordion-content, td, th { font-weight: 400 !important; }
            
            /* Text Justification */
            p, .menu-desc, .accordion-content, .fab-desc { text-align: justify !important; }
            
            /* Keep borders visible and consistent */
            .manual-hero, .section-block, .accordion-item, .accordion-header, .accordion-body { border-color: #e2e8f0 !important; }
            .section-header { border-bottom: 2px solid #e2e8f0 !important; padding-bottom: 10px !important; margin-bottom: 15px !important; page-break-after: avoid; }
            .manual-table th { background-color: #f1f5f9 !important; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
            .manual-table th, .manual-table td { border-color: #cbd5e1 !important; }
            
            /* Specific overrides for badges and colored boxes that DO need background color */
            .manual-eyebrow, .section-icon, .warning-banner, .badge, .badge-cat, .stat-chip, .accordion-num {
                -webkit-print-color-adjust: exact !important; 
                print-color-adjust: exact !important;
            }
            .manual-eyebrow, .section-icon { background: #eff6ff !important; color: #2563eb !important; }
            .warning-banner { background: #fffbeb !important; border-color: #fde68a !important; border-left-color: #f59e0b !important; }
            
            /* Hide elements not needed in PDF */
            .reader-topbar, .manual-sidebar, .manual-bubble-btn, .team-bubble-btn, .floating-emergency, .floating-manual { display: none !important; }
            
            /* Adjust layout */
            .manual-wrapper { display: block !important; padding: 0 !important; max-width: 100% !important; margin: 0 !important; }
            .manual-content { padding: 0 !important; }
            
            /* Blocks and backgrounds */
            .manual-hero {
                page-break-inside: avoid;
            }
            #section-panduan, #section-fab {
                page-break-before: always;
            }
            .manual-hero, .section-block { 
                box-shadow: none !important; 
                border: none !important; 
                padding: 0 0 20px 0 !important; 
                margin-bottom: 20px !important; 
                border-radius: 0 !important;
            }
            
            /* Grid and Flex fallbacks to prevent cut-offs */
            .menu-grid, .fab-guide { display: block !important; }
            .menu-item, .fab-item { 
                display: block !important; 
                margin-bottom: 15px !important; 
                border: 1px solid #e2e8f0 !important;
                page-break-inside: avoid !important;
                padding: 15px !important;
            }
            .menu-item > div, .fab-item > div { display: block !important; margin-top: 10px !important; }
            
            /* Force accordions to expand in PDF */
            .accordion-item { display: block !important; border: 1px solid #e2e8f0 !important; margin-bottom: 15px !important; page-break-inside: avoid !important; }
            .accordion-header { display: block !important; padding: 10px 15px !important; border-bottom: 1px solid #e2e8f0 !important; background: #f8fafc !important; }
            .accordion-icon { display: none !important; } /* hide the chevron */
            .accordion-body { max-height: none !important; display: block !important; overflow: visible !important; }
            .accordion-content { padding: 15px !important; display: block !important; }
            
            /* Table formatting */
            .manual-table { width: 100% !important; table-layout: fixed !important; word-wrap: break-word !important; }
            .manual-table th, .manual-table td { border: 1px solid #cbd5e1 !important; padding: 8px !important; }
            .manual-table tr { page-break-inside: avoid !important; }
        }
    </style>
</head>
<body class="manual-reader-body">
    <script>
        // Set theme immediately to prevent flash
        function syncTheme() {
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
            }
        }
        syncTheme();
        // Listen for changes from main website
        window.addEventListener('storage', (e) => {
            if (e.key === 'theme') {
                syncTheme();
            }
        });
    </script>

    <!-- TOP BAR -->
    <div class="reader-topbar">
        <div class="reader-brand">
            <i class="ri-book-read-fill"></i> Manual Book K3 PLN
        </div>
        <div class="reader-actions">
            <a href="index.php" class="btn-back-premium">
                <div class="icon-wrapper"><i class="ri-arrow-left-line"></i></div>
                Kembali
            </a>
            <button onclick="window.print()" class="btn-reader btn-download-primary">
                <i class="ri-download-line"></i> Download PDF
            </button>
        </div>
    </div>

    <!-- MAIN WRAPPER -->
    <div class="manual-wrapper">
        
        <!-- SIDEBAR NAVIGATION -->
        <aside class="manual-sidebar">
            <div class="sidebar-title">Daftar Isi</div>
            <ul class="nav-list">
                <li class="nav-item"><a href="#section-pengantar" class="nav-link active"><i class="ri-information-line"></i> 1. Pengantar Sistem</a></li>
                <li class="nav-item"><a href="#section-struktur" class="nav-link"><i class="ri-layout-grid-fill"></i> 2. Struktur Menu</a></li>
                <li class="nav-item"><a href="#section-panduan" class="nav-link"><i class="ri-book-open-line"></i> 3. Panduan Halaman</a></li>
                <li class="nav-item"><a href="#section-fab" class="nav-link"><i class="ri-mouse-line"></i> 4. Action Button</a></li>
            </ul>
        </aside>

        <!-- CONTENT AREA -->
        <div class="manual-content">
            
            <!-- HERO -->
            <div class="manual-hero">
                <span class="manual-eyebrow"><i class="ri-shield-check-fill"></i> DOKUMEN RESMI</span>
                <h1>Manual Book Penggunaan System</h1>
                <p>Panduan lengkap interaktif operasional Portal Keselamatan Kerja PLN (Sistem Informasi Manajemen K3)</p>
            </div>

            <!-- SECTION 1 -->
            <div id="section-pengantar" class="section-block">
                <div class="section-header">
                    <div class="section-icon"><i class="ri-information-line"></i></div>
                    <h2>1. Pengantar Sistem</h2>
                </div>
                <p style="color: #334155; line-height: 1.8; font-size: 1.05rem;">
                    Portal Keselamatan Kerja PLN merupakan platform sistem keselamatan terintegrasi untuk <strong>monitoring, edukasi, mitigasi risiko,</strong> serta pemetaan zonasi bahaya guna mendukung visi <strong>"Zero Accident".</strong> Dokumen ini disusun sebagai panduan operasional resmi untuk seluruh personel dan administrator dalam memanfaatkan seluruh fungsionalitas sistem.
                </p>
            </div>

            <!-- SECTION 2 -->
            <div id="section-struktur" class="section-block">
                <div class="section-header">
                    <div class="section-icon"><i class="ri-layout-grid-fill"></i></div>
                    <h2>2. Struktur Menu &amp; Fitur Navigasi Utama</h2>
                </div>
                <p style="color: #64748b; margin-bottom: 24px;">Portal K3 PLN memiliki 5 menu utama serta fitur tambahan yang dapat diakses melalui bilah navigasi di bagian atas halaman.</p>
                
                <div class="menu-grid">
                    <div class="menu-item">
                        <div class="menu-icon">🏠</div>
                        <div>
                            <div class="menu-name">Beranda</div>
                            <div class="menu-desc">Halaman utama yang menampilkan statistik K3 (0 Kecelakaan Fatal, 100% Kepatuhan APD), dan akses pemutaran video edukasi K3.</div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">📄</div>
                        <div>
                            <div class="menu-name">Profil &amp; Regulasi</div>
                            <div class="menu-desc">Berisi landasan hukum K3 (UU No. 1/1970, UU No. 13/2003, dsb) dan bagan Struktur Organisasi PT PLN.</div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">⚠️</div>
                        <div>
                            <div class="menu-name">Identifikasi Bahaya</div>
                            <div class="menu-desc">Master data profil risiko operasional berdasarkan zona kerja, lengkap dengan skala bahaya dan solusi APD.</div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">🗺️</div>
                        <div>
                            <div class="menu-name">Peta &amp; Rambu</div>
                            <div class="menu-desc">Denah zonasi proteksi gedung operasional, jalur evakuasi, titik Assembly Point, dan katalog 13 Rambu K3 PLN.</div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">🎓</div>
                        <div>
                            <div class="menu-name">Edukasi K3</div>
                            <div class="menu-desc">Artikel, regulasi terkini, dan wawasan K3 untuk mewujudkan visi "Zero Accident". Diperbarui berkala.</div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-icon">🌙</div>
                        <div>
                            <div class="menu-name">Tema (Dark Mode)</div>
                            <div class="menu-desc">Tombol ikon bulan di sudut kanan atas untuk beralih antara mode terang dan mode gelap demi kenyamanan membaca.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 3 (INTERACTIVE ACCORDION) -->
            <div id="section-panduan" class="section-block">
                <div class="section-header">
                    <div class="section-icon"><i class="ri-book-open-line"></i></div>
                    <h2>3. Panduan Penggunaan Halaman</h2>
                </div>
                <p style="color: #64748b; margin-bottom: 24px;">Klik pada setiap poin di bawah ini untuk melihat detail panduan interaktif.</p>

                <!-- Accordion Items -->
                <div class="accordion-container">
                    
                    <!-- 3.1 -->
                    <div class="accordion-item">
                        <button class="accordion-header" onclick="toggleAccordion(this)">
                            <div class="accordion-title">
                                <span class="accordion-num">3.1</span>
                                Halaman Beranda
                            </div>
                            <i class="ri-arrow-down-s-line accordion-icon"></i>
                        </button>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <p>Halaman pertama yang tampil saat membuka portal. Terdapat <strong>ticker berjalan</strong> di bagian atas berisi informasi keselamatan terkini.</p>
                                <div class="stat-row">
                                    <div class="stat-chip target">🎯 0 Kecelakaan Fatal</div>
                                    <div class="stat-chip wajib">🛡️ 100% Kepatuhan APD</div>
                                    <div class="stat-chip std">📌 13+ Rambu K3 PLN</div>
                                </div>
                                <p>Bagian <strong>Edukasi Terintegrasi &amp; Manajemen Risiko K3</strong> menampilkan 3 video multimedia yang dapat diklik untuk diputar:</p>
                                <ul>
                                    <li>Dasar-Dasar Keilmuan K3</li>
                                    <li>Pencegahan &amp; Manajemen Risiko</li>
                                    <li>Penerapan K3 di Lapangan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 3.2 -->
                    <div class="accordion-item">
                        <button class="accordion-header" onclick="toggleAccordion(this)">
                            <div class="accordion-title">
                                <span class="accordion-num">3.2</span>
                                Profil &amp; Regulasi
                            </div>
                            <i class="ri-arrow-down-s-line accordion-icon"></i>
                        </button>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <p><strong>Landasan Hukum K3 Dasar:</strong></p>
                                <ul>
                                    <li>UU No. 1 Tahun 1970 — tentang Keselamatan Kerja Nasional</li>
                                    <li>UU No. 13 Tahun 2003 — landasan regulasi Ketenagakerjaan</li>
                                    <li>PP No. 50 Tahun 2012 — kewajiban Penerapan SMK3</li>
                                    <li>SK Direksi PT PLN (Persero) — turunan Peraturan Menteri ESDM terkait K2</li>
                                </ul>
                                <p style="margin-top: 10px;"><strong>Struktur Organisasi PT PLN:</strong> Bagan hierarki komando mulai dari Direktur Utama hingga unit-unit operasional regional, dengan Divisi K4 sebagai perpanjangan tangan strategis.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 3.3 -->
                    <div class="accordion-item">
                        <button class="accordion-header" onclick="toggleAccordion(this)">
                            <div class="accordion-title">
                                <span class="accordion-num">3.3</span>
                                Identifikasi Bahaya &amp; Pengendalian
                            </div>
                            <i class="ri-arrow-down-s-line accordion-icon"></i>
                        </button>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <p>Menampilkan <strong>Master Data Profil Risiko</strong> — sistem terpadu pemantauan potensi bahaya operasional.</p>
                                <div style="overflow-x: auto;">
                                    <table class="manual-table">
                                        <thead>
                                            <tr>
                                                <th>Zona Lokasi</th>
                                                <th>Pemicu Bahaya</th>
                                                <th>Skala</th>
                                                <th>Solusi Protektif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Gudang Material</td>
                                                <td>Forklift, tumpukan material</td>
                                                <td><span class="badge rendah">RENDAH</span></td>
                                                <td>Jalur pedestrian, sepatu safety</td>
                                            </tr>
                                            <tr>
                                                <td>Ruang Mesin (Turbin)</td>
                                                <td>Mesin berputar, kebisingan</td>
                                                <td><span class="badge sedang">SEDANG</span></td>
                                                <td>Ear Muff, Safety Glasses</td>
                                            </tr>
                                            <tr>
                                                <td>Menara Transmisi</td>
                                                <td>Ketinggian (>1,8 m)</td>
                                                <td><span class="badge tinggi">TINGGI</span></td>
                                                <td>Full body harness, double lanyard</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3.4 -->
                    <div class="accordion-item">
                        <button class="accordion-header" onclick="toggleAccordion(this)">
                            <div class="accordion-title">
                                <span class="accordion-num">3.4</span>
                                Peta &amp; Rambu Keselamatan
                            </div>
                            <i class="ri-arrow-down-s-line accordion-icon"></i>
                        </button>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <p><strong>Denah Zonasi Proteksi:</strong> Visualisasi pemetaan area bahaya secara makro pada gedung operasional PLN, memandu personel ke titik kumpul darurat (Assembly Point).</p>
                                <p style="margin-top: 10px;"><strong>Katalog 13 Rambu K3 PLN:</strong> Berstandar SNI, mencakup kategori:</p>
                                <div class="badge-row">
                                    <span class="badge-cat larangan">LARANGAN</span>
                                    <span class="badge-cat perintah">PERINTAH</span>
                                    <span class="badge-cat peringatan">PERINGATAN</span>
                                    <span class="badge-cat aman">KONDISI AMAN</span>
                                    <span class="badge-cat informasi">INFORMASI</span>
                                    <span class="badge-cat berbahaya">BERBAHAYA</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3.5 -->
                    <div class="accordion-item">
                        <button class="accordion-header" onclick="toggleAccordion(this)">
                            <div class="accordion-title">
                                <span class="accordion-num">3.5</span>
                                Edukasi K3
                            </div>
                            <i class="ri-arrow-down-s-line accordion-icon"></i>
                        </button>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <p>Halaman ini menampilkan <strong>Artikel &amp; Regulasi K3</strong> yang dipublikasikan oleh administrator portal. Tujuannya adalah menyediakan wawasan mendalam, regulasi terkini, dan praktik terbaik K3.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- SECTION 4 -->
            <div id="section-fab" class="section-block">
                <div class="section-header">
                    <div class="section-icon"><i class="ri-mouse-line"></i></div>
                    <h2>4. Floating Action Button (FAB)</h2>
                </div>
                <p style="color: #64748b; margin-bottom: 24px;">Di setiap halaman portal, terdapat tombol mengambang untuk akses cepat.</p>

                <div class="fab-guide">
                    <div class="fab-item fab-yellow">
                        <div class="fab-circle yellow">📘</div>
                        <div>
                            <div class="fab-title">Tombol Kuning — Manual Book</div>
                            <div class="fab-desc">Mengklik tombol ini akan langsung membuka halaman Manual Book ini. Tersedia di semua halaman portal sebagai akses cepat panduan penggunaan sistem.</div>
                        </div>
                    </div>
                    <div class="fab-item fab-blue">
                        <div class="fab-circle blue">👥</div>
                        <div>
                            <div class="fab-title">Tombol Biru — Informasi Tim Penyusun</div>
                            <div class="fab-desc">Menampilkan informasi lengkap tim penyusun Portal K3 PLN. Tombol ini juga tersedia di semua halaman portal.</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- WARNING BANNER STANDALONE -->
            <div class="warning-banner" style="margin-top: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                <i class="ri-error-warning-fill warning-icon"></i>
                <div>
                    <strong style="color: #b45309; font-size: 1.05rem; display: block; margin-bottom: 6px;">Peringatan Keselamatan</strong>
                    <span style="color: #92400e; line-height: 1.5;">Pastikan selalu menggunakan APD lengkap sebelum memasuki area operasional tegangan tinggi. Keselamatan adalah tanggung jawab bersama.</span>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        // --- 1. ACCORDION LOGIC ---
        // Open the first accordion by default
        document.addEventListener('DOMContentLoaded', function() {
            const firstAccordion = document.querySelector('.accordion-item');
            if(firstAccordion) firstAccordion.classList.add('active');
        });

        function toggleAccordion(element) {
            const currentItem = element.parentElement;
            const allItems = document.querySelectorAll('.accordion-item');
            
            // Close all others
            allItems.forEach(item => {
                if (item !== currentItem) {
                    item.classList.remove('active');
                }
            });
            
            // Toggle current
            currentItem.classList.toggle('active');
        }

        // --- 2. SCROLLSPY LOGIC ---
        const sections = document.querySelectorAll('.section-block');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                // Add offset to ensure the section active state triggers correctly
                if (window.pageYOffset >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('active');
                }
            });
        });

    </script>
</body>
</html>