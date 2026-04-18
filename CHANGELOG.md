# Changelog

## 2.0.0 - 2026-04-18

- Upgraded embedded PDF runtime to `mpdf/mpdf v8.3.1`.
- Bundled modern mPDF dependency tree under `vendor/`.
- Migrated renderer to namespaced mPDF 8 API and destination constants.
- Added lightweight local autoloader for bundled dependency sources.
- Updated installer/runtime checks to validate vendor-based mPDF runtime.
- Hardened custom display shortcode processing:
  - Removed unsafe `extract()` usage
  - Sanitized template/attribute parsing
  - Escaped generated URLs
- Hardened configuration index access (`aid` / `template`) and fallback handling.
- Improved request compatibility helpers (`rgpost`/`rgget`) with `wp_unslash()`.
- Improved IP parsing/validation in access checks.
- Deprecated legacy mPDF lite/tiny toggle flags.

## 1.6.0 - 2026-04-18

- Modernized plugin compatibility baseline for current WordPress / Formidable / PHP versions.
- Hardened public PDF route request handling (`fid`, `lid`, `template`, `nonce`).
- Replaced unsafe SQL concatenation with proper prepared query placeholders.
- Fixed notification attachment edge case returning an undefined variable.
- Fixed multi-template configuration index resolution.
- Replaced legacy `Header()` redirect usage with `wp_safe_redirect()`.
- Updated settings AJAX handlers to use `wp_send_json_success()` and `wp_send_json_error()`.
- Improved PDF renderer behavior for inline view output and safer file writes.
- Updated `README.md` and `README.txt` to document the maintained fork.
