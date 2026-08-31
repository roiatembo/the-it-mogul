# The IT Mogul — WordPress

A reusable WordPress application development foundation for **The IT Mogul**.

This repository is an engineering skeleton. It is designed to be cloned and
transformed into different websites while keeping a consistent, modern WordPress architecture.

---

## 1. What this project is

A Bedrock-style WordPress project that treats WordPress as an application
development environment rather than a "install and click around in the admin"
project. It provides:

- A reproducible Docker local environment.
- Composer-managed WordPress core and dependencies.
- A minimal Full Site Editing (FSE) theme.
- Infrastructure for custom Gutenberg blocks and block patterns.
- Infrastructure for MU plugins (business/application layer).
- Testing and linting tooling.
- WP-CLI support.
- Clear separation between **code** (this repo) and **content/database**
  (in the WordPress database).

---

## 2. Architecture overview

```
WordPress (Composer-installed into /wp)
   │
   ├── Theme (wp-content/themes/it-mogul)
   │     ├── theme.json (FSE design tokens)
   │     ├── templates/ (FSE templates)
   │     ├── parts/ (header/footer template parts)
   │     ├── patterns/ (block patterns)
   │     └── src/blocks/ (custom Gutenberg blocks)
   │
   └── MU Plugins (wp-content/mu-plugins)
         └── business/application logic
```

- **WordPress core** is installed by Composer and is not committed to Git.
- **Environment config** lives in the git-ignored `.env` file.
- **The theme** handles presentation only.
- **MU plugins** handle business/application logic.
- **Gutenberg** is the editor. No page builders.

---

## 3. Requirements

- [Docker](https://www.docker.com/) (with Docker Compose)
- [Git](https://git-scm.com/)
- A `*.local` hostname resolution (add `127.0.0.1 it-mogul.local` to your
  hosts file)

---

## 4. Installation

Clone the repository, then run the install script:

```bash
git clone <repository-url> it-mogul-wordpress
cd it-mogul-wordpress
./bin/install
```

The install script:

1. Creates `.env` from `.env.example` (if it does not exist).
2. Creates `docker/app/.env` from `docker/app/.env.example`.
3. Creates the Docker network.
4. Builds and starts the Docker containers.
5. Installs Composer dependencies.
6. Installs WordPress.
7. Activates the `it-mogul` theme.

> **Important:** Before running `./bin/install`, add this line to your hosts
> file:
>
> ```
> 127.0.0.1 it-mogul.local
> ```

---

## 5. Starting the local environment

```bash
# Start containers (after initial install)
docker compose up -d

# Stop containers
docker compose stop

# Tear down containers (keeps volumes)
docker compose down
```

---

## 6. Accessing WordPress

- Frontend: `https://it-mogul.local`
- Admin: `https://it-mogul.local/wp-admin`
- Mailpit (test email): `http://localhost:8025`

Default admin user: `admin` / email `admin@example.com`. Set the password:

```bash
bin/docker/wp user update admin --user_pass=your_password_here
```

---

## 7. Running Composer

All Composer commands run inside the `app` container:

```bash
bin/docker/composer install
bin/docker/composer update
bin/docker/composer dump-autoload
```

Composer-installed dependencies are **not committed** to Git.

---

## 8. Running npm / node commands

All npm commands run inside the `nodejs` container:

```bash
# Install dependencies
bin/docker/npm install

# Build assets (one-off)
bin/docker/npm run build

# Watch mode (development)
bin/docker/npm run start

# Lint
bin/docker/npm run lint
```

---

## 9. Running tests

```bash
# PHPUnit
bin/docker/phpunit

# PHPStan (static analysis)
bin/docker/phpstan

# PHPCS (coding standards)
bin/docker/phpcs

# PHPCS auto-fix
bin/docker/phpcbf

# JS unit tests (in the theme)
cd wp-content/themes/it-mogul && bin/docker/npm run test:unit
```

### Testing tools included and why

| Tool                        | Purpose                                                        |
| --------------------------- | -------------------------------------------------------------- |
| **PHPUnit + WP_Mock**       | Unit tests for PHP classes in MU plugins and the theme.        |
| **PHPStan**                 | Static analysis (level 9) to catch type errors before runtime. |
| **PHPCS**                   | WordPress coding standards enforcement.                        |
| **wp-scripts test-unit-js** | Jest-based unit tests for block/JS code.                       |

These tools were chosen because they provide real value for a WordPress
project. Playwright (E2E) is
intentionally **not** included yet — it can be added later when there is a
real site to test.

---

## 10. Running WP-CLI

```bash
bin/docker/wp <command>
```

Examples:

```bash
bin/docker/wp core version
bin/docker/wp plugin list
bin/docker/wp theme list
bin/docker/wp user list
```

---

## 11. Theme development

The theme is at `wp-content/themes/it-mogul`. It is a Full Site Editing theme
driven by `theme.json`.

- **Design tokens** (colors, typography, spacing) live in `theme.json`.
- **Templates** live in `templates/*.html`.
- **Template parts** (header/footer) live in `parts/*.html`.
- **Block patterns** live in `patterns/*.php`.
- **Custom blocks** live in `src/blocks/*`.

Rebuild assets after changing theme JS/SCSS:

```bash
bin/docker/npm run build
```

---

## 12. Gutenberg block development

Custom blocks live in `wp-content/themes/it-mogul/src/blocks/<name>/`.

Each block contains:

- `block.json` — metadata.
- `index.tsx` — registration.
- `edit.tsx` — editor UI.
- `save.tsx` — static save (or `null` for server-side rendering).
- `render.php` — server-side render callback.
- `style.scss` — styles.

See the `callout` block as the reference example. To add a new block, copy
the `callout` structure and rebuild assets.

---

## 13. MU plugin development

MU plugins live in `wp-content/mu-plugins/`. They are for the site's
business/application layer.

Each MU plugin contains:

- `<name>.php` — main plugin file (hooks).
- `includes/` — PSR-4 autoloaded classes.
- `tests/` — PHPUnit tests.
- `assets/` — optional frontend assets.

See the `sample` MU plugin as the reference example. When adding a new MU
plugin, add its namespace to `composer.json` `autoload.psr-4` and run
`bin/docker/composer dump-autoload`.

---

## 14. Git workflow

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

- Work on feature branches.
- Test locally before committing.
- Open pull requests for review.
- Never commit `.env` or secrets.

---

## 15. How AI agents should work with this project

Read [`AGENTS.md`](AGENTS.md) first — it is written specifically for AI
coding agents.

Key points for AI agents:

- Understand the separation between theme (presentation) and MU plugins
  (business logic).
- Follow the existing block and MU plugin structures.
- Do not introduce page builders.
- Run tests (PHPUnit, PHPStan, PHPCS) after changes.
- Never commit secrets or modify `.env`.
- Do not deploy.

---

## 16. What is intentionally NOT included yet

- **The actual website** (copy, services, branding, pages).
- **Deployment** (staging/production workflows, GitHub Actions that deploy).
- **WordPress VIP** configuration.
- **E2E testing** (Playwright) — can be added later.
- **CI/CD** — to be added in a future task.

---

## 17. Future deployment architecture

The intended future deployment flow (to be implemented later):

```
git push
    ↓
GitHub
    ↓
GitHub Actions
    ↓
STAGING
    ↓
human approval
    ↓
PRODUCTION
```

The architecture is prepared for this: code is fully in Git, environment
config is separate (`.env`), and dependencies are Composer/npm-managed. Adding
deployment later will not require restructuring the project.

---

## License

GPL-2.0-or-later
