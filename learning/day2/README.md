# Day 2: Setting up VS Code and Composer

## Install Composer

First, install the required packages:

```bash
sudo apt install php-cli unzip
```

Then, download and install Composer:

```bash
cd ~
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
```

Verify the hash:

```bash
HASH=`curl -sS https://composer.github.io/installer.sig`
```

Now, download Composer and install:

```bash
php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
```

Install Composer globally:

```bash
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

## Setup PHPCS

First, install PHP_CodeSniffer globally:

```bash
composer global require squizlabs/php_codesniffer
```

Then, install WordPress Coding Standards (WPCS):

```bash
composer global require "wp-coding-standards/wpcs"
```

Now, add WPCS standard to PHPCS:

```bash
phpcs --config-set installed_paths %APPDATA%\Composer\vendor\wp-coding-standards\wpcs
```

## VS Code Setup

Install the following extensions:
- PHP Debug 🐞
- PHP Intelephense 💡
- PHP 🖥️
- phpcs 🛠️
- php cs fixer 🔧
- Error Lens 🔍
