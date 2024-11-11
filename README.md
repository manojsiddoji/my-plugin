# My Plugin (Open Source Contribution)

![GPL-2.0 License](https://img.shields.io/badge/license-GPL--2.0-blue.svg)

![Version 1.1](https://img.shields.io/badge/version-1.1-brightgreen)

**Author:** Manoj  

A simple WordPress plugin to add a custom login form using a shortcode. This plugin displays a login form and handles user authentication securely.

## Features

- Displays a login form with fields for username and password.
- Implements nonce verification for enhanced security.
- Provides error messages for incorrect login attempts.
- Uses a shortcode `[simple_login]` to add the login form on any page or post.

## Installation

1. **Download the Plugin:**
   - Clone the repository or download the zip file from GitHub.

2. **Upload to WordPress:**
   - Upload the plugin folder to your `wp-content/plugins` directory.

3. **Activate the Plugin:**
   - Go to your WordPress dashboard, navigate to **Plugins**, find **My Plugin**, and click **Activate**.

4. **Add the Shortcode:**
   - Place `[simple_login]` on any page or post where you want the login form to appear.

## Usage

- Add the `[simple_login]` shortcode to any page or post to display the login form.
- The plugin will check if the user is already logged in and, if so, will display a message indicating that the user is already logged in.
- On form submission, the plugin handles the login process and displays any errors as needed.

## Styling

The plugin includes a `style.css` file for basic styling. You can customize the styling as needed by editing `style.css` in the plugin folder.

## Code Structure

- **`slf_enqueue_styles`**: Enqueues `style.css` for form styling.
- **`slf_login_form`**: Generates the login form HTML and checks if the user is already logged in.
- **`slf_handle_login`**: Handles the form submission, performs authentication, and provides error feedback.
- **`slf_login_shortcode`**: Registers the `[simple_login]` shortcode.

## Security

The plugin uses WordPress's built-in nonce verification to protect the form from CSRF attacks. It also sanitizes and validates user inputs for improved security.

## Requirements

- WordPress 5.0 or later
- PHP 7.2 or later

## Contributing

Feel free to open issues, submit pull requests, or suggest features. Contributions are welcome!

## License

This plugin is licensed under the GPL-2.0-or-later. See the LICENSE file for more details.

---
