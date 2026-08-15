KYSDO website — static HTML/CSS export
=======================================
index.html   Homepage layout
page.html    Standard page template (About / Programme / Contact)  ->  WordPress page.php
single.html  News / activity post template                        ->  WordPress single.php
style.css    Fonts, colour variables, hover states, responsive rules
assets/      Logo (extracted from the 2025-2026 profile PDF) + two photos

Notes
- Section layout is written as inline styles, so any block lifts straight into a
  WordPress theme file, a Gutenberg Custom HTML block, or an Elementor HTML widget.
- Colour variables live in style.css (:root). Change --green / --navy / --red to retheme.
- Striped SVG placeholders mark where real photos should be dropped in.
- Confirm the contact email. The profile PDF cover lists a Naogaon address and
  mousumibd.org, while the body states Kaunia, Rangpur; Kaunia, Rangpur is used here.
