# Formidable Pro PDF Extended

Modernized community fork of the original Formidable Pro PDF Extended plugin.

This plugin allows you to generate, view, download, and attach PDFs for Formidable Forms entries.

## Compatibility

- WordPress: `6.3+`
- Formidable Forms / Formidable Pro: `6.x`
- PHP: `7.4+` (tested with modern PHP 8.x environments)

## What's New in 2.0.0

- Upgraded PDF engine to `mPDF 8.3.1` and modernized runtime loading through bundled `vendor/` dependencies.
- Migrated renderer from legacy `mPDF` class to namespaced `\Mpdf\Mpdf` API.
- Comprehensive security hardening pass on request handling and shortcode rendering.
- Removed unsafe attribute extraction in custom display shortcode parser.
- Improved sanitization and validation around route/config selection helpers.
- Continued hardening from `1.6.0` (SQL, nonce flow, redirects, AJAX response handling).

## Installation

1. Upload and activate the plugin.
2. Open Formidable settings and initialize the plugin files.
3. Configure your PDF template mapping.
4. Test PDF generation from an entry and from notifications.

## Upgrade Notes

- If you are upgrading from very old releases, re-run plugin initialization once after update.
- Review custom templates in your active theme's `FORMIDABLE_PDF_TEMPLATES` folder.

## Changelog

Full release notes are in [`CHANGELOG.md`](./CHANGELOG.md).
