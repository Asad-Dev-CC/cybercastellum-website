#!/usr/bin/env bash
set -euo pipefail

APP_PATH="${1:-}"
DEST_PATH="${2:-}"

if [[ -z "$APP_PATH" || -z "$DEST_PATH" ]]; then
  echo "Usage: $0 <source-path> <destination-path>"
  exit 1
fi

rsync -az --delete \
  --exclude '.git' \
  --exclude '.github' \
  --exclude '.DS_Store' \
  --exclude '.env' \
  --exclude 'wp-config.php' \
  --exclude 'wp-content/uploads' \
  --exclude 'wp-content/cache' \
  --exclude 'wp-content/litespeed' \
  --exclude 'wp-content/ewww' \
  --exclude 'wp-content/wflogs' \
  --exclude 'wp-content/upgrade*' \
  --exclude 'wp-content/*-old' \
  --exclude '*.log' \
  "$APP_PATH/" "$DEST_PATH/"

find "$DEST_PATH" -type d -exec chmod 755 {} +
find "$DEST_PATH" -type f -exec chmod 644 {} +

chmod 750 "$DEST_PATH"
