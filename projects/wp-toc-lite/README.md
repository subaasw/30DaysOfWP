# 📚 Lightweight Custom Table of Contents

This is a SEO-friendly and lightweight custom Table of Contents plugin for WordPress. It filters the post content and extracts all the headings from H2 to H6 from that post.

> **Note**: This plugin only works on posts, not on pages.

## 🌟 Features

- **Automatic Heading Detection**: The plugin automatically detects the headings and adds an ID. For example, if the heading is:

    ```html
    <h2> This is the heading 2</h2>
    ```

    The plugin will convert it to:

    ```html
    <h2 id="this-is-the-heading-2"> This is the heading 2</h2>
    ```

    This is done using WordPress's `sanitize_title` function.
<br>
- **Shortcode Support**: The plugin includes the `[wp-seo-toc]` shortcode. If you use this shortcode in a post, it will automatically detect all the headings from that post and render them in a list with hashtag links for easy navigation.
<br>
- **Hide on Specific Posts**: You have the option to hide the Table of Contents on any specific post from the admin side.

## 📝 Future Updates

I will update the documentation based on future requirements, feedback, and suggestions. If you have any, feel free to message me.

Happy learning! 🚀
