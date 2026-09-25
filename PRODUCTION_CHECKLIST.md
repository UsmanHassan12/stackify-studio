# Production Readiness Checklist

Use this checklist before go-live. Mark each item as done when completed.

## 1) Environment & Secrets

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Set `APP_URL` to the real domain
- [ ] Generate and set a secure `APP_KEY`
- [ ] Remove all local/test credentials from production `.env`
- [ ] Confirm DB credentials are least-privilege (no root user)
- [ ] Confirm mail credentials are valid for production

## 2) Security Hardening

- [ ] Enforce HTTPS on all environments exposed publicly
- [ ] Add secure headers (HSTS, X-Frame-Options, X-Content-Type-Options, Referrer-Policy)
- [ ] Verify admin routes are protected by auth + proper authorization
- [ ] Review form validations for all public/admin inputs
- [ ] Add/verify rate limiting for contact/newsletter/auth endpoints
- [ ] Ensure strong admin passwords (no seed defaults in production)
- [ ] Remove/disable demo or test accounts

## 3) Database & Migrations

- [ ] Run `php artisan migrate --force` successfully on staging/prod-like DB
- [ ] Verify schema after merged migrations (users/services/projects columns)
- [ ] Run seeders only if intentionally needed in production
- [ ] Confirm DB backup schedule is configured
- [ ] Test restore from backup at least once

## 4) Build, Cache, and Performance

- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Run `php artisan event:cache` (if applicable)
- [ ] Minify/version frontend assets for production delivery
- [ ] Confirm image optimization strategy (sizes/formats/lazy loading)
- [ ] Test homepage carousel behavior on mobile/tablet/desktop

## 5) Queues, Jobs, and Scheduling

- [ ] Configure queue connection for production (if using queues)
- [ ] Start and supervise queue workers (Supervisor/systemd)
- [ ] Configure `php artisan schedule:run` cron entry
- [ ] Verify scheduled tasks run as expected

## 6) Logging, Monitoring, and Alerts

- [ ] Set `LOG_LEVEL` and log channel appropriately
- [ ] Confirm write permissions for `storage/` and `bootstrap/cache/`
- [ ] Integrate error monitoring (Sentry/Bugsnag/etc.)
- [ ] Configure uptime monitoring and alerting
- [ ] Configure notification path for critical failures

## 7) Application QA (Pre-Launch Smoke Test)

- [ ] Homepage loads correctly (services/projects/posts sections)
- [ ] Project listing and project detail pages work
- [ ] Blog listing and post detail pages work
- [ ] Contact form submit and validation behavior verified
- [ ] Newsletter subscribe/unsubscribe flow verified
- [ ] Admin login and dashboard pages verified
- [ ] Admin settings save (including WhatsApp number) verified
- [ ] Social links/contact cards/faqs/services CRUD verified

## 8) Deployment & Rollback

- [ ] Deployment steps documented
- [ ] Rollback plan documented and tested
- [ ] Maintenance mode plan defined (`php artisan down/up`)
- [ ] Post-deploy checks documented

## 9) Final Go-Live Sign-off

- [ ] SSL certificate valid and auto-renew configured
- [ ] DNS records correct
- [ ] Robots/sitemap settings verified
- [ ] Analytics/tracking verified (if used)
- [ ] Stakeholder sign-off completed

---

## Optional Commands (Reference)

```bash
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

