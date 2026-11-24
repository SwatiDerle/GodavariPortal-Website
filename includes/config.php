<?php
/**
 * Godavari Consultants & Services Pvt. Ltd. — Site Configuration
 */

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('SITE_NAME', 'Godavari Consultants & Services Pvt. Ltd.');
define('SITE_SHORT', 'Godavari Consultants');
define('SITE_TAGLINE', 'We serve excellence for a better world');
define('SITE_URL', ''); // Set full URL in production, e.g. https://www.gocspl.com
define('SITE_EMAIL_PRIMARY', 'info@gocspl.com');
define('SITE_EMAIL_SECONDARY', 'Gonskoffice@gmail.com');
define('SITE_PHONE_1', '+91 9273449448');
define('SITE_PHONE_2', '+91 8378989448');
define('SITE_PHONE_3', '+91 253 4038407');
define('SITE_ADDRESS', '7 Rugved – B, Behind Contra Care Eye Hospital, Bhabha Nagar, Mumbai Naka, Nashik – 422011');
define('SITE_CITY', 'Nashik');
define('SITE_STATE', 'Maharashtra');
define('SITE_PIN', '422011');
define('SITE_MAPS_EMBED', 'https://www.google.com/maps?q=Bhabha+Nagar+Mumbai+Naka+Nashik+422011&output=embed');
define('SITE_FACEBOOK', 'https://www.facebook.com/profile.php?id=100089322848722');
define('SITE_INSTAGRAM', 'https://instagram.com/godavariconsultants');
define('SITE_LINKEDIN', 'https://www.linkedin.com/in/godavari-consultants-59b4971b0');
define('SITE_YEAR_START', 2018);

// Base path helper for local / subdirectory hosting
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$basePath = rtrim($scriptName, '/');
if (str_ends_with($basePath, '/includes')) {
    $basePath = dirname($basePath);
}
define('BASE_PATH', $basePath === '/' ? '' : $basePath);

function asset(string $path): string
{
    return BASE_PATH . '/assets/' . ltrim($path, '/');
}

function url(string $path = ''): string
{
    $path = ltrim($path, '/');
    return BASE_PATH . ($path !== '' ? '/' . $path : '/');
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function active_page(string ...$pages): string
{
    $current = basename($_SERVER['PHP_SELF'] ?? 'index.php');
    return in_array($current, $pages, true) ? 'is-active' : '';
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array
{
    if (empty($_SESSION['flash'])) {
        return null;
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

require_once __DIR__ . '/content.php';
require_once __DIR__ . '/icons.php';
