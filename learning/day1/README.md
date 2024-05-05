# Day 1: Setting Up Development Environment 

Welcome to day 1 of our WordPress development journey! Today, we're kicking off by setting up our development environment for PHP and WPCLI (WordPress Command Line Interface), and installing WordPress. 🚀

## Setting Up PHP Environment

### Install PHP

```bash
sudo apt install php
```

### Install PHP MySQL Extension

```bash
sudo apt install php-mysql
```

## Installing MySQL

### Install MySQL Server

```bash
sudo apt install mysql-server
```

### Ensure MySQL Installation

```bash
sudo mysql
```

## Installing WPCLI

### Download WPCLI

First, let's download `wp-cli.phar`. 🌟

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

### Verify WPCLI

Check if WPCLI works:

```bash
php wp-cli.phar --info
```

### Make WPCLI Globally Accessible

Make it globally accessible and access via `wp`:

```bash
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

Confirm that WPCLI is installed successfully:

```bash
wp --info
```

## Installing WordPress

### Download WordPress

Download WordPress:

```bash
wp core download --path=your_path
```

### Navigate to WordPress Directory

Navigate to the downloaded WordPress directory:

```bash
cd your_path
```

### Create MySQL Database

Run MySQL and create a database:

```bash
sudo mysql
```

Now, create a database:

```bash
create database dbname;
```

### Create a New MySQL User with Full Privilege

```bash
CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'p@ssword';
GRANT ALL PRIVILEGES ON dbname.* TO 'newuser'@'localhost';
```

### Generate Configuration File

Generate a configuration file:

```bash
wp config create --dbname=your_db_name_here --dbuser=your_db_user_here --prompt=dbpass
```

### Run WordPress Locally

To run WordPress locally:

```bash
wp server
```

Now, visit http://localhost:8080 in your browser. 🌐

## Next Steps

Now that our development environment is set up and WordPress is installed, we're all set to dive deeper into WordPress development in the coming days. Stay tuned for more! 🎉

