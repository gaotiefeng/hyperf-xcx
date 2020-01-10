#!/usr/bin/env bash

CURRENT_DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
TRAVIS_BUILD_DIR="${TRAVIS_BUILD_DIR:-$(dirname $(dirname $CURRENT_DIR))}"

echo -e "Create MySQL database..."
mysql -u root -e "CREATE DATABASE IF NOT EXISTS note_xcx charset=utf8mb4 collate=utf8mb4_unicode_ci;"
cat "${TRAVIS_BUILD_DIR}/.build/note_xcx.sql" | mysql -u root note_xcx

echo -e "Done\n"

wait