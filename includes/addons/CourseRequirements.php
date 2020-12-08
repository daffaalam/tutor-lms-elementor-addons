<?php
/**
 * Course Requirements
 * @since 1.0.0
 */

namespace TutorLMS\Elementor\Addons;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CourseRequirements extends BaseAddon {

    public function get_title() {
        return __('Course Requirements', 'tutor-elementor-addons');
    }
    
    protected function register_content_controls() {
		$this->start_controls_section(
            'course_requirements_content',
            [
                'label' => __('General Settings', 'tutor-elementor-addons'),
            ]
        );

        $this->add_responsive_control(
            'course_requirements_layout',
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
			'course_requirements_list_icon',
			[
				'label' => __('List Icon', 'tutor-elementor-addons'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'solid',
				],
			]
        );

        $this->end_controls_section();
	}
    
    protected function register_style_controls() {
        $selector = '.etlms-course-specifications.etlms-course-requirements';
        $title_selector = $selector.' h3';
        $list_selector = $selector.' .etlms-course-specification-items li';
        $icon_selector = $list_selector.' i';
        $text_selector = $list_selector.' span';

        /* Title Section */
        $this->start_controls_section(
            'course_requirements_title_section',
            [
                'label' => __('Section Title', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_requirements_title_color',
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
                'name'      => 'course_requirements_title_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => $title_selector,
            ]
        );
        $this->add_responsive_control(
            'course_requirements_title_align',
            [
                'label'        => __('Alignment', 'tutor-elementor-addons'),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'left'   => [
                        'title' => __('Left', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'prefix_class' => 'elementor-align-%s',
                'default'      => 'left',
                'selector'     => $title_selector,
            ]
        );
        $this->end_controls_section();

        /* List  Section */
        $this->start_controls_section(
            'course_requirements_list_section',
            [
                'label' => __('List', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'course_requirements_space_between',
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
        $this->add_responsive_control(
            'course_requirements_list_align',
            [
                'label'        => __('Alignment', 'tutor-elementor-addons'),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'flex-start'   => [
                        'title' => __('Left', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'flex-end'  => [
                        'title' => __('Right', 'tutor-elementor-addons'),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'      => 'flex-start',
                'selectors' => [
                    $list_selector => 'justify-content: {{VALUE}};'
                ],
            ]
        );
        $this->add_responsive_control(
            'course_requirements_list_vertical_align',
            [
                'label'   => __('Vertical Align', 'tutor-elementor-addons'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'flex-start' => 'Top', 
                    'center' => 'Middle', 
                    'flex-end' => 'Bottom',
                ],
                'default' => 'center',
                'selectors' => [
                    $list_selector => 'align-items: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'course_requirements_border',
				'label' => __('Border', 'tutor-elementor-addons'),
				'selector' => $list_selector,
			]
        );
        $this->add_control(
            'course_requirements_list_padding',
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
            'course_requirements_icon_section',
            [
                'label' => __('Icon', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_requirements_icon_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$icon_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_responsive_control(
            'course_requirements_icon_size',
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
            ]
        );
        $this->end_controls_section();

        /* Text  Section */
        $this->start_controls_section(
            'course_requirements_text_section',
            [
                'label' => __('Text', 'tutor-elementor-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'course_requirements_text_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					$text_selector => 'color: {{VALUE}}',
				],
            ]
        );
        $this->add_responsive_control(
            'course_requirements_text_indent',
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
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_requirements_text_typo',
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
            include_once etlms_get_template('course/requirements');
            $output = apply_filters('tutor_course/single/requirements_html', ob_get_clean());
            echo $output;
        }
    }
}
