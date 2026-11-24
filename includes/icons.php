<?php
/**
 * Inline SVG icons for services (stroke-based, brand-colored via CSS).
 */
function service_icon(string $slug): string
{
    $icons = [
        'cluster-formation' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><circle cx="8" cy="8" r="2.5"/><circle cx="16" cy="8" r="2.5"/><circle cx="12" cy="16" r="2.5"/><path d="M10 9.5 11.2 13.5M14 9.5 12.8 13.5M10.5 8h3"/></svg>',
        'government-subsidies' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M4 10h16M6 10V19M18 10V19M9 19h6M12 4l8 4H4l8-4Z"/><path d="M9 14h.01M12 14h.01M15 14h.01"/></svg>',
        'online-licences' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>',
        'ngo-registrations' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M12 21s-7-4.5-7-10a7 7 0 0 1 14 0c0 5.5-7 10-7 10Z"/><circle cx="12" cy="11" r="2.5"/></svg>',
        'software-web' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M8 21h8M12 18v3M8 9l2 2-2 2M16 9l-2 2 2 2"/></svg>',
        'project-finance' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M4 19V5M4 19h16"/><path d="M8 16V10M12 16V7M16 16v-5"/><circle cx="18" cy="6" r="2"/></svg>',
        'entrepreneurship-development' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M12 19V9"/><path d="M7 14c2-4 4-6 5-6s3 2 5 6"/><path d="M9 19h6"/><circle cx="12" cy="6" r="2"/></svg>',
        'business-setup' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M3 20h18"/><path d="M5 20V9l7-4 7 4v11"/><path d="M9 20v-5h6v5"/></svg>',
        'loan-and-psi' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><rect x="3" y="6" width="18" height="12" rx="2"/><path d="M3 10h18M7 14h3"/></svg>',
    ];

    return $icons[$slug] ?? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><circle cx="12" cy="12" r="8"/><path d="M12 8v4l2.5 2.5"/></svg>';
}
