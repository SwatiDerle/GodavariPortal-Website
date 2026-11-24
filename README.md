# Godavari Consultants & Services — Website

Completely new corporate website for **Godavari Consultants & Services Pvt. Ltd.** (Nashik), built with Core PHP, HTML5, CSS3, and Vanilla JavaScript.

Business content was sourced from the existing public site [gocspl.com](https://www.gocspl.com/) for accuracy. The UI/UX is original and does not copy the old layout or styling.

## Stack

- Core PHP (includes/layouts, form handling)
- HTML5 + custom CSS3
- Vanilla JavaScript
- Optional MySQL schema in `database/godavari.sql` (not required to run)

## Run locally

From this folder:

```bash
php -S localhost:8080
```

Then open `http://localhost:8080/`.

On Windows XAMPP/WAMP, place the project under `htdocs` and open via Apache.

## Pages

- `index.php` — Home
- `about.php` — About, vision, mission, team
- `services.php` / `service-detail.php` — Services
- `associates.php` — Associates
- `projects.php` / `project-detail.php` — Projects
- `testimonials.php` — Testimonials
- `news.php` / `news-detail.php` — News
- `contact.php` — Contact + enquiry form

Contact submissions are validated server-side and stored in `uploads/contact-messages.jsonl` (mail is attempted when the server supports it).
