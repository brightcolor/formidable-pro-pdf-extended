# Formidable Pro PDF Extended

Modernized community fork of the original Formidable Pro PDF Extended plugin.

This plugin allows you to generate, view, download, and attach PDFs for Formidable Forms entries.

## Compatibility

- WordPress: `6.3+`
- Formidable Forms / Formidable Pro: `6.x`
- PHP: `7.4+` (tested with modern PHP 8.x environments)

## What's New in 1.6.0

- Security hardening for public PDF routes (`fid`, `lid`, `template`, `nonce`).
- Safer SQL queries with proper prepared placeholders.
- Fixed notification attachment flow edge case that could return an undefined variable.
- Improved template index resolution for multi-template forms.
- Replaced legacy redirect handling with `wp_safe_redirect()`.
- Improved AJAX handlers to use `wp_send_json_success()` / `wp_send_json_error()`.
- Updated plugin metadata and current support baseline.
- Refreshed WordPress readme/changelog information.

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
