<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . url('contact.php'));
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$service = trim((string) ($_POST['service'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

$errors = [];

if ($name === '' || mb_strlen($name) < 2) {
    $errors[] = 'Please enter your full name.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
$digits = preg_replace('/\D+/', '', $phone) ?? '';
if ($digits === '' || strlen($digits) < 10) {
    $errors[] = 'Please enter a valid phone number.';
}
if ($message === '' || mb_strlen($message) < 10) {
    $errors[] = 'Please enter a message (at least 10 characters).';
}

if ($errors) {
    set_flash('error', implode(' ', $errors));
    header('Location: ' . url('contact.php'));
    exit;
}

$safeName = e($name);
$safeEmail = e($email);
$safePhone = e($phone);
$safeService = e($service !== '' ? $service : 'General enquiry');
$safeMessage = e($message);
$createdAt = date('Y-m-d H:i:s');

$storageDir = __DIR__ . '/uploads';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}

$entry = [
    'created_at' => $createdAt,
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'service' => $service,
    'message' => $message,
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];

file_put_contents(
    $storageDir . '/contact-messages.jsonl',
    json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
    FILE_APPEND | LOCK_EX
);

$subject = 'New enquiry from ' . $name . ' — Godavari website';
$body = "Name: {$safeName}\nEmail: {$safeEmail}\nPhone: {$safePhone}\nService: {$safeService}\n\nMessage:\n{$safeMessage}\n\nSent at: {$createdAt}\n";
$headers = [
    'From: ' . SITE_EMAIL_PRIMARY,
    'Reply-To: ' . $email,
    'Content-Type: text/plain; charset=UTF-8',
];

// Best-effort mail; enquiry is also stored locally for follow-up.
@mail(SITE_EMAIL_PRIMARY, $subject, $body, implode("\r\n", $headers));

set_flash('success', 'Thank you. Your enquiry has been received. Our team will contact you shortly.');
header('Location: ' . url('contact.php'));
exit;
