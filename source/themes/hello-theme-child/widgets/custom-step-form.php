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
						<h2>Calcula tus ahorros</h2>
						<progress id="progressBar" value="11" max="100"></progress>
						<p>Su cálculo de ahorro está a un <span id="progressNumber">11%</span> de completarse</p>
					</div>
					<div class="multi-step-content">
						<div class="multi-step-item multi-step-item-1 active">
							<h2>¿Cuál es su factura eléctrica promedio?</h2>
							<p>Utilizamos esta información para calcular sus ahorros. Mueva el control deslizante para seleccionar.</p>
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
							<h2>Seleccione su proveedor de servicios públicos</h2>
							<p>Buscaremos tarifas de servicios públicos para calcular nuevos ahorros.</p>
							<div class="radio-container">
								<div class="radio-input">
									<input type="radio" name="utility" id="florida_co" value="Florida Power and Light Company" />
									<label for="florida_co"> Florida Power & Light Co.</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="utility" id="other_co" value="Otro" />
									<label for="other_co"> Otro</label>
								</div>
							</div>
							<small class="error-utility error hidden">Debes seleccionar una de estas opciones</small>
						</div>
						
						<div class="multi-step-item multi-step-item-3">
							<h2>Su dirección postal</h2>
							<p>Buscaremos reembolsos e incentivos para su casa.</p>
							<input class="form-address" autocomplete="address-line1" name="address" id="address" type="text" placeholder="Introduzca su dirección postal" />
							<br>
							<small class="error-address error hidden">Debes ingresar tu dirección postal</small>
						</div>
						<div class="multi-step-item multi-step-item-4">
							<h2>¿Es usted el propietario de esta dirección?</h2>
							<div class="radio-container">
								<div class="radio-input">
									<input type="radio" name="ownership" id="yes" value="Yes" />
									<label for="yes"> Si</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="ownership" id="no" value="No" />
									<label for="no"> No</label>
								</div>
							</div>
							<small class="error-ownership error hidden">Debes seleccionar una de estas opciones</small>
						</div>
						<div class="multi-step-item multi-step-item-5">
							<h2>¿Su techo recibe luz solar?</h2>
							<p>Calcularemos los mejores ahorros posibles para su proyecto en particular.</p>
							<div class="radio-container radio-container-sunlight">
								<div class="radio-input">
									<input type="radio" name="sunlight" id="full" value="Luz solar plena" />
									<label for="full" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/no-shade.svg" alt="Luz solar plena" />Luz solar plena</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="sunlight" id="someshade" value="Un poco de sombra" />
									<label for="someshade" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/little-shade.svg" alt="Un poco de sombra" />Un poco de sombra</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="sunlight" id="severeshade" value="Sombra severa" />
									<label for="severeshade" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/lot-of-shade.svg" alt="Sombra severa" />Sombra severa</label>
								</div>
								<div class="radio-input">
									<input type="radio" name="sunlight" id="uncertain" value="No estoy Seguro" />
									<label for="uncertain" class="label-icon"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/img/uncertain.svg" alt="Unvertain" />No estoy Seguro</label>
								</div>
							</div>
							<small class="error-sunlight error hidden">Debes seleccionar una de estas opciones</small>
						</div>
						<div class="multi-step-item multi-step-item-6">
							<h2>¡Su estimación está casi lista!</h2>
							<p>Le enviaremos sus ahorros exclusivos por correo electrónico</p>
							<input class="form-email" autocomplete="email" type="email" name="email" id="" placeholder="Ingresa tu dirección de correo" />
							<br>
							<small class="error-email error hidden">Debes ingresar tu dirección de correo electrónico</small>
						</div>
						<div class="multi-step-item multi-step-item-7">
							<h2>¿Para quién es esta estimación?</h2>
							<p>Nos tomamos en serio la privacidad. ¡Nunca habrá spam!</p>
							<div class="multi-step-double-input">
								<label for="first_name">Nombre <br/><input type="text" name="first_name" id="first_name" placeholder="Nombre" /></label>
								<label for="last_name">Apellido <br/><input type="text" name="last_name" id="last_name" placeholder="Apellido" /></label>
							</div>
							<br>
							<small class="error-name error hidden">Debes ingresar tu nombre y apellido</small>
						</div>
						<div class="multi-step-item multi-step-item-8">
							<h2>¡Último paso!</h2>
							<p>¡Complete el paso final para ver los ahorros!</p>
							<label for="phone">Número de teléfono<br/><input class="form-phone" autocomplete="tel" type="tel" name="phone" id="phone" placeholder="Número de teléfono" /></label>
							<br />
							<small class="error-tel error hidden">Debes ingresar tu número de teléfono</small>
							<br />
							<small>Al hacer clic en el botón "Ver mis ahorros", usted autoriza a Ecosunrise Energy y hasta 4 socios solares a llamarlo y enviarle mensajes pregrabados y mensajes de texto al número que ingresó arriba, utilizando un marcador automático, con ofertas sobre sus productos o servicios, incluso si su número de teléfono está en cualquier lista nacional o estatal de "No llamar". <br/>Es posible que se apliquen tarifas de mensajes y datos. Su consentimiento aquí no se basa en una condición de compra..</small>
						</div>
					</div>
					<footer class="multi-step-navigation">
						<button data-step="1" id="multiStepPrev" class="button-step button-step-prev"><i class="fas fa-chevron-left"></i> Prev</button>
						<button data-step="2" id="multiStepNext" class="button-step button-step-next">Sig <i class="fas fa-chevron-right"></i> </button>
						<button type="submit" id="multiStepSubmit" class="button-step button-step-next hidden">Ver mis ahorros</button>
					</footer>
				</div>
				<div id="multiStepLoader" class="custom-multi-step-form-overlay-inner-loader hidden">
					<h2>Estamos haciendo los cálculos necesarios para mostrarle su ahorro...</h2>
					<div class="loader"></div>
				</div>
			</div>
			<div class="custom-step-form-zip-part">
				<div class="custom-step-form-zip-part-inner">
					<div class="input-item">
						<input type="text" name="zipcode" id="zipcode" placeholder="Ingresa tu código postal" autocomplete="postal-code" />
					</div>
					<div class="input-item">
						<button id="openBtnOverlay"><?php echo esc_html($settings['first_button']); ?></button>
					</div>
					<small class="error-zip error hidden">Este campo no puede estar vacío</small>
				</div>
			</div>
		</form>

		<?php
    }

}
