<?php

  $configuration = [
    [
      'title_section' => 'Configuração Google',
      'fields' => [
        [ // Field
          'label_under_slug' => 'label_api_key',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'API Key',
          'field' => 'input',
          'type_field' => 'password',
          'description_field' => 'Insira a sua API Key.',
          'style' => '',
          'class' => 'regular-text',
        ]
      ]
    ],
    [ // register section - Default config
      'title_section' => 'Configurações padrão do plugin',
      'fields' => [
        [ // Field
          'label_under_slug' => 'label_coords_lat',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Default Coods lat',
          'field' => 'input',
          'type_field' => 'text',
          'description_field' => 'Coordenada padrão lat. Ex.: -34.397',
          'style' => '',
          'class' => 'regular-text',
        ],
        [ // Field
          'label_under_slug' => 'label_coords_lng',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Default Coods lng',
          'field' => 'input',
          'type_field' => 'text',
          'description_field' => 'Coordenada padrão lng. Ex.: 150.604',
          'style' => '',
          'class' => 'regular-text',
        ],
        [ // Field
          'label_under_slug' => 'label_zoom',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Default Zoom',
          'field' => 'input',
          'type_field' => 'number',
          'description_field' => 'Zoom padrão',
          'style' => '',
          'class' => 'regular-text',
        ],
        [ // Field
          'label_under_slug' => 'label_url',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Url KML',
          'field' => 'input',
          'type_field' => 'text',
          'description_field' => 'URL do arquivo KML -> Necessário que esteja público para <br/>ser indexado pelo google',
          'style' => '',
          'class' => 'regular-text',
        ],
        [ // Field
          'label_under_slug' => 'label_title',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Title',
          'field' => 'input',
          'type_field' => 'text',
          'description_field' => 'Título lateral ao mapa',
          'style' => '',
          'class' => 'regular-text',
        ],
        [ // Field
          'label_under_slug' => 'label_notification',
          'callback' => 'pfDev_callback_textarea',
          'label_text' => 'Notification',
          'field' => 'textarea',
          'type_field' => 'text',
          'description_field' => 'Aviso antes do botão de localização',
          'style' => 'min-width:30px;',
          'class' => 'large-text',
        ],
        [ // Field
          'label_under_slug' => 'label_text_button',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Text button',
          'field' => 'input',
          'type_field' => 'text',
          'description_field' => 'Texto do botão',
          'style' => '',
          'class' => 'regular-text',
        ],
      ]
    ],
    [ // register section - Config after interaction
      'title_section' => 'Configuração após interação',
      'fields' => [ // Field
        [ // Field
          'label_under_slug' => 'label_zoom_local_user',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Zoom local user',
          'field' => 'input',
          'type_field' => 'number',
          'description_field' => 'Zoom após pegar localização do usuário',
          'style' => '',
          'class' => 'regular-text',
        ],
        [ // Field
          'label_under_slug' => 'label_zoom_user_message',
          'callback' => 'pfDev_callback_input',
          'label_text' => 'Zoom user message',
          'field' => 'input',
          'type_field' => 'text',
          'description_field' => 'Mensagem que aparece no campo localizado',
          'style' => '',
          'class' => 'regular-text',
        ],
      ]
    ],
    [ // register section - CSS
      'title_section' => 'Personalizado',
      'fields' => [ // Field
        [ // Field
          'label_under_slug' => 'label_css',
          'callback' => 'pfDev_callback_textarea',
          'label_text' => 'CSS',
          'field' => 'textarea',
          'type_field' => 'text',
          'description_field' => 'CSS personalizado',
          'style' => 'min-height: 300px;',
          'class' => 'large-text',
        ],
      ]
    ]
  ];

  if( !defined( 'PFDEV__MG_CONFIGURATION_FIELDS' ) ){
    define( 'PFDEV__MG_CONFIGURATION_FIELDS', $configuration );
  }

?>