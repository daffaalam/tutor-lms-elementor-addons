<?php
/**
 * Course Target Audience
 * @since 1.0.0
 */

namespace TutorLMS\Elementor\Addons;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CourseTargetAudience extends BaseAddon {

    use ETLMS_Trait;

    private static $prefix_class_alignment = "elementor-align-"; 

    public function get_title() {
        return __('Course Target Audience', 'tutor-elementor-addons');
    }
    
    protected function register_content_controls() {
		$this->start_controls_section(
            'course_target_audience_content',
            [
                'label' => __('General Settings', 'tutor-elementor-addons'),
            ]
        );

        $this->add_responsive_control(
            'course_target_audience_layout',
            [
                'label'        => __('Layout', 'tutor-elementor-addons'),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'list'   => [
                        'title' => __('List', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-list-ul',
                    ],
                    'inline' => [
                        'title' => __('Inline', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-ellipsis-h',
                    ],
                ],
                'prefix_class' => 'etlms-author-specifications-%s',
                'default'      => 'list',
            ]
        );
        
        $this->add_control(
			'course_target_audience_list_icon',
			[
				'label' => __('List Icon', 'tutor-elementor-addons'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'solid',
				],
			]
        );

        $this->add_responsive_control(
            'course_target_audience_align',
            $this->etlms_alignment() //alignment
        );

        $this->end_controls_section();
	}
    
    protected function register_style_controls() {
        $selector = '.etlms-course-specifications.etlms-course-target_audience';
        $title_selector = $selector.' h3';
        $list_selector = $selector.' .etlms-course-specification-items li';
        $icon_selector = $list_selector.' i';
        $text_selector = $list_selector.' span';

        /* Title Section */
        $this->start_controls_section(
            'course_target_audience_title_section',
            [
                'label' => __('Section Title', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_target_audience_title_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$title_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_target_audience_title_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $title_selector,
            ]
        );
        $this->end_controls_section();

        /* List  Section */
        $this->start_controls_section(
            'course_target_audience_list_section',
            [
                'label' => __('List', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'course_target_audience_space_between',
            [
                'label' => __( 'Space Between', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '.etlms-author-specifications-list '.$list_selector.':not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '.etlms-author-specifications-inline '.$list_selector.':not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'size' => 5
                ]
            ]
        );
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'course_target_audience_border',
				'label' => __('Border', 'tutor-elementor-addons'),
				'selector' => $list_selector,
			]
        );
        $this->add_responsive_control(
            'course_target_audience_border_radius',
            [
                'label' => __( 'Border Radius', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    $list_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'course_target_audience_list_padding',
            [
                'label' => __('Padding', 'tutor-elementor-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    $list_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

         /* Icon  Section */
         $this->start_controls_section(
            'course_target_audience_icon_section',
            [
                'label' => __('Icon', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_target_audience_icon_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$icon_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_responsive_control(
            'course_target_audience_icon_size',
            [
                'label' => __( 'Size', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    $icon_selector => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'size' => 16
                ]
            ]
        );
        $this->end_controls_section();

        /* Text  Section */
        $this->start_controls_section(
            'course_target_audience_text_section',
            [
                'label' => __('Text', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_target_audience_text_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$text_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_responsive_control(
            'course_target_audience_text_indent',
            [
                'label' => __( 'Text Indent', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    $text_selector => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'size' => 5
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_target_audience_text_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $text_selector,
            ]
        );
        $this->end_controls_section();
    }

    protected function render($instance = []) {
        $course = etlms_get_course();
        if ($course) {
            ob_start();
            $settings = $this->get_settings_for_display();
            include_once etlms_get_template('course/target-audience');
            $output = apply_filters('tutor_course/single/audience_html', ob_get_clean());
            echo $output;
        }
    }
}
