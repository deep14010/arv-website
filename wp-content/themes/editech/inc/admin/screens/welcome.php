<?php
/**
 * @var Editech_Theme_Admin $this
 * @var string $welcome
 */
$theme = wp_get_theme();
$this->get_tab_menu();


$data = array(
    'memory_limit'   => wp_convert_hr_to_bytes(@ini_get('memory_limit')),
    'time_limit'     => ini_get('max_execution_time'),
    'max_input_vars' => ini_get('max_input_vars'),
);

$status = array(
    'fs'              => (WP_Filesystem()) ? true : false,
    'zip'             => class_exists('ZipArchive'),
    'suhosin'         => extension_loaded('suhosin'),
    'memory_limit'    => $data['memory_limit'] >= 268435456,
    'time_limit'      => (($data['time_limit'] >= 180) || ($data['time_limit'] == 0)) ? true : false,
    'max_input_vars'  => $data['max_input_vars'] >= 5000,
    'plugin_required' => $this->get_plugins_require_count() > 0
);

?>
<div class="opal-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-import box-shadow mb-30">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 d-flex align-items-center">
                            <div class="row">
                                <div class="col-lg-5 col-md-12">
                                    <div>
                                        <h3 class="large-title c-primary"><?php esc_html_e('Import Demo', 'editech') ?></h3>
                                        <?php if ($status['plugin_required']) { ?>
                                            <p class="text-description"><?php esc_html_e('Please check and make sure that all required plugins are set up on your website', 'editech') ?></p>
                                            <a href="<?php echo esc_url(admin_url('admin.php?page=lexus-theme-plugins')); ?>"
                                               class="opal-btn-primary"><?php esc_html_e('Install Plugins', 'editech') ?></a>
                                        <?php } else { ?>
                                            <p class="text-description"><?php esc_html_e('Clone a demo site in few clicks', 'editech') ?></p>
                                            <a href="<?php echo esc_url(admin_url('admin.php?page=pt-one-click-demo-import')); ?>"
                                               class="opal-btn-primary"><?php esc_html_e('Run Importer', 'editech') ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <img class="mw-100 pr-lg-3" src="<?php echo esc_url($theme->get_screenshot()); ?>"
                                         alt="Screenshots">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 bl-lg-so-1 d-flex align-items-center">
                            <div class="pl-lg-2">
                                <h2 class="medium-title pb-3 mt-lg-0"><?php esc_html_e('System Status', 'editech') ?></h2>
                                <table class="table-check-status">
                                    <tbody>
                                    <tr>
                                        <td><?php esc_html_e('WP File System', 'editech') ?></td>
                                        <td>
                                            <span class="<?php echo esc_attr($status['fs'] ? 'pass' : 'fail') ?>"></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e('ZipArchive', 'editech') ?></td>
                                        <td>
                                            <span class="<?php echo esc_attr($status['zip'] ? 'pass' : 'fail') ?>"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <?php esc_html_e('PHP Memory Limit', 'editech') ?> </td>
                                        <td>
                                            <span class="<?php echo esc_attr($status['memory_limit'] ? 'pass' : 'fail') ?>"></span>
                                        </td>
                                        <td><?php echo size_format($data['memory_limit']); ?></td>
                                    </tr>
                                    <?php if ($status['memory_limit']) { ?>
                                        <tr>
                                            <td colspan="3" class="status-messenger">
                                                <span class="status-rerequired"><?php echo sprintf(__('Current memory limit is OK, however %s is recommended.', 'editech'), '<u>256 MB</u>'); ?></span>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="3" class="status-messenger">
                                                <span class="status-rerequired"><?php echo sprintf(__('Minimum %1$s is required, %2$s is recommended.', 'editech'), '<u>128 MB</u>', '<u>256 MB</u>'); ?> </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td> <?php esc_html_e('PHP Time Limit ', 'editech') ?> </td>
                                        <td>
                                            <span class="<?php echo esc_attr($status['time_limit'] ? 'pass' : ($data['time_limit'] >= 60 ? 'warning' : 'fail')); ?>"></span>
                                        </td>
                                        <td><?php echo esc_html($data['time_limit']); ?></td>
                                    </tr>
                                    <?php if ($data['time_limit'] < 60) { ?>
                                        <tr>
                                            <td colspan="3" class="status-messenger">
                                                <span class="status-rerequired"><?php echo sprintf(__('Minimum %1$s is required, %2$s is recommended.', 'editech'), '<u>60</u>', '<u>180</u>'); ?> </span>
                                            </td>
                                        </tr>
                                    <?php } elseif ($data['time_limit'] < 180) { ?>
                                        <tr>
                                            <td colspan="3" class="status-messenger">
                                                <span class="status-rerequired"><?php echo sprintf(__('Current time limit is OK, however %s is recommended.', 'editech'), '<u>180</u>'); ?> </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td><?php esc_html_e('PHP Max Input Vars', 'editech'); ?> </td>
                                        <td>
                                            <span class="<?php echo esc_attr($status['max_input_vars'] ? 'pass' : 'fail') ?>"></span>
                                        </td>
                                        <td><?php echo esc_html($data['max_input_vars']) ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 text-center">
                <div class="box-content box-shadow mb-30">
                    <img class="img-auto"
                         src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/support.png')); ?>"
                         title="wp opal">
                    <h3><?php esc_html_e('Support Cover', 'editech') ?></h3>
                    <p><?php esc_html_e('We’ll give you a reply within 24 hours except during weekends.', 'editech') ?></p>
                    <div class="box-footer">
                        <a href="https://themelexus.ticksy.com/" target="_blank"
                           class="opal-btn-secondary mt-4"><?php esc_html_e('Submit Ticket', 'editech') ?></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 text-center">
                <div class="box-content box-shadow">
                    <img class="img-auto"
                         src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/documentation.png')); ?>"
                         title="wp opal">
                    <h3><?php esc_html_e('Documentation', 'editech') ?></h3>
                    <p><?php esc_html_e('Read all documentation for our themes. Any questions or training needed for WordPress themes can be  found here.', 'editech') ?></p>
                    <div class="box-footer">
                        <a href="<?php echo esc_url('http://wpdocs.gitbook.io/editech') ?>" class="opal-btn-primary mt-4"><?php esc_html_e('Explore Now', 'editech') ?></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 text-center">
                <div class="box-content box-shadow">
                    <img class="img-auto"
                         src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/information.png')); ?>"
                         title="wp opal">
                    <h3><?php esc_html_e('Our Information', 'editech') ?></h3>
                    <p><?php esc_html_e('Checkout our site and social for more information.', 'editech') ?></p>
                    <a href="https://www.wpopal.com/"
                       class="mb-3"><?php esc_html_e('www.wpopal.com', 'editech'); ?></a>
                    <div class="box-footer social">
                        <ul class="list-social">
                            <li>
                                <a href="https://themeforest.net/user/themelexus/portfolio">
                                    <img src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/social/evanto.png')); ?>"
                                         alt="Envato">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/themelexus/">
                                    <img src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/social/facebook.png')); ?>"
                                         alt="Facebook">
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/themelexus">
                                    <img src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/social/twiter.png')); ?>"
                                         alt="Tweeter">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCEVKfaT81jFq4HE1Yky99GA">
                                    <img src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/social/youtube.png')); ?>"
                                         alt="Youtube">
                                </a>
                            </li>
                            <li>
                                <a href="mailto:themelexus@gmail.com">
                                    <img src="<?php echo esc_url(get_theme_file_uri('inc/admin/images/social/email.png')); ?>"
                                         alt="Email">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
