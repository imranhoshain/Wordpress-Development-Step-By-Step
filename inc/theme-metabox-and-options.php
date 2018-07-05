<?php

get_template_part('/inc/codestar-framework/cs-framework');


// framework Metabox options filter example

function rideo_cs_framework_options($options)
{
    
    $options = array(); // remove old options
    
    
    $options[] = array(
        'id' => 'rideo_slide_meta',
        'title' => 'Slide Options',
        'post_type' => 'rideo-main-slide',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'name' => 'rideo_slide_metabox',
                'title' => 'Slide Options',
                'fields' => array(
                    // begin: a field          
                    
                    array(
                        'id' => 'text_color',
                        'type' => 'color_picker',
                        'title' => 'Slider text color',
                        'default' => '#fff'
                    ),
                    // end: a field
                    
                    array(
                        'id' => 'slider_button_link',
                        'type' => 'text',
                        'title' => 'Slider Botton Link',
                        'default' => '#'
                    )
                )
            )
        )
    );
    
    
    //All page option meta    
    $options[] = array(
        'id' => 'rideo_page_meta',
        'title' => 'Page Options',
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'name' => 'rideo_page_metabox',
                'title' => 'Page Options',
                'fields' => array(
                    // begin: a field
                    array(
                        'id' => 'enable_title',
                        'type' => 'switcher',
                        'title' => 'Enable Page Title',
                        'default' => 'false'
                    ),
                    // end: a field  
                    array(
                        'id' => 'custom_title',
                        'type' => 'textarea',
                        'title' => 'Add Page custom Title',
                        'dependency' => array(
                            'enable_title',
                            '==',
                            'true'
                        )
                    ),
                    // end: a field
                    array(
                        'id' => 'text_title_direction',
                        'type' => 'select',
                        'title' => 'Select Text Align',
                        'options' => array(
                            'center' => 'Center',
                            'left' => 'Left',
                            'right' => 'Right'
                        ),
                        'default' => 'left',
                        'dependency' => array(
                            'enable_title',
                            '==',
                            'true'
                        )
                    )
                    // end: a field      
                    
                )
            )
        )
    );
    
    return $options;
    
}
add_filter('cs_metabox_options', 'rideo_cs_framework_options');



// framework Theme options filter example
function rideo_theme_options($options)
{
    
    $options = array();
    /*remove old options*/
    
    //Add acording option
    $options[] = array(
        'name' => 'header_top_options',
        'title' => 'Header Top Options',
        'icon' => 'fa fa-minus',
        'sections' => array(
            
            //Header top left start            
            array(
                'name' => 'header_top_left',
                'title' => 'Header Top Left',
                'icon' => 'fa fa-minus',
                'fields' => array(
                    
                    array(
                        'id' => 'header_top_array',
                        'type' => 'group',
                        'title' => 'Header Top Icon',
                        'button_title' => 'Add New',
                        'accordion_title' => 'Add New Header Link',
                        'fields' => array(
                            array(
                                'id' => 'header_sub_title',
                                'type' => 'text',
                                'title' => 'Header Sub Title'
                            ),
                            array(
                                'id' => 'header_icon',
                                'type' => 'icon',
                                'default' => 'fa fa-heart',
                                'title' => 'Header Icon'
                            ),
                            array(
                                'id' => 'icon_color',
                                'type' => 'color_picker',
                                'title' => 'Icon Color',
                                'default' => '#f4cc14'
                            )
                        )
                    )
                    
                )
            ),
            //End left section
            array(
                'name' => 'header_top_right',
                'title' => 'Header Top Right',
                'icon' => 'fa fa-minus',
                'fields' => array(
                    
                    array(
                        'id' => 'header_right_link',
                        'type' => 'text',
                        'title' => 'Header Link'
                    ),
                    
                    array(
                        'id' => 'enable_search',
                        'type' => 'switcher',
                        'default' => true,
                        'title' => 'Enable search area'
                    )
                    
                )
            ),
            array(
                'name' => 'header_logo',
                'title' => 'Header Logo',
                'icon' => 'fa fa-minus',
                'fields' => array(
                    
                    array(
                        'id' => 'header_logo_text',
                        'type' => 'text',
                        'title' => 'Header Logo Text'
                    )
                    
                )
            )
        )
    );
    //End header acordian option
    
    
    //Add acording option
    $options[] = array(
        'name' => 'footer_options',
        'title' => 'Footer Options',
        'icon' => 'fa fa-minus',
        'sections' => array(
            
            //Header top left start            
            array(
                'name' => 'footer_top_options',
                'title' => 'Footer Top',
                'icon' => 'fa fa-minus',
                'fields' => array(
                    
                    array(
                        'id' => 'footer_one',
                        'type' => 'fieldset',
                        'title' => 'Footer Widget One',
                        'un_array' => true,
                        'fields' => array(
                            array(
                                'id' => 'footer_top_social',
                                'type' => 'group',
                                'title' => 'Footer Social Information',
                                'button_title' => 'Add New Social Info',
                                'accordion_title' => 'Add detail social information',
                                'fields' => array(
                                    
                                    array(
                                        'id' => 'footer_top_social_icon',
                                        'type' => 'icon',
                                        'title' => 'add social icon',
                                        'default' => 'fa fa-heart'
                                    ),
                                    
                                    array(
                                        'id' => 'footer_social_top_link',
                                        'type' => 'text',
                                        'title' => 'Enter your social link',
                                        'default' => 'https://facebook.com'
                                    )
                                    
                                )
                            )
                            
                            
                        )
                    ),
                    
                    array(
                        'id' => 'footer_two',
                        'type' => 'fieldset',
                        'title' => 'Footer Widget Two',
                        'un_array' => true,
                        'fields' => array(
                            array(
                                'id' => 'footer_find_me_options',
                                'type' => 'group',
                                'title' => 'Footer Coantact Us Section',
                                'button_title' => 'Add Your Contact Info',
                                'accordion_title' => 'Add detail contact information',
                                'fields' => array(
                                    
                                    array(
                                        'id' => 'footer_contact_title',
                                        'type' => 'text',
                                        'title' => 'add contact title',
                                        'default' => 'Example > Email:'
                                    ),
                                    
                                    array(
                                        'id' => 'footer_contact_detail',
                                        'type' => 'textarea',
                                        'title' => 'Enter your contact detail',
                                        'default' => 'your_email@gmail.com'
                                    )
                                    
                                )
                            )
                        )
                    )                 
   
                )
            ),
            //End left section
            array(
                'name' => 'footer_bottom_options',
                'title' => 'Footer Bottom',
                'icon' => 'fa fa-minus',
                'fields' => array(
                    
                    array(
                        'id' => 'footer_bottom_left',
                        'type' => 'fieldset',
                        'title' => 'Footer Bottom Left Section',
                        'un_array' => true,
                        'fields' => array(
                            
                            array(
                                'id' => 'footer_copyright_text',
                                'type' => 'text',
                                'title' => 'Copyright Text',
                                'default' => 'Copyright © 2016 - Template Powered By'
                            ),
                            
                            
                            array(
                                'id' => 'footer_copyright_link',
                                'type' => 'text',
                                'title' => 'Footer Copyright Link'
                            )
                        )
                    ),
                    
                    array(
                        'id' => 'footer_bottom_right',
                        'type' => 'group',
                        'title' => 'Payment Option',
                        'button_title' => 'Add New Payment Option',
                        'accordion_title' => 'Add New Payment Field',
                        'fields' => array(
                            array(
                                'id' => 'payment_card_link',
                                'type' => 'text',
                                'title' => 'Payment Gateway Link',
                                'default' => 'https://card.com'
                            ),
                            array(
                                'id' => 'payment_card_image',
                                'type' => 'image',
                                'title' => 'Payment Card Image'
                            )
                            
                        )
                    )
                )
            )
        )
    );
    //End header acordian option

    $options[] = array(
        'name' => 'script_section',
        'title' => 'Script Section',
        'fields' => array(
            array(
                'id' => 'custom_css',
                'type' => 'textarea',
                'sanitize' => false,
                'title' => 'Custom Css'
            )
        )
    );
    
    return $options;
    
}
add_filter('cs_framework_options', 'rideo_theme_options');



// framework Custom options filter example
function rideo_custom_framework_options($options)
{
    
    $options = array(); // remove old options
    
    return $options;
    
}
add_filter('cs_customize_options', 'rideo_custom_framework_options');
