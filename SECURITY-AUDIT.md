# Security Audit (2026-04-18)

## Scope

- Core plugin PHP files
- Public PDF routing and shortcode surfaces
- Installer/update file operations
- Dependency runtime (mPDF stack)

## Fixed In This Update

- Replaced legacy/outdated mPDF runtime with current `mPDF 8.3.1`.
- Removed unsafe shortcode `extract()` pattern in `pdf-custom-display.php`.
- Sanitized shortcode attributes and escaped generated output URLs.
- Sanitized and validated `aid`/`template` request usage in configuration index helpers.
- Hardened compatibility request helpers with `wp_unslash()` handling.
- Improved IP extraction with validation fallback before DB checks.
- Updated installer runtime validation from `mPDF.zip` assumptions to vendor runtime presence.

## Residual Risk Notes

- The plugin intentionally renders user-submitted form content into PDFs/HTML templates.
  - This is expected behavior, but template authors should avoid injecting untrusted raw HTML unless required.
- Runtime still depends on host-level PHP extensions required by mPDF (`mbstring`, `gd`, `zlib` recommended).

## Recommended Operational Controls

- Restrict who can edit PDF templates/configuration.
- Keep WordPress, Formidable, and this plugin updated.
- Use WAF/rate-limiting on public endpoints where possible.
