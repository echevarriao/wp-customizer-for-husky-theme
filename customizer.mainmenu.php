<?php

/*
 * Author O. Echevarria
 * Purpose: Add customizer for menus
 *
 */ 

function mainmenu_customizer ($wp_customize) {

	$wp_customize->add_section('main_navigation_section_overrides',
							   array('title' => __('Top Navigation Coor Overrides'),
									 'description' => __('Top Navigation Color Overrides'),
									 'capability' => 'edit_theme_options',
									 'priority' => 25,
									 ));

	$wp_customize->add_setting('main_navigation_use_override',
							   array('default' => 'no',
									 'sanitize_callback' => 'sanitize_select_field',)
							   );
									 
	$wp_customize->add_control('main_navigation_use_override',
							   array('label' => __('Use these overrides?'),
									 'type' => 'select',
									 'choices' => array('no' => 'No', 'yes' => 'Yes'),
									 'section' => 'main_navigation_section_overrides',
									));

	// use solid or gradient background
	
	$wp_customize->add_setting('mainmenu_use_solid_gradient',
							   array('default' => 'solid',
									 'sanitize_callback' => 'sanitize_select_field',)
							   );
									 
	$wp_customize->add_control('mainmenu_use_solid_gradient',
							   array('label' => __('Use Gradient or Solid Background'),
									 'type' => 'select',
									 'choices' => array('solid' => 'Solid', 'gradient' => 'Gradient'),
									 'section' => 'main_navigation_section_overrides',
									));
	
	// top gradient main menu color
	
	$wp_customize->add_setting('nav_bg_top_gradient_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#ffffff'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_bg_top_gradient_color',
								array(
									'label' => 'Top Gradient Background Color',
									'section' => 'main_navigation_section_overrides',
									'settings' => 'nav_bg_top_gradient_color',
								)
								));

	// bottom gradient main menu color
	
	$wp_customize->add_setting('nav_bg_bottom_gradient_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#ffffff'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_bg_bottom_gradient_color',
								array(
									'label' => 'Bottom Gradient Background Color',
									'section' => 'main_navigation_section_overrides',
									'settings' => 'nav_bg_bottom_gradient_color',
								)
								));

	// solid main menu color
	
	$wp_customize->add_setting('nav_bg_solid_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#ffffff'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_bg_solid_color',
								array(
									'label' => 'Solid Background Color',
									'section' => 'main_navigation_section_overrides',
									'settings' => 'nav_bg_solid_color',
								)
								));

	// text menu color
	
	$wp_customize->add_setting('nav_text_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#000e2f'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_text_color',
								array(
									'label' => 'Navigation Text Color',
									'section' => 'main_navigation_section_overrides',
									'settings' => 'nav_text_color',
								)
								));

	// text menu hover color
	
	$wp_customize->add_setting('nav_text_hover_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#000e2f'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_text_hover_color',
								array(
									'label' => 'Navigation Text Hover Color',
									'section' => 'main_navigation_section_overrides',
									'settings' => 'nav_text_hover_color',
								)
								));

	// menu hover background color
	
	$wp_customize->add_setting('nav_bg_hover_color',
							   array(
									'sanitize_callback' => 'sanitize_hex_color',
									'default' => '#ffffff'));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_bg_hover_color',
								array(
									'label' => 'Navigation Background Hover Color',
									'section' => 'main_navigation_section_overrides',
									'settings' => 'nav_bg_hover_color',
								)
								));
 
}

add_action ('customize_register', 'mainmenu_customizer');
