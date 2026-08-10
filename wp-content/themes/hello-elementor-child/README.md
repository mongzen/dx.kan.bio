# Hello Elementor Child Theme

Base child theme for [Hello Elementor](https://wordpress.org/themes/hello-elementor/).

## Structure

- `style.css` — WordPress theme header and child-theme stylesheet.
- `functions.php` — child setup and versioned asset loading.
- `assets/css/style.css` — compiled project styles loaded by WordPress.
- `assets/scss/style.scss` — SCSS entry point and source modules.
- `assets/js/main.js` — optional frontend enhancements.
- `theme.json` — editor settings inherited/customized for the site.

## SCSS workflow

Run Sass from the `assets` directory with `sass --watch scss:css --style=compressed`. WordPress loads the compiled `assets/css/style.css`; edit the SCSS source files, not the compiled file.

The parent theme remains untouched, so parent updates can be applied safely.
