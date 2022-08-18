<?php

  $configuration = [
    [ // register section
      'title_section' => 'Configurações padrão do plugin',
      'fields' => [ // Field
        [ // Label / input
          'label_under_slug' => 'label_coords',
          'label_text' => 'Default Coods',
          'type_field' => 'text',
          'description_field' => 'Coordenadas padrão'
        ],
        [ // Label / input
          'label_under_slug' => 'label_zoom',
          'label_text' => 'Default Zoom',
          'type_field' => 'number',
          'description_field' => 'Zoom padrão'
        ],
        [ // Label / input
          'label_under_slug' => 'label_url',
          'label_text' => 'Url KML',
          'type_field' => 'text',
          'description_field' => 'URL do arquivo KML -> Necessário que esteja público para <br/>ser indexado pelo google'
        ],
        [ // Label / input
          'label_under_slug' => 'label_title',
          'label_text' => 'Title',
          'type_field' => 'text',
          'description_field' => 'Título lateral ao mapa'
        ],
        [ // Label / input
          'label_under_slug' => 'label_notification',
          'label_text' => 'Notification',
          'type_field' => 'text',
          'description_field' => 'Aviso caso antes do botão de localização'
        ],
        [ // Label / input
          'label_under_slug' => 'label_text_button',
          'label_text' => 'Text button',
          'type_field' => 'text',
          'description_field' => 'Texto do botão'
        ],
      ]
    ],
    [ // register section
      'title_section' => 'Configuração após interação',
      'fields' => [ // Field
        [ // Label / input
          'label_under_slug' => 'label_zoom_local_user',
          'label_text' => 'Zoom local user',
          'type_field' => 'number',
          'description_field' => 'Zoom após pegar localização do usuário'
        ],
        [ // Label / input
          'label_under_slug' => 'label_zoom_user_message',
          'label_text' => 'Zoom user message',
          'type_field' => 'text',
          'description_field' => 'Mensagem que aparece no campo localizado'
        ],
      ]
    ],
    [ // register section
      'title_section' => 'Personalizado',
      'fields' => [ // Field
        [ // Label / input
          'label_under_slug' => 'label_css',
          'label_text' => 'CSS',
          'type_field' => 'text',
          'description_field' => 'CSS personalizado'
        ],
      ]
    ]
  ];

  if( !defined( 'PFDEV__MG_CONFIGURATION_FIELDS' ) ){
    define( 'PFDEV__MG_CONFIGURATION_FIELDS', $configuration );
  }

?>