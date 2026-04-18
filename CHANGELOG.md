# Changelog

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
