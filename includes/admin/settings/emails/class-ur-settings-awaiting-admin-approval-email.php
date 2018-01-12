<?php
/**
 * Configure Email
 *
 * @class    UR_Settings_Awaiting_Admin_Approval_Email
 * @extends  UR_Settings_Email
 * @category Class
 * @author   WPEverest
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'UR_Settings_Awaiting_Admin_Approval_Email', false ) ) :

/**
 * UR_Settings_Awaiting_Admin_Approval_Email Class.
 */
class UR_Settings_Awaiting_Admin_Approval_Email{

	
	public function __construct() {
		$this->id             = 'awaiting_admin_approval_email';
		$this->title          = __( 'Awaiting Admin Approval', 'user-registration' );
		$this->description    = __( 'Email sent to the user notifying the registration is awaiting admin approval', 'user-registration' );
	}

		/**
		 * Get settings
		 *
		 * @return array
		 */
		public function get_settings() {

		?><h2><?php echo esc_html__('Awaiting Admin Approval Email','user-registration'); ?> <?php ur_back_link( __( 'Return to emails', 'user-registration' ), admin_url( 'admin.php?page=user-registration-settings&tab=email' ) ); ?></h2>

		<?php
			$settings = apply_filters(
				'user_registration_awaiting_admin_approval', array(

					array(
						'type'  => 'title',
						'desc'  => '',
						'id'    => 'awaiting_admin_approval_email',
					),

					array(
						'title'    => __( 'Enable this email', 'user-registration' ),
						'desc'     => __( 'Enable this email sent to user notifying the registration is awaiting admin approval.', 'user-registration' ),
						'id'       => 'user_registration_enable_awaiting_admin_approval_email',
						'default'  => 'yes',
						'type'     => 'checkbox',
						'autoload' => false,
					),

					array(
						'title'    => __( 'Email Content', 'user-registration' ),
						'desc'     => __( 'The email content you want to customize.', 'user-registration' ),
						'id'       => 'user_registration_awaiting_admin_approval_email',
		 				'type'     => 'tinymce',
		 				'default'  => $this->ur_get_awaiting_admin_approval_email(),
						'css'      => 'min-width: 350px;',
						'desc_tip' => true,
					),

					array(
						'type' => 'sectionend',
						'id'   => 'awaiting_admin_approval_email',
					),

				)
			);

			return apply_filters( 'user_registration_get_settings_' . $this->id, $settings );
		}

	public function ur_get_awaiting_admin_approval_email() {
		
		$message = apply_filters( 'user_registration_user_email_message', __( sprintf(

				'Hi {{username}},
 					<br/>
               <br/>
 					You have registered on <a href="{{home_url}}">{{blog_info}}</a>.
 					<br/>
 					Please wait until the site admin approves your registration.
 					<br/>
 					You will be notified after it is approved.
 					<br/>
 					<br/>
 					Thank You!'), 'user-registration' ) );

		return $message;
	}
}
endif;

return new UR_Settings_Awaiting_Admin_Approval_Email();
