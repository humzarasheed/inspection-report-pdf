# Inspection Report PDF - Setup Guide

## Prerequisites

Make sure you have the following installed:

* PHP (latest stable version recommended)
* Composer
* A local server environment (e.g., XAMPP, WAMP, or Laravel Valet)

## Setup Instructions

```bash
git clone git@github.com:humzarasheed/inspection-report-pdf.git
cd inspection-report-pdf/
composer install
cp .env.example .env
php artisan key:generate
```

## Running the Project

You need to run **both** the application server and the queue worker:

```bash
php artisan serve
```

```bash
php artisan queue:listen
```

## Usage

1. Open the URL shown after running `php artisan serve` (usually: http://127.0.0.1:8000)
2. You will see a message: **"Report generation started successfully"**
3. Wait for about **1 minute**
4. The generated PDF will be available at:

```
storage/app/public/reports
```

## Notes

* Make sure both the server and queue worker are running simultaneously.
* If PDFs are not generating, check if the queue worker is active.

---

If you face any issues or need help with setup, feel free to reach out.
