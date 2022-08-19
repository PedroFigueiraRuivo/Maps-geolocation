<?php
  class pfdev_maps_geolocation {
    private $options;
    private $plugin_name;
    private $plugin_basename;
    private $plugin_slug;
    private $plugin_slug_db;
    private $plugin_configurationFields;

    public function __construct($name, $basename, $slug, $slug_db, $configurationFields){
      $this->options                      = get_option($slug_db);
      $this->plugin_name                  = $name;
      $this->plugin_basename              = $basename;
      $this->plugin_slug                  = $slug;
      $this->plugin_slug_db               = $slug_db;
      $this->plugin_configurationFields   = $configurationFields;   

      add_action( 'admin_menu', [ $this, 'pfDev__mg_addPluginMenuPage' ] );
      add_action( 'admin_init', [ $this, 'pfr__mg_pageInit' ] );
      // add_action( 'admin_footer_text', [ $this, 'pfr__wsa__pageFooter' ] );
      add_filter( 'plugin_action_links_' . $this->plugin_basename, [ $this, 'pfDev_add_settings_link' ] );
    }

    public function pfDev__mg_addPluginMenuPage(){
      if ( empty ( $GLOBALS['admin_page_hooks']['pfdev'] ) ){
        add_menu_page(
            __( 'pfDev: Settings' ),
            'pfDev',
            'manage_options',
            'pfdev',
            function() { echo "<h1>Page pfDev</h1>"; }
        );
      }

      add_submenu_page(
          'pfdev',
          $this->plugin_name,
          $this->plugin_name,
          'edit_theme_options',
          $this->plugin_slug,
          [ $this, 'pfDev__mg_pageOptions' ]
      );
    }

    public function pfDev__mg_pageOptions(){
      // print_r ($this->plugin_configurationFields);
      ?>
          <div class="wrap">
              <h1><?php echo $this->plugin_name; ?></h1>
              <form method="post" action="options.php">
                  <?php
                  settings_fields( $this->plugin_slug_db . '_options' );
                  do_settings_sections( $this->plugin_slug . '-admin' );
                  submit_button();
                  ?>
              </form>
          </div>
      <?php
    }

    public function pfr__mg_pageInit(){
      register_setting(
          $this->plugin_slug_db . '_options',
          $this->plugin_slug_db,
          [ $this, 'sanitize' ]
      );

      $arrConfig = $this->plugin_configurationFields;

      for ($II = 0; $II < count($arrConfig); $II++) {
        add_settings_section( 
          'settings_section_id_' . ($II + 1),
          __( $arrConfig[$II]['title_section'], $this->plugin_slug ), 
          null,
          $this->plugin_slug . '-admin'
        );

        for ($JJ = 0; $JJ < count($arrConfig[$II]['fields']); $JJ++) {
          add_settings_field(
            $arrConfig[$II]['fields'][$JJ]['label_under_slug'],
            __( $arrConfig[$II]['fields'][$JJ]['label_text'], $this->plugin_slug),
            [ $this, 'pfDev_callback'],
            $this->plugin_slug . '-admin',
            'settings_section_id_' . ($II + 1),
            [ //args
              'base'          => $arrConfig[$II]['fields'][$JJ]['label_under_slug'],
              'description'   => $arrConfig[$II]['fields'][$JJ]['description_field'],
              'typeField'     => $arrConfig[$II]['fields'][$JJ]['type_field']
            ]
          );
        }
      }
    }

    public function pfDev_callback($args) {
      $value = isset($this->options[$args['base']]) ? (
        esc_attr($this->options[$args['base']])
      ) : ('');

      ?>
        <input 
          type="<?php echo $args['typeField'] ?>" 
          id="<?php echo $args['base']?>" 
          name="<?php echo $this->plugin_slug_db . '[' . $args['base'] . ']' ;?>"  
          value="<?php echo $value; ?>" 
          class="regular-text"
        ><br>
        <p class="description">
          <?php echo __( $args['description'], $this->plugin_slug ); ?>
        </p>
      <?php
    }

    public function sanitize( $input ){
      $new_input = [];

      $arrConfig = $this->plugin_configurationFields;

      for ($II = 0; $II < count($arrConfig); $II++) {
        for ($JJ = 0; $JJ < count($arrConfig[$II]['fields']); $JJ++) {
          if( isset( $arrConfig[$II]['fields'][$JJ]['label_under_slug']) ){
              $valueUnderLabel = $arrConfig[$II]['fields'][$JJ]['label_under_slug'];
              $new_input[ $valueUnderLabel ] = sanitize_text_field( $input[ $valueUnderLabel ] );
          }
        }
      }

      return $new_input;
    }

    public function pfDev_add_settings_link($links){
      $settings_link = '<a href="admin.php?page=' . $this->plugin_slug . '">' . __('Settings', $this->plugin_slug) . '</a>';
      array_unshift($links, $settings_link);
      return $links;
    }
  }
?>