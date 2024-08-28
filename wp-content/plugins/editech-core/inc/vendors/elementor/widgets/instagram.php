<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class OSF_Elementor_Instagram extends Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve testimonial widget name.
     *
     * @return string Widget name.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'opal-instagram';
    }

    /**
     * Get widget title.
     *
     * Retrieve testimonial widget title.
     *
     * @return string Widget title.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __('Opal Instagram', 'editech-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve testimonial widget icon.
     *
     * @return string Widget icon.
     * @since  1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'eicon-social-icons';
    }

    public function get_categories() {
        return array('opal-addons');
    }

    /**
     * Register testimonial widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'section_instagram',
            [
                'label' => __('Instagram Config', 'editech-core'),
            ]
        );


        $this->add_control(
            'username',
            [
                'label'   => __('Username', 'editech-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'instagram'
            ]
        );

        $this->add_control(
            'number',
            [
                'label'   => __('Number of photos', 'editech-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_responsive_control(
            'per_row',
            [
                'label'   => __('Columns', 'editech-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 6,
                'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10],
            ]
        );

        $this->add_control(
            'size',
            [
                'label'   => __('Photo size', 'editech-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'thumbnail',
                'options' => [
                    'thumbnail' => 'Thumbnail',
                    'large'     => 'Large',
                ],
            ]
        );

        $this->add_control(
            'target',
            [
                'label'   => __('Open link in', 'editech-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '_blank',
                'options' => [
                    '_self'  => 'Current window (_self)',
                    '_blank' => 'New window (_blank)',
                ],
            ]
        );

        $this->add_control(
            'design',
            [
                'label'   => __('Design', 'editech-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid'     => 'Grid',
                    'carousel' => 'Carousel',
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label'        => __('Style', 'editech-core'),
                'type'         => Controls_Manager::SELECT,
                'default'      => 'outsite',
                'options'      => [
                    'insite'  => 'In site',
                    'outsite' => 'Out site',
                ],
                'prefix_class' => 'elementor-instagram-style-'
            ]
        );

        $this->add_control(
            'show_username',
            [
                'label' => __('Show Username', 'editech-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'show_time',
            [
                'label' => __('Show Time', 'editech-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'show_caption',
            [
                'label' => __('Show Caption', 'editech-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'number_caption',
            [
                'label'     => __('Number of text caption', 'editech-core'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 15,
                'condition' => [
                    'show_caption!' => '',
                ],
            ]
        );

        $this->add_control(
            'show_like',
            [
                'label' => __('Show Like', 'editech-core'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );
        $this->add_control(
            'show_comment',
            [
                'label'     => __('Show Comment', 'editech-core'),
                'type'      => Controls_Manager::SWITCHER,
                'condition' => [
                    'style' => 'insite',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Username', 'editech-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'username_align',
            [
                'label'     => __('Text Alignment', 'editech-core'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'    => [
                        'title' => __('Left', 'editech-core'),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center'  => [
                        'title' => __('Center', 'editech-core'),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'right'   => [
                        'title' => __('Right', 'editech-core'),
                        'icon'  => 'eicon-h-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'editech-core'),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default'   => 'left',
                'selectors' => [
                    '{{WRAPPER}} .instagram-widget .username' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'show_username!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'username_padding',
            [
                'label'      => __('Padding', 'editech-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .instagram-widget .username' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'show_username!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'username_typography',
                'selector' => '{{WRAPPER}} .instagram-widget .username',
            ]
        );

        $this->start_controls_tabs('tabs_username_style');

        $this->start_controls_tab(
            'tab_username_normal',
            [
                'label' => __('Normal', 'editech-core'),
            ]
        );

        $this->add_control(
            'username_text_color',
            [
                'label'     => __('Text Color', 'editech-core'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .instagram-widget .username a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_username_hover',
            [
                'label' => __('Hover', 'editech-core'),
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label'     => __('Text Color', 'editech-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .instagram-widget .username a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_image_style',
            [
                'label' => __('Image', 'editech-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_spacing',
            [
                'label'     => __('Space Between', 'editech-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .instagram-widget .instagram-picture' => 'padding: calc( {{SIZE}}{{UNIT}}/2 );',
                    '{{WRAPPER}} .instagram-widget '                   => 'margin: calc( -{{SIZE}}{{UNIT}}/2 );',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_deviation',
            [
                'label'     => __('Image Deviation', 'editech-core'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .instagram-picture:nth-child(2n) .wrapp-picture' => 'margin-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render testimonial widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $class = 'instagram-widget';
        echo '<div class="' . esc_attr($class) . '" >';
        if (!empty($settings['username'])) {
            $media_array = $this->osf_handler_json_instagram($settings['username'], $settings['number']);

            if (is_wp_error($media_array)) {
                echo esc_html($media_array->get_error_message());
            } else {
                if ($settings['show_username'] === 'yes') {
                    echo '<div class="username"><a href="//instagram.com/' . $settings['username'] . '">@' . $settings['username'] . '</a></div>';
                }

                $this->add_render_attribute('row', 'data-elementor-columns', $settings['per_row']);
                if (!empty($settings['per_row_tablet'])) {
                    $this->add_render_attribute('row', 'data-elementor-columns-tablet', $settings['per_row_tablet']);
                }
                if (!empty($settings['per_row_mobile'])) {
                    $this->add_render_attribute('row', 'data-elementor-columns-mobile', $settings['per_row_mobile']);
                }

                if ($settings['design'] === 'grid') {
                    echo '<div class="instagram-pics" ' . $this->get_render_attribute_string('row') . '>';
                } elseif ($settings['design'] === 'carousel') {
                    echo '<div class="instagram-pics owl-carousel" data-opal-carousel="true" data-dots="false" data-nav="false" data-items="' . esc_attr($settings['per_row']) . '" data-loop="false">';
                }
                foreach ($media_array as $item) {
                    $image       = (!empty($item[$settings['size']])) ? $item[$settings['size']] : $item['thumbnail'];
                    $datetime    = $this->otf_fnc_time($item['time']);
                    $description = $this->osf_fnc_excerpt($item['description'], $settings['number_caption'], '...');
                    $result
                                 = '<div class="instagram-picture column-item">
                        <div class="wrapp-picture">
                            <a href="' . esc_url($item['link']) . '" target="' . esc_attr($settings['target']) . '"></a>
                                <img src="' . esc_url($image) . '" alt="' . $description . '" />';
                    if ($settings['show_like'] === 'yes' && $settings['style'] === 'insite') {
                        $result .= '<div class="instagram-like"><span>' . $this->osf_pretty_number($item['likes']) . _n(' like', ' likes', $item['likes'], 'editech-core') . '</span></div>';
                    }
                    if ($settings['show_comment'] === 'yes' && $settings['style'] === 'insite') {
                        $result .= '<div class="instagram-comment"><span>' . $this->osf_pretty_number($item['comments']) . _n(' Comment', ' Comments', $item['comments'], 'editech-core') . '</span></div>';
                    }
                    $result .= '</div>';

                    if ($settings['show_time'] || $settings['show_caption'] || $settings['show_like']) {
                        $result .= '<div class="instagram-information">';
                        if ($settings['show_time'] === 'yes') {
                            $result .= '<div class="instagram-createdtime"><a href="' . esc_url($item['link']) . '" target="' . esc_attr($settings['target']) . '"><span>' . $datetime . '</span></a></div>';
                        }

                        if ($settings['show_caption'] === 'yes') {
                            $result .= '<div class="instagram-description"><span>' . $description . '</span></div>';
                        }


                        if ($settings['show_like'] === 'yes' && $settings['style'] === 'outsite') {
                            $result .= '<div class="instagram-like"><span>' . $this->osf_pretty_number($item['likes']) . _n(' like', ' likes', $item['likes'], 'editech-core') . '</span></div>';
                        }
                        $result .= '</div>';
                    }
                    $result
                        .= '</div>';

                    echo($result);
                }
                ?>
                </div>
                <?php
            }
        }

        echo '</div>';
    }


    private function osf_scrape_instagram($username) {
        $username = strtolower($username);
        if (false === ($instagram = get_transient('osf-instagram-media-new-' . sanitize_title_with_dashes($username)))) {
            $remote = wp_remote_get('https://instagram.com/' . trim($username) . '/?__a=1');

            if (is_wp_error($remote)) {
                return new WP_Error('site_down', esc_html__('Unable to communicate with Instagram.', 'editech-core'));
            }

            if (200 != wp_remote_retrieve_response_code($remote)) {
                return new WP_Error('invalid_response', esc_html__('Instagram did not return a 200.', 'editech-core'));
            }

            $instagram = file_get_contents('https://instagram.com/' . trim($username) . '/?__a=1');

//             do not set an empty transient - should help catch private or empty accounts
            if (!empty($instagram)) {
                $instagram = base64_encode(maybe_serialize($instagram));
                set_transient('osf-instagram-media-new-' . sanitize_title_with_dashes($username), $instagram, apply_filters('null_instagram_cache_time', HOUR_IN_SECONDS * 2));
            }
        }
        if (!empty($instagram)) {
            $instagram = maybe_unserialize(base64_decode($instagram));
            return $instagram;
        } else {
            return new WP_Error('no_images', esc_html__('Instagram did not return any images.', 'editech-core'));
        }
    }

    public function osf_handler_json_instagram($username, $slice = 9) {

        $instagram_string = $this->osf_scrape_instagram($username);
        $instagram        = array();
        if (is_wp_error($instagram_string)) {
            return $instagram_string;
        } else {
            $json = json_decode($instagram_string, true);

            if (isset($json['graphql']['user']['edge_owner_to_timeline_media']['edges'])) {
                $images = $json['graphql']['user']['edge_owner_to_timeline_media']['edges'];
                if (!is_array($images)) {
                    return new WP_Error('bad_array', esc_html__('Instagram has returned invalid data.', 'editech-core'));
                }
                foreach ($images as $i) {
                    $image = $i['node'];
                    if ($image['is_video'] == true) {
                        $type = 'video';
                    } else {
                        $type = 'image';
                    }
                    $instagram[] = array(
                        'link'        => '//instagram.com/p/' . $image['shortcode'],
                        'description' => isset($image['edge_media_to_caption']['edges'][0]['node']['text']) ? $image['edge_media_to_caption']['edges'][0]['node']['text'] : '',
                        'time'        => $image['taken_at_timestamp'],
                        'comments'    => $image['edge_media_to_comment']['count'],
                        'likes'       => $image['edge_media_preview_like']['count'],
                        'thumbnail'   => $image['thumbnail_src'],
                        'large'       => $image['display_url'],
                        'type'        => $type
                    );
                }
            }
        }

        return array_slice($instagram, 0, $slice);
    }

    private function osf_pretty_number($x = 0) {
        $x = (int)$x;

        if ($x > 1000000) {
            return floor($x / 1000000) . 'M';
        }

        if ($x > 10000) {
            return floor($x / 1000) . 'k';
        }

        return $x;
    }

    private function osf_fnc_excerpt($excerpt, $limit, $afterlimit = '[...]') {
        $limit = empty($limit) ? 20 : $limit;
        if ($excerpt != '') {
            $excerpt = @explode(' ', strip_tags($excerpt), $limit);
        } else {
            $excerpt = @explode(' ', strip_tags(get_the_content()), $limit);
        }
        if (count($excerpt) >= $limit) {
            @array_pop($excerpt);
            $excerpt = @implode(" ", $excerpt) . ' ' . $afterlimit;
        } else {
            $excerpt = @implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);

        return strip_shortcodes($excerpt);
    }

    private function otf_fnc_time($time) {
        $date = (current_time('timestamp') - $time) / (3600 * 24);

        if ($date > 7) {
            return date_i18n(get_option('date_format'), $time);
        } else {
            return human_time_diff($time, current_time('timestamp')) . __(' ago', 'editech-core');
        }
    }
}

$widgets_manager->register(new OSF_Elementor_Instagram());