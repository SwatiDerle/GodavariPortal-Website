-- Optional MySQL schema for Godavari Consultants website
-- The current site stores content in PHP and contact enquiries in uploads/contact-messages.jsonl.
-- Use this schema only if you prefer database-backed enquiry storage.

CREATE DATABASE IF NOT EXISTS godavari_website
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE godavari_website;

CREATE TABLE IF NOT EXISTS contact_enquiries (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(160) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  service VARCHAR(160) DEFAULT NULL,
  message TEXT NOT NULL,
  ip_address VARCHAR(45) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
