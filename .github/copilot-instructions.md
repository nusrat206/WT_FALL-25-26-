# Copilot Instructions for WT_Fall-25-26

## Project Overview
This is a PHP-based web technology learning project with lab assignments organized by exam periods (Mid/ for midterm, Final/ for final). Each period contains Lab1/ subdirectories with individual PHP files demonstrating web concepts.

## Architecture
- **Structure**: Flat file organization with PHP files containing embedded HTML, CSS, and JavaScript
- **No database integration**: All examples are static or use basic form processing
- **No build system**: Files run directly on a local PHP server (e.g., XAMPP)

## Key Patterns
- **File naming**: Use descriptive names like `lab.php`, `lab2.php`, `index.php` for main pages
- **HTML structure**: Standard HTML5 with `<!DOCTYPE html>`, embedded CSS in `<style>` tags
- **PHP integration**: Mix PHP with HTML using `<?php ?>` tags for variables and basic logic
- **Form handling**: Use `$_POST` superglobal, validate with `preg_match` for patterns like `/^[a-zA-Z ]*$/`
- **JavaScript**: Inline scripts for DOM manipulation (e.g., toggle functions) or separate `.js` files
- **Styling**: Inline CSS classes, simple layouts with `<center>`, `<table>` for forms

## Examples
- Basic PHP output: See [Final/Lab1/labf.php](Final/Lab1/labf.php) for variable concatenation
- Form validation: See [Final/Lab1/labf2.php](Final/Lab1/labf2.php) for name validation with regex
- DOM interaction: See [Mid/LabTask2.php](Mid/LabTask2.php) for light/dark mode toggle
- Registration forms: See [Mid/Lab1/index.php](Mid/Lab1/index.php) for clinic patient form with CSS styling

## Development Workflow
- Run on localhost via XAMPP or similar PHP server
- No testing framework; manually verify forms and scripts in browser
- Add new labs in appropriate period/Lab1/ directories
- Follow existing indentation and commenting style (minimal comments)

## Conventions
- Use `echo` for output, concatenate with `.`
- Input sanitization: Use custom `test_input()` function with `trim()`
- Error display: Inline error messages next to form fields
- No external libraries; keep code vanilla PHP/HTML/JS