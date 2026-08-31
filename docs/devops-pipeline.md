# CI/CD pipeline for WordPress on DreamHost

This repository is designed for a safe two-stage deployment flow:

1. Local development
2. Push to GitHub
3. GitHub deploys to staging
4. Team review on staging
5. Manual approval to deploy to production

## Branch model

- `staging`: auto-deploys to the DreamHost staging site
- `main`: production deployment branch, usually protected and requires review

## Required GitHub secrets

Create these repository secrets in GitHub:

- `DH_STAGING_SSH_KEY`: private SSH key for the staging DreamHost deploy user
- `DH_STAGING_HOST`: staging hostname or IP
- `DH_STAGING_USER`: deploy user on staging server
- `DH_STAGING_PATH`: absolute path to the staging site root
- `DH_PROD_SSH_KEY`: private SSH key for the production DreamHost deploy user
- `DH_PROD_HOST`: production hostname or IP
- `DH_PROD_USER`: deploy user on production server
- `DH_PROD_PATH`: absolute path to the production site root

## DreamHost setup recommendations

- Create separate deploy users for staging and production.
- Disable password login and allow only SSH key authentication.
- Do not use a root or admin-level account for deployment.
- Keep a web user and deploy user separate.
- Use GitHub Environment protection rules with required reviewers for production.
- Enable branch protection rules for `main` and `staging`.

## Security rules

- Secrets must live in GitHub Actions, never in the repository.
- Do not commit `wp-config.php`, `.env`, database credentials, or SSH keys.
- Keep server-side config files outside the repo root if possible.
- Exclude WordPress upload and cache directories from repo deployment.
- Use environment approvals for production release.

## Recommended next steps on DreamHost

1. Create a staging deployment user with SSH access only.
2. Create a production deployment user with SSH access only.
3. Add the public keys to the DreamHost server.
4. Add the private keys as GitHub secrets.
5. Push a branch to `staging` to verify the workflow.
6. Protect `main` with required reviewers.
7. Promote to production only after staging validation.

## Common deployment note

For WordPress, keep environment-specific files like `wp-config.php` on the server, not inside the Git repository, because each DreamHost environment may have its own database credentials and site settings.
