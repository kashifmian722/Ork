<?php declare(strict_types=1);

namespace zenit\PlatformStratus\Core;

use Shopware\Core\Content\Category\CategoryDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\ContainsFilter;

class CustomFieldsHelper {
    /**
     * @var $customFieldSetRepository;
     */
    private $customFieldSetRepository;

    public function __construct(EntityRepositoryInterface $customFieldSetRepository){
        $this->customFieldSetRepository = $customFieldSetRepository;
    }

    public function getCustomFields($container, $context): void
    {

        $relationCategory1 = [
            'id' => '54b16250f1eb11eaadc10242ac120002',
            'entityName' =>  $container->get(CategoryDefinition::class)->getEntityName()
        ];

        $relationCategory2 = [
            'id' => '54b1648af1eb11eaadc10242ac120002',
            'entityName' =>  $container->get(CategoryDefinition::class)->getEntityName()
        ];

        $relationProduct1 = [
            'id' => '54b16584f1eb11eaadc10242ac120002',
            'entityName' =>  $container->get(ProductDefinition::class)->getEntityName()
        ];

        $relationProduct2 = [
            'id' => '54b16584f1eb11eaadc10222ac120002',
            'entityName' =>  $container->get(ProductDefinition::class)->getEntityName()
        ];

        $customCategoryHeaderFields = [
            [
                'id' => '54b16656f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_header_position',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 10,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Header overlay',
                        'de-DE' => 'Header überlagernd',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'helpText' => [
                        'en-GB' => 'The header can also be displayed on listings on an adventure world and overlay it. An impressive layout is created especially when overlaying images, sliders and videos.',
                        'de-DE' => 'Der Header kann auf Listings auch auf einer Erlebniswelt dargestellt werden und diese überlagern. Insbesondere beim Überlagern von Bilder, Slidern und Videos entsteht ein eindrucksvolles Layout.',
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => 'absolute',
                            'label' => [
                                'en-GB' => 'Yes',
                                'de-DE' => 'Ja',
                            ]
                        ],
                        [
                            'value' => 'relative',
                            'label' => [
                                'en-GB' => 'No',
                                'de-DE' => 'Nein',
                            ]
                        ],
                    ]
                ],
            ],
            [
                'id' => '54b1671ef1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_header_bg_opacity',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 20,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Header Background Opacity',
                        'de-DE' => 'Header Hintergrund Deckkraft',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => '0',
                            'label' => [
                                'en-GB' => '0%',
                                'de-DE' => '0%',
                            ]
                        ],
                        [
                            'value' => '5',
                            'label' => [
                                'en-GB' => '5%',
                                'de-DE' => '5%',
                            ]
                        ],
                        [
                            'value' => '10',
                            'label' => [
                                'en-GB' => '10%',
                                'de-DE' => '10%',
                            ]
                        ],
                        [
                            'value' => '15',
                            'label' => [
                                'en-GB' => '15%',
                                'de-DE' => '15%',
                            ]
                        ],
                        [
                            'value' => '20',
                            'label' => [
                                'en-GB' => '20%',
                                'de-DE' => '20%',
                            ]
                        ],
                        [
                            'value' => '25',
                            'label' => [
                                'en-GB' => '25%',
                                'de-DE' => '25%',
                            ]
                        ],
                        [
                            'value' => '30',
                            'label' => [
                                'en-GB' => '30%',
                                'de-DE' => '30%',
                            ]
                        ],
                        [
                            'value' => '35',
                            'label' => [
                                'en-GB' => '35%',
                                'de-DE' => '35%',
                            ]
                        ],
                        [
                            'value' => '40',
                            'label' => [
                                'en-GB' => '40%',
                                'de-DE' => '40%',
                            ]
                        ],
                        [
                            'value' => '45',
                            'label' => [
                                'en-GB' => '45%',
                                'de-DE' => '45%',
                            ]
                        ],
                        [
                            'value' => '50',
                            'label' => [
                                'en-GB' => '50%',
                                'de-DE' => '50%',
                            ]
                        ],
                        [
                            'value' => '55',
                            'label' => [
                                'en-GB' => '55%',
                                'de-DE' => '55%',
                            ]
                        ],
                        [
                            'value' => '60',
                            'label' => [
                                'en-GB' => '60%',
                                'de-DE' => '60%',
                            ]
                        ],
                        [
                            'value' => '65',
                            'label' => [
                                'en-GB' => '65%',
                                'de-DE' => '65%',
                            ]
                        ],
                        [
                            'value' => '70',
                            'label' => [
                                'en-GB' => '70%',
                                'de-DE' => '70%',
                            ]
                        ],
                        [
                            'value' => '75',
                            'label' => [
                                'en-GB' => '75%',
                                'de-DE' => '75%',
                            ]
                        ],
                        [
                            'value' => '80',
                            'label' => [
                                'en-GB' => '80%',
                                'de-DE' => '80%',
                            ]
                        ],
                        [
                            'value' => '85',
                            'label' => [
                                'en-GB' => '85%',
                                'de-DE' => '85%',
                            ]
                        ],
                        [
                            'value' => '90',
                            'label' => [
                                'en-GB' => '90%',
                                'de-DE' => '90%',
                            ]
                        ],
                        [
                            'value' => '95',
                            'label' => [
                                'en-GB' => '95%',
                                'de-DE' => '95%',
                            ]
                        ],
                        [
                            'value' => '100',
                            'label' => [
                                'en-GB' => '100%',
                                'de-DE' => '100%',
                            ]
                        ]
                    ]
                ],
            ],
            [
                'id' => '54b167e6f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_nav_main_opacity',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 20,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Main Navigation Background Opacity',
                        'de-DE' => 'Hauptnavigation Hintergrund Deckkraft',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => '0',
                            'label' => [
                                'en-GB' => '0%',
                                'de-DE' => '0%',
                            ]
                        ],
                        [
                            'value' => '5',
                            'label' => [
                                'en-GB' => '5%',
                                'de-DE' => '5%',
                            ]
                        ],
                        [
                            'value' => '10',
                            'label' => [
                                'en-GB' => '10%',
                                'de-DE' => '10%',
                            ]
                        ],
                        [
                            'value' => '15',
                            'label' => [
                                'en-GB' => '15%',
                                'de-DE' => '15%',
                            ]
                        ],
                        [
                            'value' => '20',
                            'label' => [
                                'en-GB' => '20%',
                                'de-DE' => '20%',
                            ]
                        ],
                        [
                            'value' => '25',
                            'label' => [
                                'en-GB' => '25%',
                                'de-DE' => '25%',
                            ]
                        ],
                        [
                            'value' => '30',
                            'label' => [
                                'en-GB' => '30%',
                                'de-DE' => '30%',
                            ]
                        ],
                        [
                            'value' => '35',
                            'label' => [
                                'en-GB' => '35%',
                                'de-DE' => '35%',
                            ]
                        ],
                        [
                            'value' => '40',
                            'label' => [
                                'en-GB' => '40%',
                                'de-DE' => '40%',
                            ]
                        ],
                        [
                            'value' => '45',
                            'label' => [
                                'en-GB' => '45%',
                                'de-DE' => '45%',
                            ]
                        ],
                        [
                            'value' => '50',
                            'label' => [
                                'en-GB' => '50%',
                                'de-DE' => '50%',
                            ]
                        ],
                        [
                            'value' => '55',
                            'label' => [
                                'en-GB' => '55%',
                                'de-DE' => '55%',
                            ]
                        ],
                        [
                            'value' => '60',
                            'label' => [
                                'en-GB' => '60%',
                                'de-DE' => '60%',
                            ]
                        ],
                        [
                            'value' => '65',
                            'label' => [
                                'en-GB' => '65%',
                                'de-DE' => '65%',
                            ]
                        ],
                        [
                            'value' => '70',
                            'label' => [
                                'en-GB' => '70%',
                                'de-DE' => '70%',
                            ]
                        ],
                        [
                            'value' => '75',
                            'label' => [
                                'en-GB' => '75%',
                                'de-DE' => '75%',
                            ]
                        ],
                        [
                            'value' => '80',
                            'label' => [
                                'en-GB' => '80%',
                                'de-DE' => '80%',
                            ]
                        ],
                        [
                            'value' => '85',
                            'label' => [
                                'en-GB' => '85%',
                                'de-DE' => '85%',
                            ]
                        ],
                        [
                            'value' => '90',
                            'label' => [
                                'en-GB' => '90%',
                                'de-DE' => '90%',
                            ]
                        ],
                        [
                            'value' => '95',
                            'label' => [
                                'en-GB' => '95%',
                                'de-DE' => '95%',
                            ]
                        ],
                        [
                            'value' => '100',
                            'label' => [
                                'en-GB' => '100%',
                                'de-DE' => '100%',
                            ]
                        ]
                    ]
                ],
            ],
        ];

        $customCategoryFields = [
            [
                'id' => '54b16a98f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_image',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 10,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Display Category image',
                        'de-DE' => 'Kategoriebild anzeigen',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'helpText' => [
                        'en-GB' => 'If active, the category picture is inserted as a background in the first section of the set experience world. Categories without a category image represent the background image inserted in the shopping experience as a fallback.',
                        'de-DE' => 'Wenn aktiv, wird das Kategoriebild als Hintergrund in der ersten Section der eingestellten Erlebniswelt eingefügt. Kategorien ohne Kategoriebild stellen das in der Erlebniswelt eingefügte Hintergrundbild als Fallback dar.',
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => 'display',
                            'label' => [
                                'en-GB' => 'Yes',
                                'de-DE' => 'Ja',
                            ]
                        ],
                        [
                            'value' => 'hide',
                            'label' => [
                                'en-GB' => 'No',
                                'de-DE' => 'Nein',
                            ]
                        ],
                    ]
                ],
            ],
            [
                'id' => '54b16b6af1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_image_contrast',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 20,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Text contrast',
                        'de-DE' => 'Text Kontrast',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'helpText' => [
                        'en-GB' => 'Specifies the contrast color of the texts in the foreground. For dark backgrounds, use light text for optimal contrast.',
                        'de-DE' => 'Legt die Kontrastfarbe der Texte im Vordergrund fest. Bei dunklen Hintergründen verwende heller Text für einen optimalen Kontrast.',
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => 'light-text',
                            'label' => [
                                'en-GB' => 'Light text',
                                'de-DE' => 'Heller Text',
                            ]
                        ],
                        [
                            'value' => 'dark-text',
                            'label' => [
                                'en-GB' => 'Dark Text',
                                'de-DE' => 'Dunkler Text',
                            ]
                        ]
                    ]
                ],
            ],
            [
                'id' => '54b16c32f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_image_color',
                'type' => 'colorpicker',
                'config' => [
                    'customFieldPosition' => 30,
                    'label' => [
                        'en-GB' => 'Background colour',
                        'de-DE' => 'Hintergrundfarbe',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'helpText' => [
                        'en-GB' => 'Overwrites the background color set in the shopping experience for the first section with the category image.',
                        'de-DE' => 'Überschreibt die in der Erlebniswelt gesetzte Hintergrundfarbe für die erste Section mit dem Kategoriebild.',
                    ]
                ]
            ],
            [
                'id' => '54b16cf0f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_image_opacity',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 40,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Opacity',
                        'de-DE' => 'Sichtbarkeit',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'helpText' => [
                        'en-GB' => 'Opacity of the category image above tha background color. With this option, the background image can be subdued and the text above it can be made more legible.',
                        'de-DE' => 'Sichtbarkeit des Hintergrundbildes über der Hintergrundfarbe. Mit dieser Option kann das Hintergrundbild gedämpft werden und darüberliegender Text lesbarer gestaltet werden.',
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => '0',
                            'label' => [
                                'en-GB' => '0%',
                                'de-DE' => '0%',
                            ]
                        ],
                        [
                            'value' => '5',
                            'label' => [
                                'en-GB' => '5%',
                                'de-DE' => '5%',
                            ]
                        ],
                        [
                            'value' => '10',
                            'label' => [
                                'en-GB' => '10%',
                                'de-DE' => '10%',
                            ]
                        ],
                        [
                            'value' => '15',
                            'label' => [
                                'en-GB' => '15%',
                                'de-DE' => '15%',
                            ]
                        ],
                        [
                            'value' => '20',
                            'label' => [
                                'en-GB' => '20%',
                                'de-DE' => '20%',
                            ]
                        ],
                        [
                            'value' => '25',
                            'label' => [
                                'en-GB' => '25%',
                                'de-DE' => '25%',
                            ]
                        ],
                        [
                            'value' => '30',
                            'label' => [
                                'en-GB' => '30%',
                                'de-DE' => '30%',
                            ]
                        ],
                        [
                            'value' => '35',
                            'label' => [
                                'en-GB' => '35%',
                                'de-DE' => '35%',
                            ]
                        ],
                        [
                            'value' => '40',
                            'label' => [
                                'en-GB' => '40%',
                                'de-DE' => '40%',
                            ]
                        ],
                        [
                            'value' => '45',
                            'label' => [
                                'en-GB' => '45%',
                                'de-DE' => '45%',
                            ]
                        ],
                        [
                            'value' => '50',
                            'label' => [
                                'en-GB' => '50%',
                                'de-DE' => '50%',
                            ]
                        ],
                        [
                            'value' => '55',
                            'label' => [
                                'en-GB' => '55%',
                                'de-DE' => '55%',
                            ]
                        ],
                        [
                            'value' => '60',
                            'label' => [
                                'en-GB' => '60%',
                                'de-DE' => '60%',
                            ]
                        ],
                        [
                            'value' => '65',
                            'label' => [
                                'en-GB' => '65%',
                                'de-DE' => '65%',
                            ]
                        ],
                        [
                            'value' => '70',
                            'label' => [
                                'en-GB' => '70%',
                                'de-DE' => '70%',
                            ]
                        ],
                        [
                            'value' => '75',
                            'label' => [
                                'en-GB' => '75%',
                                'de-DE' => '75%',
                            ]
                        ],
                        [
                            'value' => '80',
                            'label' => [
                                'en-GB' => '80%',
                                'de-DE' => '80%',
                            ]
                        ],
                        [
                            'value' => '85',
                            'label' => [
                                'en-GB' => '85%',
                                'de-DE' => '85%',
                            ]
                        ],
                        [
                            'value' => '90',
                            'label' => [
                                'en-GB' => '90%',
                                'de-DE' => '90%',
                            ]
                        ],
                        [
                            'value' => '95',
                            'label' => [
                                'en-GB' => '95%',
                                'de-DE' => '95%',
                            ]
                        ],
                        [
                            'value' => '100',
                            'label' => [
                                'en-GB' => '100%',
                                'de-DE' => '100%',
                            ]
                        ]
                    ]
                ]
            ],
            [
                'id' => '54b16daef1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_image_attachment',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 50,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Attachment',
                        'de-DE' => 'Fixieren',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'helpText' => [
                        'en-GB' => 'Determines whether a background image moves with the scroll or keeps its fixed location on the page.',
                        'de-DE' => 'Bestimmt, ob ein Hintergrundbild beim Scrollen mitwandert oder seinen festen Ort auf der Seite behält.',
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => 'scroll',
                            'label' => [
                                'en-GB' => 'Scroll',
                                'de-DE' => 'Mitscrollend',
                            ]
                        ],
                        [
                            'value' => 'fixed',
                            'label' => [
                                'en-GB' => 'Fixed',
                                'de-DE' => 'Fixiert',
                            ]
                        ]
                    ]
                ],
            ],
            [
                'id' => '54b16e6cf1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_image_position',
                'type' => 'CustomFieldTypes::SELECT',
                'config' => [
                    'customFieldPosition' => 60,
                    'componentName' => 'sw-single-select',
                    'label' => [
                        'en-GB' => 'Position',
                        'de-DE' => 'Position',
                    ],
                    'placeholder' => [
                        'en-GB' => 'Inherit',
                        'de-DE' => 'Vererbt'
                    ],
                    'helpText' => [
                        'en-GB' => 'Sets the position of en background image.',
                        'de-DE' => 'Legt Position eines Hintergrundbildes fest.',
                    ],
                    'options' => [
                        [
                            'value' => 'inherit',
                            'label' => [
                                'en-GB' => 'Inherit',
                                'de-DE' => 'Vererbt',
                            ]
                        ],
                        [
                            'value' => 'left top',
                            'label' => [
                                'en-GB' => 'left top',
                                'de-DE' => 'left top',
                            ]
                        ],
                        [
                            'value' => 'left center',
                            'label' => [
                                'en-GB' => 'left center',
                                'de-DE' => 'left center',
                            ]
                        ],
                        [
                            'value' => 'left bottom',
                            'label' => [
                                'en-GB' => 'left bottom',
                                'de-DE' => 'left bottom',
                            ]
                        ],
                        [
                            'value' => 'center top',
                            'label' => [
                                'en-GB' => 'center top',
                                'de-DE' => 'center top',
                            ]
                        ],
                        [
                            'value' => 'center center',
                            'label' => [
                                'en-GB' => 'center center',
                                'de-DE' => 'center center',
                            ]
                        ],
                        [
                            'value' => 'center bottom',
                            'label' => [
                                'en-GB' => 'center bottom',
                                'de-DE' => 'center bottom',
                            ]
                        ],
                        [
                            'value' => 'right top',
                            'label' => [
                                'en-GB' => 'right top',
                                'de-DE' => 'right top',
                            ]
                        ],
                        [
                            'value' => 'right center',
                            'label' => [
                                'en-GB' => 'right center',
                                'de-DE' => 'right center',
                            ]
                        ],
                        [
                            'value' => 'right bottom',
                            'label' => [
                                'en-GB' => 'right bottom',
                                'de-DE' => 'right bottom',
                            ]
                        ],
                    ]
                ],
            ],
        ];

        $customProductFields = [
            [
                'id' => '54b16f20f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_youtube_ids',
                'type' => 'CustomFieldTypes::TEXT',
                'config' => [
                    'customFieldPosition' => 10,
                    'label' => [
                        'en-GB' => 'Youtube IDs',
                        'de-DE' => 'Youtube IDs',
                    ],
                    'placeholder' => [
                        'en-GB' => 'KCRgZXXmJG4,oQAFy229bEU',
                        'de-DE' => 'KCRgZXXmJG4,oQAFy229bEU',
                    ],
                    'helpText' => [
                        'en-GB' => 'Multiple IDs can be entered separated by commas. You will find the YouTube ID in the 11-digit number at the end of the YouTube link in the address line (?v= XXXXXXXXXX))',
                        'de-DE' => 'Mehrer IDs können Komma-Separiert eingetragen werden. Du findest die Youtube ID in der 11-stelligen Nummer am Ende des Youtube-Links in der Adresszeile (?v=  XXXXXXXXXX))',
                    ]
                ]
            ],
            [
                'id' => '54b1722cf1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_custom_tab1_title',
                'type' => 'CustomFieldTypes::TEXT',
                'config' => [
                    'customFieldPosition' => 20,
                    'label' => [
                        'en-GB' => 'Tab 1 Title',
                        'de-DE' => 'Tab 1 Titel',
                    ]
                ]
            ],
            [
                'id' => '54b172fef1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_custom_tab1_text',
                'type' => 'CustomFieldTypes::HTML',
                'config' => [
                    'customFieldPosition' => 25,
                    'componentName' => 'sw-text-editor',
                    'label' => [
                        'en-GB' => 'Tab 1 Text',
                        'de-DE' => 'Tab 1 Text',
                    ]
                ]
            ],
            [
                'id' => '54b173bcf1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_custom_tab2_title',
                'type' => 'CustomFieldTypes::TEXT',
                'config' => [
                    'customFieldPosition' => 30,
                    'label' => [
                        'en-GB' => 'Tab 2 Title',
                        'de-DE' => 'Tab 2 Titel',
                    ]
                ]
            ],
            [
                'id' => '54b1747af1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_custom_tab2_text',
                'type' => 'CustomFieldTypes::HTML',
                'config' => [
                    'customFieldPosition' => 35,
                    'componentName' => 'sw-text-editor',
                    'label' => [
                        'en-GB' => 'Tab 2 Text',
                        'de-DE' => 'Tab 2 Text',
                    ]
                ]
            ]
        ];

        $customProductDatasheets = [
            [
                'id' => '54b1747af1eb11eaadc11242ac120002',
                'name' => 'zenit_stratus_datasheet_one',
                'type' => 'CustomFieldTypes::TEXT',
                'config' => [
                    'customFieldPosition' => 10,
                    'componentName' => 'sw-media-field',
                    'customFieldType' => "media",
                    'label' => [
                        'en-GB' => 'Datasheet 1',
                        'de-DE' => 'Datenblatt 1',
                    ],
                    'helpText' => [
                        'en-GB' => 'Displays a file in the datasheets tab. Useful file formats PDF, TXT, JPG, PNG or GIF.',
                        'de-DE' => 'Stellt eine Datei im Tab für Datenblätter dar. Sinnvolle Dateiformate PDF, TXT, JPG, PNG oder GIF.',
                    ]
                ]
            ],
            [
                'id' => '54b1747af1eb11eaadc12242ac120002',
                'name' => 'zenit_stratus_datasheet_two',
                'type' => 'CustomFieldTypes::TEXT',
                'config' => [
                    'customFieldPosition' => 15,
                    'componentName' => 'sw-media-field',
                    'customFieldType' => "media",
                    'label' => [
                        'en-GB' => 'Datasheet 2',
                        'de-DE' => 'Datenblatt 2',
                    ],
                    'helpText' => [
                        'en-GB' => 'Displays a file in the datasheets tab. Useful file formats PDF, TXT, JPG, PNG or GIF.',
                        'de-DE' => 'Stellt eine Datei im Tab für Datenblätter dar. Sinnvolle Dateiformate PDF, TXT, JPG, PNG oder GIF.',
                    ]
                ]
            ],
            [
                'id' => '54b1747af1eb11eaadc13242ac120002',
                'name' => 'zenit_stratus_datasheet_three',
                'type' => 'CustomFieldTypes::TEXT',
                'config' => [
                    'customFieldPosition' => 20,
                    'componentName' => 'sw-media-field',
                    'customFieldType' => "media",
                    'label' => [
                        'en-GB' => 'Datasheet 3',
                        'de-DE' => 'Datenblatt 3',
                    ],
                    'helpText' => [
                        'en-GB' => 'Displays a file in the datasheets tab. Useful file formats PDF, TXT, JPG, PNG or GIF.',
                        'de-DE' => 'Stellt eine Datei im Tab für Datenblätter dar. Sinnvolle Dateiformate PDF, TXT, JPG, PNG oder GIF.',
                    ]
                ]
            ],

        ];

        $customFieldSets = [
            [
                'id' => '54b17542f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_header_set',
                'config' => [
                    'label' => [
                        'en-GB' => 'Header (Stratus)',
                        'de-DE' => 'Header (Stratus)',
                    ]
                ],
                'customFields' => $customCategoryHeaderFields,
                'relations' => [$relationCategory1]
            ],
            [
                'id' => '54b17600f1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_category_image_set',
                'config' => [
                    'label' => [
                        'en-GB' => 'Category Image (Stratus)',
                        'de-DE' => 'Kategoriebild (Stratus)',
                    ]
                ],
                'customFields' => $customCategoryFields,
                'relations' => [$relationCategory2]
            ],
            [
                'id' => '54b176bef1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_tabs_set',
                'config' => [
                    'label' => [
                        'en-GB' => 'Custom Tabs (Stratus)',
                        'de-DE' => 'Custom Tabs (Stratus)',
                    ]
                ],
                'customFields' => $customProductFields,
                'relations' => [$relationProduct1]
            ],
            [
                'id' => '54b177bef1eb11eaadc10242ac120002',
                'name' => 'zenit_stratus_datasheets_set',
                'config' => [
                    'label' => [
                        'en-GB' => 'Datasheets (Stratus)',
                        'de-DE' => 'Datenblätter (Stratus)',
                    ]
                ],
                'customFields' => $customProductDatasheets,
                'relations' => [$relationProduct2]
            ],
        ];

        try {
            $this->customFieldSetRepository->upsert($customFieldSets, $context);
        } catch (\Exception $e) {}
    }

    public function deleteCustomFields($context): void
    {
        $criteria = new Criteria();
        $criteria->addFilter(new ContainsFilter('name', 'zenit_stratus'));

        $criteriaResult = $this->customFieldSetRepository->search($criteria, $context);
        $ids = $criteriaResult->getIds();

        if(!empty($ids)) {
            $data = [];

            foreach ($ids as $id) {
                $data[] = [
                    'id' => $id
                ];
            }

            $this->customFieldSetRepository->delete($data, $context);
        }
    }
}
