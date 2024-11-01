<?php
define('WPCM_VERSION_TYPE', 'trial');
if (isset($_GET['wpcm_edit_bubble'])) {
    /** load for edit */
    $wpcm_data_edit = wpcm_load_for_edit($_GET['wpcm_edit_bubble']);
    $wpcm_edit_item = $wpcm_data_edit['item'];
    $wpcm_edit_links = $wpcm_data_edit['links'];
}

?>
<div id="wpcm-editor-custom" class="wpcm-main-container">
<div
    class="wpcm-pull-left wpcm-section-title"><?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) ? 'Editing Existing Preview' : 'New Item Preview'); ?></div>
<div id="wpcm_promo" class="wpcm-pull-right">
    <?php if (WPCM_VERSION_TYPE == 'trial'): ?>
        <div class="wpcm_promo_upgrade wpcm-pull-left">
            <a target="_blank" href="http://wpbubblemenu.com/go-pro/">UPGRADE NOW</a>
        </div>
    <?php else: ?>
        <div class="wpcm_promo_upgrade wpcm-pull-left">
            <a class="wpcm-ho-hover">PRO Version - Thank You!</a>
        </div>
    <?php endif; ?>
    <ul class="wpcm-pull-right">
        <li><a href="admin.php?page=wp_bubble_menu">Start Over</a></li>
        <li><a target="_blank" href="http://webtricksandtreats.com">News</a></li>
        <li><a target="_blank" href="http://wpbubblemenu.com/anspress-2/">Support</a></li>
    </ul>
</div>
<div style="clear: both"></div>
<div id="wpcm-preview-display">
    <ul class="wpcm-preview-menu" id="wpcm-preview-menu">
        <li class="wpcm-link-opener"><a class="wpcm-open-links" href="#">+</a></li>
        <?php if (isset($wpcm_edit_item) && !empty($wpcm_edit_links)): ?>
            <?php foreach ($wpcm_edit_links as $wpcm_edit_data_link): ?>
                <li class="wpcm-link-wrapper"><a class="wpcm-each-link"
                                                 href="<?php echo $wpcm_edit_data_link->link_url; ?>"><img
                            class="wpcm-link-img"
                            src="<?php echo $wpcm_edit_data_link->link_img_url; ?>"/></a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="#"><img class="wpcm-link-img"
                                                                                  src="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"/></a>
            </li>
            <li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="#"><img class="wpcm-link-img"
                                                                                  src="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"/></a>
            </li>
            <li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="#"><img class="wpcm-link-img"
                                                                                  src="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"/></a>
            </li>
            <li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="#"><img class="wpcm-link-img"
                                                                                  src="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"/></a>
            </li>
        <?php endif; ?>
    </ul>
</div>

<div id="wpcm-properties">
<h3>WP Easy Bubble Menu</h3>

<div class="wpcm-main-plugin-menu">
    <input
        value="<?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) ? $wpcm_edit_item->name : ''); ?>"
        type="text" id="wpcm_creation_name" placeholder="Name your creation"/>

    <div class="wpcm-action-menu">
        <a class="button button-primary wpcm-save-creation">Save</a>
        <a href="/wp-admin/admin.php?page=wp_bubble_menu" class="button wpcm-reload">Start Over</a>
    </div>
</div>
<div class="wpcm-divider-line"></div>
<div class="wpcm-each-property wpcm-aggregated-props">
    <div class="wpcm-pull-left">
        <label class="wpcm-prop-label">Items Show</label>

        <div class="wpcm-prop-container">
            <select id="wpcm-direction" class="wpcm-prop">
                <option
                    <?php
                    echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'top' ?
                        'selected' : ''); ?>
                    value="top">On The Top
                </option>
                <option
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'right' ?
                        'selected' : ''); ?>
                    value="right">On The Right
                </option>
                <option
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'bottom' ?
                        'selected' : ''); ?>
                    value="bottom">On The Bottom
                </option>
                <option
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'left' ?
                        'selected' : ''); ?>
                    value="left">On The Left
                </option>
                <option
                    <?php  echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'top-right' ?
                        'selected' : ''); ?>
                    value="top-right">On The Top/Right
                </option>
                <option
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'top-left' ?
                        'selected' : ''); ?>
                    value="top-left">On The Top/Left
                </option>
                <option
                    <?php  echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'bottom-right' ?
                        'selected' : 'selected'); ?>
                    value="bottom-right">On The Bottom/Right
                </option>
                <option
                    <?php  echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'bottom-left' ?
                        'selected' : ''); ?>
                    value="bottom-left">On The Bottom/Left
                </option>
                <option
                    <?php  echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'top-half' ?
                        'selected' : ''); ?>
                    value="top-half">On The Top/Half
                </option>
                <option
                    <?php  echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'right-half' ?
                        'selected' : ''); ?>
                    value="right-half">On The Right/Half
                </option>
                <option
                    <?php  echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'bottom-half' ?
                        'selected' : ''); ?>
                    value="bottom-half">On The Bottom/Half
                </option>
                <option
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'left-half' ?
                        'selected' : ''); ?>
                    value="left-half">On The Left/Half
                </option>
                <option
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->items_position == 'full' ?
                        'selected' : ''); ?>
                    value="full">All Around
                </option>
            </select>
        </div>
    </div>
    <div class="wpcm-pull-left">
        <label class="wpcm-prop-label">Trigger</label>

        <div class="wpcm-prop-container">
            <select id="wpcm-trigger" class="wpcm-prop">
                <option value="hover"
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->trigger_type == 'hover' ?
                        'selected' : ''); ?>>On Hover
                </option>
                <option value="click"
                    <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->trigger_type == 'click' ?
                        'selected' : ''); ?>>On Click
                </option>
            </select>
        </div>
    </div>
    <div class="wpcm-pull-left">
        <label class="wpcm-prop-label">Show Effect</label>

        <div class="wpcm-prop-container">
            <select id="wpcm-transition_function" class="wpcm-prop">
                <option
                    value="ease" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'ease' ?
                    'selected' : ''); ?>>Ease In
                </option>
                <optgroup label="<?php echo (WPCM_VERSION_TYPE == 'trial') ? ' - Pro Version Only' : ''; ?>">
                    <option
                        value="bounce" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'bounce' ?
                        'selected' : ''); ?>>Bouncing
                    </option>
                    <option
                        value="zoomInDown" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'zoomInDown' ?
                        'selected' : ''); ?> data-extra="zoomOutUp">Drop
                    </option>
                    <option
                        value="zoomInLeft" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'zoomInLeft' ?
                        'selected' : ''); ?> data-extra="zoomOutRight">From Left
                    </option>
                    <option
                        value="zoomInRight" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'zoomInRight' ?
                        'selected' : ''); ?> data-extra="zoomOutLeft">From Right
                    </option>
                    <option
                        value="zoomInUp" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'zoomInUp' ?
                        'selected' : ''); ?> data-extra="zoomOutDown">Rise
                    </option>
                    <option
                        value="rubberBand" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'rubberBand' ?
                        'selected' : ''); ?>>Stretching
                    </option>
                    <option
                        value="wobble" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'wobble' ?
                        'selected' : ''); ?>>Swinging
                    </option>
                    <option
                        value="fadeIn" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'fadeIn' ?
                        'selected' : ''); ?> data-extra="fadeOut">Faded
                    </option>
                    <option
                        value="flip" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'flip' ?
                        'selected' : ''); ?>>Flip
                    </option>
                    <option
                        value="lightSpeedIn" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'lightSpeedIn' ?
                        'selected' : ''); ?> data-extra="lightSpeedOut">Speedy
                    </option>
                    <option
                        value="rotateIn" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'rotateIn' ?
                        'selected' : ''); ?> data-extra="rotateOut">Rolling
                    </option>
                    <option
                        value="rotateInDownLeft" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'rotateInDownLeft' ?
                        'selected' : ''); ?> data-extra="rotateOutDownLeft">Tilt Right
                    </option>
                    <option
                        value="zoomIn" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'zoomIn' ?
                        'selected' : ''); ?> data-extra="zoomOut">Zoom
                    </option>
                    <option
                        value="tada" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == 'tada' ?
                        'selected' : ''); ?> data-extra="fadeOut">Tada
                    </option>
                    <option
                        value="--"  <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item) && $wpcm_edit_item->show_effect == '--' ?
                        'selected' : ''); ?>>None
                    </option>
                </optgroup>
            </select>
        </div>
    </div>
</div>


<div class="wpcm-each-property">
    <label class="wpcm-prop-label">Radius</label>

    <div class="wpcm-prop-container">
        <input value="<?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item->radius) ?
            $wpcm_edit_item->radius : '80'); ?>" type="text" id="wpcm-circle_radius" class="wpcm-prop"/>
    </div>
</div>

<div class="wpcm-each-property">
    <label class="wpcm-prop-label">Bubble Size</label>

    <div class="wpcm-prop-container">
        <input value="<?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item->item_diameter) ?
            $wpcm_edit_item->item_diameter : '30'); ?>" type="text" id="wpcm-item_diameter" class="wpcm-prop"/>

    </div>


    <?php if (WPCM_VERSION_TYPE == 'trial'): ?>
        <span class="wpcm_c_grey wpcm-trial-links-limit"><a target="_blank"
                                                            href="http://wpbubblemenu.com/go-pro/">Upgrade</a> for this feature</span>
    <?php endif; ?>
</div>


<div class="wpcm-each-property">
    <label class="wpcm-prop-label">Open/Close Speed</label>

    <div class="wpcm-prop-container">
        <input value="<?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item->open_close_speed) ?
            $wpcm_edit_item->open_close_speed : '250'); ?>" type="text" id="wpcm-speed" class="wpcm-prop"/>
    </div>
</div>


<div class="wpcm-each-property">
    <label class="wpcm-prop-label">Spread/Collapse Speed</label>

    <div class="wpcm-prop-container">
        <input value="<?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item->spread_speed) ?
            $wpcm_edit_item->spread_speed : '-20'); ?>" type="text" id="wpcm-step_in" class="wpcm-prop"/>
        <input value="<?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item->collapse_speed) ?
            $wpcm_edit_item->collapse_speed : '100'); ?>" type="text" id="wpcm-step_out" class="wpcm-prop"/>
    </div>
</div>

<div class="wpcm-each-property">
    <label class="wpcm-prop-label">Trigger Shadow</label>

    <div class="wpcm-prop-container">
        <input type="radio" name="wpcm-bshadow"
               value="1" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item->bshadow) && $wpcm_edit_item->bshadow == "1" ?
            'checked' : 'checked'); ?>/>
        <label>On</label>
        <input type="radio" name="wpcm-bshadow"
               value="0" <?php echo(isset($_GET['wpcm_edit_bubble']) && isset($wpcm_edit_item->bshadow) && $wpcm_edit_item->bshadow == "0" ?
            'checked' : ''); ?>/>
        <label>Off</label>
    </div>
</div>


<div class="wpcm-each-property">
    <label class="wpcm-prop-label">Trigger Icon</label>

    <?php if (isset($wpcm_edit_item) && !empty($wpcm_edit_links)): ?>
        <div class="wpcm-prop-container wpcm-trigger_icon">
            <div class="wpcm-pull-left wpcm-trigger_icon_closed">
                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden" name="ad_image"
                       value="<?php echo ($wpcm_edit_item->closed_img != '') ? $wpcm_edit_item->closed_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon.png' ?>"/>
                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value="">
                <label>Closed Icon</label>
            </div>
            <div class="wpcm-pull-left wpcm-trigger_icon_opened">
                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden" name="ad_image"
                       value="<?php echo ($wpcm_edit_item->opened_img != '') ? $wpcm_edit_item->opened_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon_opened.png' ?>"/>
                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value="">
                <label>Opened Icon</label>
            </div>
        </div>
    <?php else: ?>
        <div class="wpcm-prop-container wpcm-trigger_icon">
            <div class="wpcm-pull-left wpcm-trigger_icon_closed">
                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden" name="ad_image"
                       value="<?php echo plugin_dir_url(__FILE__); ?>css/images/trigger_icon.png"/>
                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value="">
                <label>Closed Icon</label>
            </div>
            <div class="wpcm-pull-left wpcm-trigger_icon_opened">
                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden" name="ad_image"
                       value="<?php echo plugin_dir_url(__FILE__); ?>css/images/trigger_icon_opened.png"/>
                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value="">
                <label>Opened Icon</label>
            </div>
        </div>
    <?php endif; ?>
    <div style="clear: both;"></div>
    <div class="wpcm-action-menu">
        <a class="button button-primary wpcm-link-menu-set">Set</a>
    </div>
    <div style="clear: both;"></div>
</div>

<input id="wpc_link_type" type="hidden" value="<?php echo isset($wpcm_edit_item) ? $wpcm_edit_item->link_type : '' ?>"/>

<div class="wpcm-each-property">
    <label class="wpcm-prop-label">Links</label>

    <div id="wpcm-tabs-container">
        <ul class="wpcm-tabs-menu">
            <li class="<?php echo isset($_GET['wpcm_edit_bubble']) ? $wpcm_edit_item->link_type == 'custom' ? 'current' : '' : 'current' ?>">
                <a data-mtype="custom"
                   href="#wpcm-tab-1">Custom
                    Links</a></li>
            <li class="<?php echo isset($_GET['wpcm_edit_bubble']) ? $wpcm_edit_item->link_type == 'reuse' ? 'current' : '' : '' ?>">
                <a data-mtype="reuse"
                   href="#wpcm-tab-2">Reuse
                    WP Menu</a></li>
        </ul>
        <div class="tab">
            <div id="wpcm-tab-1"
                 class="wpcm-tab-content <?php echo isset($_GET['wpcm_edit_bubble']) ? $wpcm_edit_item->link_type == 'custom' ? 'current' : '' : '' ?>"
                 style="<?php echo isset($_GET['wpcm_edit_bubble']) ? $wpcm_edit_item->link_type != 'custom' ? 'display:none' : 'display:block' : '' ?>">
                <div
                    class="wpcm-prop-container clearfix">
                    <div class="wpcm-url-inputs">
                        <?php if (WPCM_VERSION_TYPE == 'trial'): ?>
                            <span class="wpcm_c_grey wpcm-trial-links-limit"><a target="_blank"
                                                                                href="http://wpbubblemenu.com/go-pro/">Upgrade</a> Free Version Limit 4</span>
                        <?php endif ?>
                        <?php if (isset($wpcm_edit_item) && !empty($wpcm_edit_links) && $wpcm_edit_item->link_type == 'custom'): ?>
                            <?php foreach ($wpcm_edit_links as $wpcm_edit_data_link): ?>
                                <div class="wpcm-each-link-edit">
                                    <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden"
                                           name="ad_image"
                                           value="<?php echo ($wpcm_edit_data_link->link_img_url != '') ? $wpcm_edit_data_link->link_img_url : plugin_dir_url(__FILE__) . 'css/images/target.png'; ?>"/>
                                    <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button"
                                           value="<?php echo ($wpcm_edit_data_link->link_img_url != '') ? $wpcm_edit_data_link->link_img_url : plugin_dir_url(__FILE__) . 'css/images/target.png'; ?>"/>
                                    <input value="<?php echo $wpcm_edit_data_link->link_url; ?>"
                                           class="wpcm-each-link-edit-item"
                                           type="text" placeholder="Link Url">
                                    <a class="button wpcm-link-menu-remove">-</a>

                                    <div style="clear: both"></div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="wpcm-each-link-edit">
                                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden"
                                       name="ad_image"
                                       value="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"/>
                                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value="">
                                <input class="wpcm-each-link-edit-item" type="text" placeholder="Link Url">
                                <a class="button wpcm-link-menu-remove">-</a>

                                <div style="clear: both"></div>
                            </div>
                            <div class="wpcm-each-link-edit">
                                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden"
                                       name="ad_image"
                                       value="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"//>
                                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value=""/>
                                <input class="wpcm-each-link-edit-item" type="text" placeholder="Link Url">
                                <a class="button wpcm-link-menu-remove">-</a>

                                <div style="clear: both"></div>
                            </div>
                            <div class="wpcm-each-link-edit">
                                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden"
                                       name="ad_image"
                                       value="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"//>
                                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value=""/>
                                <input class="wpcm-each-link-edit-item" type="text" placeholder="Link Url">
                                <a class="button wpcm-link-menu-remove">-</a>

                                <div style="clear: both"></div>
                            </div>
                            <div class="wpcm-each-link-edit">
                                <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden"
                                       name="ad_image"
                                       value="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"//>
                                <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" value=""/>
                                <input class="wpcm-each-link-edit-item" type="text" placeholder="Link Url">
                                <a class="button wpcm-link-menu-remove">-</a>

                                <div style="clear: both"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="wpcm-url-menu wpcm-action-menu">
                        <a class="button button-primary wpcm-link-menu-set">Set</a>
                        <a class="button wpcm-link-menu-add">Add</a>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
            <div id="wpcm-tab-2"
                 class="wpcm-tab-content  <?php echo isset($_GET['wpcm_edit_bubble']) ? $wpcm_edit_item->link_type == 'reuse' ? 'current' : '' : '' ?>"
                 style="<?php echo isset($_GET['wpcm_edit_bubble']) ? $wpcm_edit_item->link_type != 'reuse' ? 'display:none' : 'display:block' : 'display:none' ?>">
                <div class="wpcm-prop-container clearfix">
                    <div class="wpcm-url-inputs-2">
                        <?php if (WPCM_VERSION_TYPE == 'trial'): ?>
                            <span class="wpcm_c_grey wpcm-trial-links-limit"><a target="_blank"
                                                                                href="http://wpbubblemenu.com/go-pro/">Upgrade</a> Free Version Limit 4</span>
                        <?php endif; ?>

                        <?php if (isset($wpcm_edit_item) && !empty($wpcm_edit_links) && $wpcm_edit_item->link_type == 'reuse'): ?>
                            <?php $menu_content = wp_get_nav_menu_items($wpcm_edit_item->menu_id); ?>
                            <?php foreach ($menu_content as $menu_item): ?>
                                <div class="wpcm-each-link-edit">
                                    <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden"
                                           name="ad_image"
                                           value="<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png"/>
                                    <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button"
                                           style="background-image:url('<?php echo plugin_dir_url(__FILE__); ?>css/images/target.png);"
                                           value=""/>
                                    <a href="<?php echo $menu_item->url; ?>" target="=_blank"
                                       class="wpcm-each-link-edit-item wpcm-small-link-text"><?php echo $menu_item->title; ?></a>
                                    <input style="display: none;" class="wpcm-each-link-edit-item" type="text"
                                           value="' + link + '" placeholder="Link Url">

                                    <div style="clear: both"></div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="wpcm-action-menu">
                        <a class="button button-primary wpcm-link-menu-set-2">Set</a>
                    </div>
                    <p>Saved WP Menus</p>
                    <?php if (isset($wpcm_edit_item) && !empty($wpcm_edit_links) && $wpcm_edit_item->link_type == 'reuse'): ?>
                        <?php
                        $menus = get_terms('nav_menu', array('hide_empty' => true));

                        foreach ($menus as $menu) {
                            $selected = $wpcm_edit_item->menu_id == $menu->term_id ? 'Selected' : 'Chose Menu';

                            echo '<p class="each-saved-wp-menu"><span>' . $menu->name . '</span><a id="' . $menu->term_id . '" class="choose-wp-menu pull-right" href="">' . $selected . '</a></p>';
                        }

                        ?>
                    <?php else: ?>
                        <?php
                        $menus = get_terms('nav_menu', array('hide_empty' => true));

                        foreach ($menus as $menu) {

                            echo '<p class="each-saved-wp-menu"><span>' . $menu->name . '</span><a id="' . $menu->term_id . '" class="choose-wp-menu pull-right" href="">Chose Menu</a></p>';
                        }

                        ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<input type="hidden" id="wpcm-plugin-url" value="<?php echo plugin_dir_url(__FILE__); ?>"/>

</div>
</div>

<dvi class="wpcm-backdrop"></dvi>