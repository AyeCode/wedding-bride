<?php

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Prefix_Custom_Content' ) ) :
	class Prefix_Custom_Content extends WP_Customize_Control {
		// Whitelist content parameter
		public $content = '';

		/**
		 * Render the control's content.
		 *
		 * Allows the content to be overriden without having to rewrite the wrapper.
		 *
		 * @since   1.0.0
		 * @return  void
		 */
		public function render_content() {
			if ( isset( $this->label ) ) {
				echo '<span class="customize-control-title">' . $this->label . '</span>';
			}
			if ( isset( $this->content ) ) {
				echo $this->content;
			}
			if ( isset( $this->description ) ) {
				echo '<span class="description customize-control-description">' . $this->description . '</span>';
			}
		}
	}
endif;
/*
* Homepage builder
*/
$wp_customize->add_panel( 'wedding_home_builder', array(
	'priority'    => 9,
	'title'       => __( 'Homepage Builder', 'wedding-bride' ),
	'description' => __( 'Build the home page like the demo', 'wedding-bride' ),
) );

$wp_customize->add_section(
	'wedding_homepage_settings_section',
	array(
		'title'       => __( 'Header Text & Buttons', 'wedding-bride' ),
		'description' => __( 'After uploading a header image fill this forms to enhance your header.', 'wedding-bride' ),
		'panel'       => 'wedding_home_builder',
	)
);
$wp_customize->add_section(
	'wedding_homepage_about_section',
	array(
		'title'       => __( 'About us Section', 'wedding-bride' ),
		'description' => __( 'You can set the "About us" section here.', 'wedding-bride' ),
		'panel'       => 'wedding_home_builder',
	)
);
$wp_customize->add_section(
	'wedding_homepage_parallax_section',
	array(
		'title'       => __( 'Our story section', 'wedding-bride' ),
		'description' => __( 'A nice our story  section.', 'wedding-bride' ),
		'panel'       => 'wedding_home_builder',
	)
);

$wp_customize->add_section(
	'wedding_homepage_contact_section',
	array(
		'title'       => __( 'Contact Section', 'wedding-bride' ),
		'description' => __( 'This is our contact section. You can use it among with the Contact form 7 plugin.', 'wedding-bride' ),
		'panel'       => 'wedding_home_builder',
	)
);

$wp_customize->add_setting(
	'wedding_header_above_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'wedding_header_above_title',
	array(
		'type'     => 'text',
		'label'    => __( 'The text above the header title', 'wedding-bride' ),
		'section'  => 'wedding_homepage_settings_section',
		'settings' => 'wedding_header_above_title',

	) );

$wp_customize->add_setting(
	'wedding_header_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'wedding_header_title',
	array(
		'type'     => 'text',
		'label'    => __( 'The title of the header.', 'wedding-bride' ),
		'section'  => 'wedding_homepage_settings_section',
		'settings' => 'wedding_header_title',

	) );


$wp_customize->add_setting(
	'wedding_header_below_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'wedding_header_below_title',
	array(
		'type'     => 'text',
		'label'    => __( 'The small text below the header title', 'wedding-bride' ),
		'section'  => 'wedding_homepage_settings_section',
		'settings' => 'wedding_header_below_title',

	) );

$wp_customize->add_setting(
	'wedding_header_btn_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'wedding_header_btn_text',
	array(
		'type'     => 'text',
		'label'    => __( 'The header button text.', 'wedding-bride' ),
		'section'  => 'wedding_homepage_settings_section',
		'settings' => 'wedding_header_btn_text',

	) );

$wp_customize->add_setting(
	'wedding_header_btn_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control(
	'wedding_header_btn_url',
	array(
		'type'     => 'text',
		'label'    => __( 'The header button url.', 'wedding-bride' ),
		'section'  => 'wedding_homepage_settings_section',
		'settings' => 'wedding_header_btn_url',

	) );


/*
* About Section
*/

$wp_customize->add_setting(
	'wedding_about_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'wedding_about_title',
	array(
		'type'     => 'text',
		'label'    => __( 'Add section title.', 'wedding-bride' ),
		'section'  => 'wedding_homepage_about_section',
		'settings' => 'wedding_about_title',
	) );


	/*
	* Person 1 page
	*/
	$wp_customize->add_setting(
		'wedding_page_person_1',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',

		)
	);

	$wp_customize->add_control(
		'wedding_page_person_1',
		array(
			'type'     => 'dropdown-pages',
			'label'    => __( 'Select the page for the first person on  the left.', 'wedding-bride' ),
			'section'  => 'wedding_homepage_about_section',
			'settings' => 'wedding_page_person_1',

		) );

		/*
		* Person 2 page
		*/
		$wp_customize->add_setting(
			'wedding_page_person_2',
			array(
				'default'           => '',
				'sanitize_callback' => 'absint',

			)
		);

		$wp_customize->add_control(
			'wedding_page_person_2',
			array(
				'type'     => 'dropdown-pages',
				'label'    => __( 'Select the page for the person on  the right.', 'wedding-bride' ),
				'section'  => 'wedding_homepage_about_section',
				'settings' => 'wedding_page_person_2',

			) );

/*
* Our story
*/
$wp_customize->add_setting(
	'wedding_parallax_image',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',

	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'wedding_parallax_image',
		array(
			'label'    => __( 'Our story background image', 'wedding-bride' ),
			'section'  => 'wedding_homepage_parallax_section',
			'settings' => 'wedding_parallax_image',
		)
	)
);

$wp_customize->add_setting(
	'wedding_parallax_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'

	)
);

$wp_customize->add_control(
	'wedding_parallax_title',
	array(
		'type'     => 'text',
		'label'    => __( 'Title of the "our story" section', 'wedding-bride' ),
		'section'  => 'wedding_homepage_parallax_section',
		'settings' => 'wedding_parallax_title',

	) );

$wp_customize->add_setting(
	'wedding_parallax_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wedding_parallax_text',
	array(
		'type'     => 'textarea',
		'label'    => __( 'Small text in the our story section', 'wedding-bride' ),
		'section'  => 'wedding_homepage_parallax_section',
		'settings' => 'wedding_parallax_text',
	) );


$wp_customize->add_setting(
	'wedding_parallax_btn_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wedding_parallax_btn_text',
	array(
		'type'     => 'text',
		'label'    => __( 'Our story button text', 'wedding-bride' ),
		'section'  => 'wedding_homepage_parallax_section',
		'settings' => 'wedding_parallax_btn_text',
	) );

$wp_customize->add_setting(
	'wedding_parallax_btn_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'wedding_parallax_btn_url',
	array(
		'type'     => 'text',
		'label'    => __( 'Our story button URL', 'wedding-bride' ),
		'section'  => 'wedding_homepage_parallax_section',
		'settings' => 'wedding_parallax_btn_url',
	) );
/*
* Contact Settings
*/

/** Register Settings **/
$wp_customize->add_setting(
	'wedding_contact_bg',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'wedding_contact_bg',
		array(
			'label'    => __( 'Use a background image in contact section.', 'wedding-bride' ),
			'section'  => 'wedding_homepage_contact_section',
			'settings' => 'wedding_contact_bg',
		)
	)
);

$wp_customize->add_setting(
	'wedding_contact_bg_color',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);


$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'wedding_contact_bg_color',
		array(
			'label'    => __( 'Use a background color fot the contact section.', 'wedding-bride' ),
			'section'  => 'wedding_homepage_contact_section',
			'settings' => 'wedding_contact_bg_color',
		)
	)
);


$wp_customize->add_setting(
	'wedding_contact_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wedding_contact_title',
	array(
		'type'     => 'text',
		'label'    => __( 'Contact section title.', 'wedding-bride' ),
		'section'  => 'wedding_homepage_contact_section',
		'settings' => 'wedding_contact_title',
	) );

$wp_customize->add_setting(
	'wedding_contact_form_shortcode',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wedding_contact_form_shortcode',
	array(
		'type'     => 'text',
		'label'    => __( 'Contact form shortcode. Paste it directly from the cf7 plugin.', 'wedding-bride' ),
		'section'  => 'wedding_homepage_contact_section',
		'settings' => 'wedding_contact_form_shortcode',
	) );

/** GENERAL SECTION Options**/

$wp_customize->add_section(
	'cb_general_settings_section',
	array(
		'title'       => __( 'General Settings', 'wedding-bride' ),
		'description' => __( 'General Settings for this theme.', 'wedding-bride' ),
		'priority'    => 10,
	)
);

$wp_customize->add_setting(
	'wedding_sticky_menu',
	array(
		'default'           => '0',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'wedding_sticky_menu',
	array(
		'type'     => 'select',
		'label'    => __( 'Make navigation menu sticky', 'wedding-bride' ),
		'section'  => 'cb_general_settings_section',
		'settings' => 'wedding_sticky_menu',
		'choices'  => array(
			'0' => __( 'No', 'wedding-bride' ),
			'1' => __( 'Yes', 'wedding-bride' ),
		)
	) );
