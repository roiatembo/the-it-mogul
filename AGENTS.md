# AGENTS.md — The IT Mogul WordPress

This file is written for AI coding agents (e.g. Codex) and human developers
working in this repository. Read it before making changes.

---

## 1. Project purpose

This is **The IT Mogul** — a reusable WordPress application development
foundation. It is a Bedrock-style WordPress project intended to be cloned and
transformed into different websites (The IT Mogul's own site, client sites,
etc.) while keeping a consistent engineering architecture.

This is a **WordPress application development environment**, not a
"install WordPress and click around in the admin" project. Prefer:

```
Code → Git → GitHub → Deployment
```

over manually configuring everything in the WordPress admin.

There is a clear separation between **CODE** (this repository) and
**CONTENT / DATABASE** (which lives in the WordPress database and is not
committed to Git).

---

## 2. Architecture

### WordPress

- WordPress core is installed by Composer into `/wp` (via
  `roots/wordpress-core-installer`). It is **not committed** to Git.
- All environment-specific configuration lives in the git-ignored `.env`
  file, loaded by Symfony Dotenv in `wp-config.php`.
- WordPress content and settings live in the database, not in Git.

### Theme

- Located at `wp-content/themes/it-mogul`.
- A minimal **Full Site Editing (FSE)** theme driven by `theme.json`.
- Uses `templates/*.html`, `parts/*.html`, and `patterns/*.php`.
- The theme is intentionally neutral and minimal — it is a foundation, not a
  finished visual design.

### Gutenberg / Blocks

- Custom blocks live in `wp-content/themes/it-mogul/src/blocks/<block-name>/`.
- Each block is a directory containing:
    - `block.json` — block metadata (name, attributes, supports, render).
    - `index.tsx` — registers the block.
    - `edit.tsx` — editor UI.
    - `save.tsx` — static save (or `null` for server-side rendering).
    - `render.php` — server-side render callback (preferred for dynamic blocks).
    - `style.scss` / `editor.scss` — styles.
- Blocks are built with `@wordpress/scripts` (webpack). See the `callout`
  block as the reference example.

### Block patterns

- Located in `wp-content/themes/it-mogul/patterns/`.
- Each file is a PHP file with a header comment (Title, Slug, Categories,
  Keywords) followed by block markup.
- Prefer reusable patterns over bespoke one-off layouts.

### MU plugins

- Located in `wp-content/mu-plugins/`.
- MU plugins are for the site's **application/business layer**, not
  presentation. Business logic belongs here, not in the theme.
- Each MU plugin is a directory with:
    - `<name>.php` — the main plugin file (hooks).
    - `includes/` — PSR-4 autoloaded classes.
    - `tests/` — PHPUnit tests.
    - `assets/` — optional frontend assets.
- See the `sample` MU plugin as the reference example.

### Composer

- `composer.json` manages WordPress core, WP-CLI, and PHP dev tools.
- Composer-installed dependencies are **not committed** to Git.
- Run Composer via `bin/docker/composer`.

### Docker

- `compose.yml` defines services: `database` (MariaDB), `app` (PHP-FPM),
  `nginx`, `mailpit`, and `nodejs`.
- The `app` container contains PHP, Composer, and WP-CLI.
- The `nodejs` container runs npm/npx for building assets.
- All CLI commands run inside containers via `bin/docker/*` wrappers.

### WP-CLI

- WP-CLI is available inside the `app` container.
- Run it via `bin/docker/wp <command>`.
- `wp-cli.yml` sets the WordPress path to `wp/`.

---

## 3. Directory conventions

| Path                                     | Purpose                                          |
| ---------------------------------------- | ------------------------------------------------ |
| `/wp`                                    | WordPress core (Composer-installed, git-ignored) |
| `/wp-content/themes/it-mogul`            | The custom theme                                 |
| `/wp-content/themes/it-mogul/src/blocks` | Custom Gutenberg blocks                          |
| `/wp-content/themes/it-mogul/patterns`   | Block patterns                                   |
| `/wp-content/themes/it-mogul/templates`  | FSE templates                                    |
| `/wp-content/themes/it-mogul/parts`      | FSE template parts                               |
| `/wp-content/mu-plugins`                 | MU plugins (business/application layer)          |
| `/wp-content/plugins`                    | Composer-installed plugins (git-ignored)         |
| `/wp-content/vendor`                     | Composer vendor (git-ignored)                    |
| `/docker`                                | Docker build files and config                    |
| `/bin`                                   | Developer CLI wrapper scripts                    |
| `/tests`                                 | PHP test bootstrap files                         |
| `/coverage`                              | Test coverage output (git-ignored)               |

---

## 4. Development commands

All commands are run from the repository root.

### Start / stop Docker

```bash
# First-time setup (creates .env, builds containers, installs WordPress)
./bin/install

# Start containers
docker compose up -d

# Stop containers
docker compose stop

# Tear down (removes containers, keeps volumes)
docker compose down
```

### Install dependencies

```bash
# Composer (inside app container)
bin/docker/composer install

# npm (inside nodejs container)
bin/docker/npm install
```

### Build assets

```bash
# One-off build
bin/docker/npm run build

# Watch mode (development)
bin/docker/npm run start
```

### Run tests

```bash
# PHPUnit
bin/docker/phpunit

# PHPStan
bin/docker/phpstan

# PHPCS (lint)
bin/docker/phpcs

# PHPCS auto-fix
bin/docker/phpcbf

# JS unit tests (in theme)
cd wp-content/themes/it-mogul && bin/docker/npm run test:unit
```

### WP-CLI

```bash
bin/docker/wp <command>
# e.g.
bin/docker/wp core version
bin/docker/wp user update admin --user_pass=your_password_here
bin/docker/wp plugin list
```

### Access the site

- Frontend: `https://it-mogul.local`
- Admin: `https://it-mogul.local/wp-admin`
- Mailpit (test email): `http://localhost:8025`

---

## 5. Development rules

- **Do not introduce Elementor.**
- **Do not introduce another page builder.**
- Do not put business logic in the theme unless it is presentation-related.
  Business logic belongs in MU plugins.
- Prefer reusable Gutenberg patterns/components over one-off layouts.
- Follow existing project conventions (see the `callout` block and `sample`
  MU plugin as references).
- **Do not commit secrets.** Never commit `.env`, credentials, API keys, or
  certificates.
- **Do not modify `.env`.** Use `.env.local` for local overrides if needed.
- **Do not modify production configuration.**
- **Do not deploy** unless explicitly instructed.
- **Do not perform destructive database operations** (e.g. `wp db drop`,
  `wp db reset`) without explicit approval.
- Run appropriate tests after making changes (PHPUnit, PHPStan, PHPCS).
- Keep changes focused and minimal.

---

## 6. Git rules

Intended workflow:

```
feature branch
      ↓
development
      ↓
test locally
      ↓
commit
      ↓
push
      ↓
pull request
      ↓
main
```

- Work on a feature branch, never directly on `main`.
- Test locally before committing.
- Open a pull request for review before merging to `main`.
- Do not create GitHub Actions that deploy anything yet. Deployment is a
  future task.

---

## 7. Adding a new block (quick reference)

1. Create a directory `wp-content/themes/it-mogul/src/blocks/<name>/`.
2. Add `block.json` (copy the `callout` block as a template).
3. Add `index.tsx`, `edit.tsx`, `save.tsx` (or `null`), and `render.php`.
4. Add `style.scss` for frontend styles.
5. Rebuild assets: `bin/docker/npm run build`.
6. The block is auto-registered by the build process.

## 8. Adding a new MU plugin (quick reference)

1. Create a directory `wp-content/mu-plugins/<name>/`.
2. Add `<name>.php` as the main plugin file.
3. Add classes under `includes/` with the `ItMogul\Mu\Plugins\<Name>\`
   namespace.
4. Add the namespace mapping to `composer.json` `autoload.psr-4`.
5. Add tests under `tests/`.
6. Run `bin/docker/composer dump-autoload` after changing autoload.
