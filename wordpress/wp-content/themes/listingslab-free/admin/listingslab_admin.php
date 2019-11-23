<?php
add_action( 'admin_menu', 'listingslab_admin_menu' );
add_action( 'admin_init', 'register_listingslab_settings' );


function register_listingslab_settings() {
    register_setting( 'listingslab-group', 'apikey' );
    register_setting( 'listingslab-group', 'theme_color' );
    register_setting( 'listingslab-group', 'background_color' );
    register_setting( 'listingslab-group', 'text_color' );
}

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Listingslab Sidebar',
    'before_widget' => '<aside class="listingslab-sidebar">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="listingslab-sidebar-title">',
    'after_title' => '</h4>',
  )
);

function listingslab_admin_menu() {
    // https://developer.wordpress.org/resource/dashicons/#vault
	add_menu_page( 
        'listingslab Settings Top Level Menu', 
        'listingslab', 
        'manage_options',
        'listingslab-settings',
        'listingslab_settings',
        'dashicons-star-filled', 
        6  
    );
}
function listingslab_settings(){
    $title = 'Listingslab';
    $status = 'Good';
    echo '<div class="wrap-admin">';

    echo '<div class="wrap-admin">';
    echo '<a class="button" style="float: right; margin: 16px;" onClick="goBack();" href="#">';
    echo 'Back';
    echo '</a>';
    echo '<h1>'.$title.'</h1>';
    echo '<form method="post" action="options.php">';
    settings_fields( 'listingslab-group' );
    ?>
    <script>
        function goBack (){
            console.log ('listingslab_admin.php');
            window.history.back();
            return false;
        }
    </script>
    <style>
        .colours{
            text-align: left;
            border: 1px solid #ddd;
            margin: auto;
            max-width: 360px;
            padding: 8px;
            border-radius: 4px;
            background: white;
        }
        .footer{
            border: 1px solid #ddd;
            margin: auto;
            max-width: 360px;
            width: 45%;
            padding: 8px;
            border-radius: 4px;
            background: white;
        }
        .submitBtn{
            margin: auto;
            max-width: 360px;
        }
    </style>
   <div class="colours">
    <table>
        <tr valign="top" >
            <th scope="row">
                <div class="indentLeft">
                    <h2>Colours</h2>
                </div>
            </th>
        </tr> 
        <tr valign="top">
            <th scope="row">
                <div class="indentLeft">
                    Theme colour
                </div>
            </th>
            <td>
                <input 
                    type="text" 
                    name="theme_color" 
                    value="<?php echo esc_attr( get_option('theme_color') ); ?>" />
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">
                <div class="indentLeft">
                    Background colour
                </div>
            </th>
            <td>
                <input 
                    type="text" 
                    name="background_color" 
                    value="<?php echo esc_attr( get_option('background_color') ); ?>" />
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">
                <div class="indentLeft">
                    Text colour
                </div>
            </th>
            <td>
                <input 
                    type="text" 
                    name="text_color" 
                    value="<?php echo esc_attr( get_option('text_color') ); ?>" />
                </td>
        </tr>
    </table>
    </div>
    <div class="footer">
    <h2>
        Account Status <span style="color: green;"><?php echo $status; ?></span>
    </h2>
    API key
    <input 
        style="width: 200px;"
        type="text" 
        name="apikey"
        value="<?php echo esc_attr( get_option('apikey') ); ?>" />
        
    <?php
    echo '</div>';
    echo '<div class="submitBtn">';
    submit_button();
    echo '</form>';
    echo '</div>';
    echo '</div>';
}