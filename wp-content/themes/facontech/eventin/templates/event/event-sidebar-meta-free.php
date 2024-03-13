<?php

use \Etn\Utils\Helper;

defined('ABSPATH') || exit;

$event_options = get_option("etn_event_options");
$data = Helper::single_template_options($single_event_id);

$event_btn_text = get_theme_mod('event_btn_text', __('Enroll Now', 'facontech'));
$event_btn_link = get_theme_mod('event_btn_link', __('#', 'facontech'));

?>
<div class="event__sidebar-widget white-bg mb-20">

    <div class="event__info">
        <div class="event__info-content mb-35">
            <ul>

                <?php
                // event date
                if (!isset($event_options["etn_hide_date_from_details"])):
                    $separate = !empty($data['event_end_date']) ? ' - ' : '';
                    ?>
                    <li class="d-flex align-items-center">
                        <div class="event__info-icon">
                            <span>
                                <i class="fal fa-calendar-alt"></i>
                            </span>

                        </div>
                        <div class="event__info-item">
                            <h5><span>
                                    <?php echo esc_html__('End', 'facontech'); ?> :
                                </span>
                                <?php echo esc_html($data['event_end_date']); ?>
                            </h5>
                        </div>
                    </li>
                <?php endif; ?>

                <?php
                // event time
                if (!isset($event_options["etn_hide_time_from_details"]) && (!empty($data['event_start_time']) || !empty($data['event_end_time']))):
                    $separate = !empty($data['event_end_time']) ? ' - ' : '';
                    ?>
                    <li class="d-flex align-items-center">
                        <div class="event__info-icon">
                            <span>
                                <i class="fa-light fa-clock"></i>
                            </span>
                        </div>
                        <div class="event__info-item">
                            <h5><span>
                                    <?php echo esc_html__('Time', 'facontech'); ?> :
                                </span>
                                <?php echo esc_html($data['event_start_time'] . $separate . $data['event_end_time']); ?>
                            </h5>
                        </div>
                    </li>
                <?php endif; ?>

                <?php
                if (!class_exists('Wpeventin_Pro') || get_post_meta($single_event_id, 'etn_event_location_type', true) != 'new_location'):
                    if (!isset($event_options["etn_hide_location_from_details"]) && !empty($data['etn_event_location']))
                        ;
                    ?>
                    <li class="d-flex align-items-center">
                        <div class="event__info-icon">
                            <span>
                                <i class="fa-light fa-location-dot"></i>
                            </span>
                        </div>
                        <div class="event__info-item">
                            <h5><span>
                                    <?php echo esc_html__('Venue', 'facontech'); ?> :
                                </span>
                                <?php echo esc_html($data['etn_event_location']); ?>
                            </h5>
                        </div>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

        <?php if (!empty($event_btn_text)): ?>
            <div class="event__join-btn">
                <a href="<?php echo esc_url($event_btn_link); ?>" class="tp-btn text-center w-100">
                    <?php echo tp_kses($event_btn_text); ?> <i class="far fa-arrow-right"></i>
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>