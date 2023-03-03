<?php

return [
    'field_types' => [
        [
            'type' => 'text',
            'label' => 'Text',
            'icon' => 'document-text',
        ],
        [
            'type' => 'textarea',
            'label' => 'Textarea',
            'icon' => 'document-text',
        ],
        [
            'type' => 'link',
            'label' => 'Link',
            'icon' => 'link',
        ],
        [
            'type' => 'image',
            'label' => 'Image',
            'icon' => 'image',
        ],
        [
            'type' => 'repeater',
            'label' => 'Repeater',
            'icon' => 'repeater',
        ],
        [
            'type' => 'checkbox',
            'label' => 'Checkbox',
            'icon' => 'checkbox',
        ],
    ],
    // remove repeater from repeater child fild types
    'repeater_exclude_fields' => [
        'repeater',
    ],
];
