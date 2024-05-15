# Plugin Basics

## Header Requirements

```php
/*
 * Plugin Name: YOUR PLUGIN NAME
 * Plugin URI: https://linkedin.com/in/mrsbs
 * Description:
 * Version: 1.0
 * Requires at least: 5.7
 * Requires PHP: 8.x
 * Author:
 * Author URI: https://twitter.com/subaasw
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-toc-lite
 * Domain Path: /languages
**/
```

Note the minimum required field is `Plugin Name`.

## Hooks

WordPress hooks are core functionalities that allow us to insert custom code and modify WordPress core behavior without modifying its actual code.<br>
There are two types of hooks: **Actions** and **Filters**.<br>
The simplest example of an action hook is:

```php
add_action( 'init', 'callback_function' )
```

In this case, the init hook runs our code after the WordPress core environment is ready, and the add_action hook accepts a callback function containing our custom code.<br>

To verify the number of functions, variables, classes, constants use

- For Variables: `isset()`
- Functions: `function_exists()`
- Classes: `class_exists()`
- Constants: `defined()`

#### Custom Hook:

Custom hooks are created and invoked similarly to core hooks, using `add_action()` and `do_action()` for actions, and `add_filter()` and `apply_filters()` for filters.

#### To remove a registered hook:

WordPress allows us to use the `remove_action()` function to remove a hook.

```php
// Removing a previously registered custom hook
remove_action( 'hook_name', 'callback_function' );
```

he priority parameter determines the order in which functions hooked to the
sameaction or filter are executed. Lower numbers run first, higher numbers
run later. Default priority is 10.

## Enqueue Scripts and styles

```php
// Enqueue styles
wp_enqueue_style( 'plugin-style', plugin_dir_url( __FILE__ ) . 'css/styles.css', array(), '1.0', 'all' );

// Enqueue scripts
wp_enqueue_script( 'plugin-script', plugin_dir_url( __FILE__ ) . 'js/scripts.js', array( 'jquery' ), '1.0', true );
```

## Plugin security and safety

On any software development or product development security is the
essential needs , we cannot trust neither third party services nor user inputs.<br>
Here are some methods to enhance the security and safety of plugins or themes:
<br >

#### By checking user capability / Permissions

For example, when registering a new custom post type 'news', it's important to verify whether the current user has the capability to edit posts. WordPress provides the current_user_can( 'edit_posts' ) function to check this before proceeding with the registration.
<br>

#### Data Validation and Sanitization

- It's essential to verify that user input is neither empty nor contains
  unexpected data.
- Fordatavalidation, WordPress offers several common functions,
  including `preg_match()`, `is_array()`, `count()`, `is_email()`,
  `is_numeric()`, and `strlen()`.
- As for sanitization, WordPress provides a suite of functions to clean the input, such as `sanitize_text_field()`, `wp_kses()`, `sanitize_email()`, `sanitize_mime_type()`, `sanitize_textarea_field()` etc.
  <br>

#### Use WordPress nonces to prevent CSRF attacks and unauthorized actions.

- A nonce is a “number used once” to help protect URLs and forms from certain types of misuse, malicious or otherwise.
- We can easily create and verify nonces using this functions: `wp_create_nonce`, `wp_verify_nonce`, `wp_nonce_field` etc
  <br>

#### Escaping Output

- The practice of securing data before it's displayed on the screen. This
  meansstripping out any unwanted data that could potentially be harmful or disruptive.
- Functions like `esc_html()`, `esc_textarea()`, `esc_js()` and
  `esc_url()` are used to ensure that the output is safe for rendering in the browser. Additionally, localization functions such as `__()`, which retrieves the translation of a string, and `_e()`, which echoes the translated string, are also important for escaping output and displaying it in the correct language for the user.
