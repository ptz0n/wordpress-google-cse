<?php

/**
 * Admin Init
 *
 * @since 1.0
 *
 */
function gcse_admin_init()
{
    register_setting('gcse_options', 'gcse_options');
}
add_action('admin_init', 'gcse_admin_init');

/**
 * Add Options Page Link to Admin
 *
 * @since 1.0
 *
 * @uses add_options_page
 *
 * @return void
 */
function gcse_options_page_link()
{
    if (function_exists('add_options_page')) {
        add_options_page(
            __('Google CSE'),
            __('Google CSE'),
            'manage_options',
            'google-cse-options',
            'gcse_options_page');
    }
}
add_action('admin_menu', 'gcse_options_page_link');

/**
 * Options page
 *
 * @since 1.0
 *
 * @return output
 */
function gcse_options_page()
{
    $options  = get_option('gcse_options');
    $response = gcse_request();
    $errors   = array(
        'keyInvalid'          => __('Invalid API key.'),
        'invalid'             => __('Invalid Custom Search Engine ID.'),
        'accessNotConfigured' => __('"Custom Search API" service isn\'t enabled in the APIs Console.'));

    if($response && isset($response['error'])) {
        $reason = $response['error']['errors'][0]['reason'];
        $error  = array_key_exists($reason, $errors) ? $errors[$reason] : $reason;
    }
    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h2><?php _e('Google Custom Search Engine Settings'); ?></h2>

        <?php if($error) : ?>
            <div class="error below-h2">
                <p><strong><?php _e('ERROR'); ?></strong>: <?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <div class="narrow">
            <form action="options.php" method="post">
                <?php settings_fields('gcse_options'); ?>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="gcse_options[key]">Google API key</label></th>
                        <td>
                            <input type="text" size="50" id="gcse_options[key]" name="gcse_options[key]" value="<?php echo isset($options['key']) ? $options['key'] : ''; ?>" /><br />
                            <span class="description">Enable the Custom Search API and get your API key at <a href="https://code.google.com/apis/console/" title="Google APIs Console" target="_blank" />Google APIs Console</a>.</span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="gcse_options[id]">Google Custom Search Engine</label></th>
                        <td>
                            <input type="text" size="50" id="gcse_options[id]" name="gcse_options[id]" value="<?php echo isset($options['id']) ? $options['id'] : ''; ?>" />
                            <span class="description">Search engine ID (CX)<br />Visit <a href="http://www.google.com/cse/">Google Custom Search Engine</a> to create or manage your existing search engines.</span>
                        </td>
                    </tr>
                </table>

                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
                </p>
            </form>
        </div>
    </div>
    <?php
}