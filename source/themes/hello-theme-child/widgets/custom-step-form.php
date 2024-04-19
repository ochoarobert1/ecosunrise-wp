<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Custom_Step_Form Widget.
 *
 * @since 1.0.0
 */
class CustomStepForm extends \Elementor\Widget_Base
{
    /**
     * Method get_name
     *
     * @return void
     */
    public function get_name()
    {
        return 'multi-step-form';
    }

    /**
     * Method get_title
     *
     * @return void
     */
    public function get_title()
    {
        return esc_html__('Multi Step Form', 'hello-elementor-child');
    }

    /**
     * Method get_icon
     *
     * @return void
     */
    public function get_icon()
    {
        return 'eicon-code';
    }

    /**
     * Method get_categories
     *
     * @return void
     */
    public function get_categories()
    {
        return [ 'basic' ];
    }

    /**
     * Method get_keywords
     *
     * @return void
     */
    public function get_keywords()
    {
        return [ 'oembed', 'url', 'link' ];
    }

    /**
     * Method get_script_depends
     *
     * @return void
     */
    public function get_script_depends()
    {
        return [ 'custom-step-form-js' ];
    }

    /**
     * Method get_style_depends
     *
     * @return void
     */
    public function get_style_depends()
    {
        return [ 'custom-step-form-css' ];
    }

    /**
     * Method register_controls
     *
     * @return void
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'hello-elementor-child'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'first_button',
            [
                'label' => esc_html__('First button to show', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => esc_html__('Calculate', 'hello-elementor-child'),
            ]
        );


        $this->end_controls_section();

    }

    /**
     * Method render
     *
     * @return void
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
		<form id="customStepForm" class="custom-step-form-container">
			<div id="formOverlay" class="custom-step-form-overlay">
				<div id="formContainer" class="custom-multi-step-form-overlay-inner">
					<div class="multi-step-header">
						<h2>Calculate your Savings</h2>
						<progress id="progressBar" value="11" max="100"></progress>
						<p>Your Savings Calculation is <span id="progressNumber">11%</span> Complete</p>
					</div>
					<div class="multi-step-content">
						<div class="multi-step-item multi-step-item-1 active">
							<h2>What is Your Average Electric Bill?</h2>
							<p>We use this information to calculate your savings. Move the slider to select.</p>
							<div class="range-slider">
								<span class="range-slider-minimum">$101</span>
								<input id="electric-bill" name="electric-bill" class="range-slider__range" type="range" value="400" min="101" max="800">
								<span class="range-slider-maximum">$800+</span>
								<div class="range-result">
									<span class="range-slider__value">$400</span>
								</div>
							</div> 
						</div>
						<div class="multi-step-item multi-step-item-2">
							<h2>Select Your Utility Provider</h2>
							<p>We'll look up utility rates to calculate new savings</p>
							<div class="radio-container">
								<div class="radio-input">
									<input type="radio" name="utility" id="florida_co" value="Florida Power and Light Company" />
									<label for="florida_co"> Florida Power & Light Co.</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="utility" id="other_co" value="Other" />
									<label for="other_co"> Other</label>
								</div>
							</div>
							<small class="error-utility error hidden">You must select one these options</small>
						</div>
						
						<div class="multi-step-item multi-step-item-3">
							<h2>Your Street Address</h2>
							<p>We'll lookup rebates and incentives for your home</p>
							<input class="form-address" autocomplete="address-line1" name="address" id="address" type="text" placeholder="Enter your street address" />
							<br>
							<small class="error-address error hidden">You must enter your street address</small>
						</div>
						<div class="multi-step-item multi-step-item-4">
							<h2>Do You Own This Address?</h2>
							<div class="radio-container">
								<div class="radio-input">
									<input type="radio" name="ownership" id="yes" value="Yes" />
									<label for="yes"> Yes</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="ownership" id="no" value="No" />
									<label for="no"> No</label>
								</div>
							</div>
							<small class="error-ownership error hidden">You must select one these options</small>
						</div>
						<div class="multi-step-item multi-step-item-5">
							<h2>Does Your Roof Get Sunlight?</h2>
							<p>We'll calculate the best possible savings for your particular project.</p>
							<div class="radio-container radio-container-sunlight">
								<div class="radio-input">
									<input type="radio" name="sunlight" id="full" value="Full Sunlight" />
									<label for="full" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/no-shade.svg" alt="Full Sunlight" />Full Sunlight</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="sunlight" id="someshade" value="Some Shade" />
									<label for="someshade" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/little-shade.svg" alt="Some Shade" />Some Shade</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="sunlight" id="severeshade" value="Severe Shade" />
									<label for="severeshade" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/lot-of-shade.svg" alt="Severe Shade" />Severe Shade</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="sunlight" id="uncertain" value="Uncertain" />
									<label for="uncertain" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/uncertain.svg" alt="Unvertain" />Uncertain</label>
								</div>
							</div>
							<small class="error-sunlight error hidden">You must select one these options</small>
						</div>
						<div class="multi-step-item multi-step-item-6">
							<h2>Your Estimate Is Almost Ready!</h2>
							<p>We'll Deliver Your Exclusive Savings By Email</p>
							<input class="form-email" autocomplete="email" type="email" name="email" id="" placeholder="Enter your email address" />
							<br>
							<small class="error-email error hidden">You must enter your email address</small>
						</div>
						<div class="multi-step-item multi-step-item-7">
							<h2>Who Is This Estimate For?</h2>
							<p>We Take Privacy Seriously. No Spam Ever!</p>
							<div class="multi-step-double-input">
								<label for="first_name">First Name <br/><input type="text" name="first_name" id="first_name" placeholder="First Name" /></label>
								<label for="last_name">Last Name <br/><input type="text" name="last_name" id="last_name" placeholder="Last Name" /></label>
							</div>
							<br>
							<small class="error-name error hidden">You must enter your first and last name</small>
						</div>
						<div class="multi-step-item multi-step-item-8">
							<h2>Final Step!</h2>
							<p>Complete The Final Step To See Savings!</p>
							<label for="phone">Phone Number<br/><input class="form-phone" autocomplete="tel" type="tel" name="phone" id="phone" placeholder="Phone Number" /></label>
							<br />
							<small class="error-tel error hidden">You must enter your phone number</small>
							<br />
							<small>By clicking the "View My Savings" button, you authorize Ecosunrise Energy and up to 4 solar partners to call you and send you pre-recorded messages and text messages at the number you entered above, using an autodialer, with offers about their products or services, even if your phone number is on any national or state "Do Not Call" list. <br/>Message and data rates may apply. Your consent here is not based on a condition of purchase.</small>
						</div>
					</div>
					<footer class="multi-step-navigation">
						<button data-step="1" id="multiStepPrev" class="button-step button-step-prev"><i class="fas fa-chevron-left"></i> Prev</button>
						<button data-step="2" id="multiStepNext" class="button-step button-step-next">Next <i class="fas fa-chevron-right"></i> </button>
						<button type="submit" id="multiStepSubmit" class="button-step button-step-next hidden">View My Savings</button>
					</footer>
				</div>
				<div id="multiStepLoader" class="custom-multi-step-form-overlay-inner-loader hidden">
					<div class="loader"></div>
				</div>
			</div>
			<div class="custom-step-form-zip-part">
				<div class="custom-step-form-zip-part-inner">
					<div class="input-item">
						<input type="text" name="zipcode" id="zipcode" placeholder="Enter your zip code" autocomplete="postal-code" />
					</div>
					<div class="input-item">
						<button id="openBtnOverlay"><?php echo esc_html($settings['first_button']); ?></button>
					</div>
					<small class="error-zip error hidden">This field cannot be empty</small>
				</div>
			</div>
		</form>

		<?php
    }

}
