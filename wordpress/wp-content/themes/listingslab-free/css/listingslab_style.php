<php require_once( dirname( __FILE__ ) . '/wp-load.php' ); />
<?php 
    $config = (object) [
        'debug' => false,
        'apikey' => get_option('apikey'),
        'theme_color' => get_option('theme_color'),
        'background_color' => get_option('background_color'),
        'text_color' => get_option('text_color'),
    ];
    if ($config->debug){
        print_r ('<pre>');
        print_r ( '$config =<br />');
        var_dump ($config);
        print_r ('</pre>');
    }
?>
<style>
    body {
        background: <?php echo $config->background_color; ?>;
        color: <?php echo $config->text_color; ?>;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
    }

    .menu-item-type-post_type{
        background: black;
        border-radius: 2px;
        /* border: 1px solid #eee; */
        width: 100%;
        color: #eee;
        margin: 2px;
    }
    .menu-item-type-post_type a{
        color: #eee;
    }
    .menu-item-type-post_type a:hover{
        background: #222;
    }


    .site-header, .site-footer {
        margin: auto;
        max-width: 790px;
    }

    .menu-toggle {
        /* border: 1px solid #eee; */
    }



    textarea:focus, input:focus {
         outline: none;
         outline-style:none;
         box-shadow:none;
         border-color:transparent;
     }
     :focus {
         outline: none;
         outline-style:none;
         box-shadow:none;
         border-color:transparent;
     }
    
    :root {
        --color-primary-base: <?php echo $config->theme_color; ?>;;
        --color-primary-dark: none;
        --color-primary-light: none;
        --color-primary-bg: none;
        --color-secondary-base: none;
        --color-secondary-bg: none;
        --color-secondary-light: none;
        --color-secondary-dark: none;
        --color-accent-base: none;
        --color-accent-light: none;
        --color-shade-black: none;
        --color-shade-gray-10: none;
        --color-shade-gray-6: none;
        --color-shade-gray-4: none;
        --color-shade-gray-3: none;
        --color-shade-gray-2: none;
        --color-shade-gray-1: none;
        --color-shade-white: none;
        --color-feedback-success: none;
        --color-feedback-error: none;
        --color-feedback-warning: none;
        --color-words-base: <?php echo $config->text_color; ?>;
        --color-words-subtle: <?php echo $config->text_color; ?>;
        --color-words-heading: <?php echo $config->text_color; ?>;
        --color-words-primary: <?php echo $config->text_color; ?>;
        --color-words-secondary: <?php echo $config->text_color; ?>;
        --color-words-background: none;
        --color-words-link: <?php echo $config->theme_color; ?>;
        --color-words-hover: <?php echo $config->theme_color; ?>;
        --color-border-base: none;
        --color-border-primary: none;
        --color-border-form: none;
        --color-border-form-focus: none;
        --color-border-form-error: none;
        --color-border-form-bg: none;
        --color-border-form-placeholder: none;
        --color-background-body: <?php echo $config->theme_color; ?>;;
        --color-background-transparent: transparent;
        --color-button-primary-bg: none;
        --color-button-primary-hover: none;
        --color-button-primary-active: none;
        --color-button-primary-label: none;
        --color-button-secondary-bg: none;
        --color-button-secondary-hover: none;
        --color-button-secondary-active: none;
        --color-button-secondary-label: none;
    }
</style>