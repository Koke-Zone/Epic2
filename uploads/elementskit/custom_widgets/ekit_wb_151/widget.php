<?php

namespace Elementor;

defined('ABSPATH') || exit;

class Ekit_Wb_151 extends Widget_Base {

	public function get_name() {
		return 'ekit_wb_151';
	}


	public function get_title() {
		return esc_html__( 'New Widget', 'elementskit-lite' );
	}


	public function get_categories() {
		return ['basic'];
	}


	public function get_icon() {
		return 'eicon-cog';
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'content_section_151_0',
			array(
				'label' => esc_html__( 'Title', 'elementskit-lite' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'ekit_wb_151_wysiwyg',
			array(
				'label' => esc_html__( 'WYSIWYG', 'elementskit-lite' ),
				'type'  => Controls_Manager::WYSIWYG,
				'default' =>  esc_html( 'Wysiwyg Contents...' ),
				'show_label' => true ,
				'label_block' => true ,
			)
		);

		$this->end_controls_section();

	}


	protected function render() {
	}


}
