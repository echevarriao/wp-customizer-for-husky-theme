<?php

/*
 * Author O. Echevarria
 * Purpose: Add customizer for footer
 *
 */ 

function footer_customizer ($wp_customize) {
	
	$wp_customize->add_section('footer_section_overrides',
							   array('title' => __('Footer Color Overrides'),
									 'description' => __('Footer Colors Override Options'),
									 'capability' => 'edit_theme_options',
									 'priority' => 25,
									 ));

	$wp_customize->add_setting('footer_use_override',
							   array('default' => 'no',
									 'sanitize_callback' => 'sanitize_select_field',)
							   );
									 
	$wp_customize->add_control('footer_use_override',
							   array('label' => __('Use these overrides?'),
									 'type' => 'select',
									 'choices' => array('no' => 'No', 'yes' => 'Yes'),
									 'section' => 'footer_section_overrides',
									));

	// custom color schemes

	// use solid or gradient background
	
	$wp_customize->add_setting('footer_use_solid_gradient',
							   array('default' => 'solid',
									 'sanitize_callback' => 'sanitize_select_field',)
							   );
									 
	$wp_customize->add_control('footer_use_solid_gradient',
							   array('label' => __('Use Gradient or Solid Background'),
									 'type' => 'select',
									 'choices' => array('solid' => 'Solid', 'gradient' => 'Gradient'),
									 'section' => 'footer_section_overrides',
									));
	// footer background color
	
	$wp_customize->add_setting('footer_bg_top_gradient_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#f0f3f7'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_top_gradient_color',
								array(
									'label' => 'Top Footer Background Color',
									'section' => 'footer_section_overrides',
									'settings' => 'footer_bg_top_gradient_color',
								)
								));

	$wp_customize->add_setting('footer_bg_bottom_gradient_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#f0f3f7'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_bottom_gradient_color',
								array(
									'label' => 'Bottom Footer Background Color',
									'section' => 'footer_section_overrides',
									'settings' => 'footer_bg_bottom_gradient_color',
								)
								));



	
	// footer background color
	
	$wp_customize->add_setting('footer_bg_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#f0f3f7'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color',
								array(
									'label' => 'Solid Footer Background Color',
									'section' => 'footer_section_overrides',
									'settings' => 'footer_bg_color',
								)
								));

	// footer text colors
	
	$wp_customize->add_setting('footer_text_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#111111'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color',
								array(
									'label' => 'Footer Text Color',
									'section' => 'footer_section_overrides',
									'settings' => 'footer_text_color',
								)
								));
	// footer URL colors
	
	$wp_customize->add_setting('footer_url_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#111111'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_url_color',
								array(
									'label' => 'Footer URL Text Color',
									'section' => 'footer_section_overrides',
									'settings' => 'footer_url_color',
								)
								));

	// footer hover URL colors
	
	$wp_customize->add_setting('footer_url_hover_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#ffffff'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_url_hover_color',
								array(
									'label' => 'Footer Hover URL Text Color',
									'section' => 'footer_section_overrides',
									'settings' => 'footer_url_hover_color',
								)
								));

	// footer hover URL bgcolors
	
	$wp_customize->add_setting('footer_url_hover_bgcolor',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#111111'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_url_hover_bgcolor',
								array(
									'label' => 'Footer Hover URL Background Color',
									'section' => 'footer_section_overrides',
									'settings' => 'footer_url_hover_bgcolor',
								)
								));

	$wp_customize->add_setting('footer_use_custom_override',
							   array('default' => 'no',
									 'sanitize_callback' => 'sanitize_select_field',)
							   );
									 
	$wp_customize->add_control('footer_use_custom_override',
							   array('label' => __('Use Custom CSS Overrides?'),
									 'type' => 'select',
									 'choices' => array('no' => 'No', 'yes' => 'Yes'),
									 'section' => 'footer_section_overrides',
									));
								
								
	// custom CSS for footer section only
								
	$wp_customize->add_setting('footer_css_styles',
							   array('default' => "/* Add CSS Custom Code for Footer Section */",
									'sanitize_callback' => 'sanitize_textarea_field',
									 
									 )
							   );
									 
	$wp_customize->add_control('footer_css_styles',
							   array('label' => __('Enter Footer Only CSS'),
									 'type' => 'textarea',
									 'section' => 'footer_section_overrides',
									));
	
	return ;
	
}

add_action ('customize_register', 'footer_customizer');

// sanitization and utility functions

// select sanitization function

if(!function_exists('sanitize_select_field')) {

// 
// Author: DIVPUSHER
// code origin: https://divpusher.com/blog/wordpress-customizer-sanitization-examples/
//

function sanitize_select_field( $input, $setting ){
          
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    
	$input = sanitize_key($input);
  
    //get the list of possible select options
	
    $choices = $setting->manager->get_control( $setting->id )->choices;
                              
    //return input if valid or return default option

    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
              
}

}
