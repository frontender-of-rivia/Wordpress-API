<?php
	// регистрация страницы плагина
	function register_olo_page(){
		add_menu_page(
			'Страница olo',
			'olo settings',
			'manage_options',
			'olo_page',
			'olo_page_display'
		);
	}
	add_action('admin_menu', 'register_olo_page');


	// функция отображения страницы плагина
	function olo_page_display(){
		?>
		<form action="options.php" method="POST">
			<?php settings_fields( 'olo_page' ); ?>
			<?php do_settings_sections( 'olo_page' ); ?> 
			<?php submit_button(); ?>  
		</form>  
	<?php } 



	/* регистрация секций и полей */
	function olo_settings_init(){
		// добавление секции настроек
		add_settings_section (
			'olo_first_section',
			'Первая секция настроек',
			'echo_first_section_description',
			'olo_page'
		);
		// функция описания секции настроек
		function echo_first_section_description(){
			echo 'Главные настройки';
		}
		// добавление поля
		add_settings_field(
			'olo_field_name',
			'Имя',
			'olo_field_name_display',
			'olo_page',
			'olo_first_section'
		);
		// добавление поля
		add_settings_field(
			'olo_field_family',
			'Имя',
			'olo_field_family_display',
			'olo_page',
			'olo_first_section'
		);
		// регистрация этих полей
		register_setting(
			'olo_page',
			'olo_field_name'
		);
		register_setting(
			'olo_page',
			'olo_field_family'
		);
	}
	add_action('admin_init', 'olo_settings_init');




	/* функции для отображения полей */
	function olo_field_name_display($args){
		$html = '<input type="text" id="olo_field_name" name="olo_field_name" value="'.get_option('olo_field_name').'" ' . '/>';  
		echo $html;  
	}
	function olo_field_family_display(){
		$html = '<input type="text" id="olo_field_family" name="olo_field_family" value="'.get_option('olo_field_family').'" ' . '/>';  
		echo $html; 
	}
?>