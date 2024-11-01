<? if($pos=='free-form'): ?>
<div class="wpcm-preview-display wpcm-free-form">
	<ul data-wpcm-item-id="<?=$wpcm_edit_item->idx?>" class="wpcm-preview-menu">
		<li class="wpcm-link-opener"><a class="wpcm-open-links" href="#">+</a></li>
		<? if (isset($wpcm_edit_item) && !empty($wpcm_edit_links)): ?>
		<? foreach ($wpcm_edit_links as $wpcm_edit_data_link): ?>
		<li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="<?= $wpcm_edit_data_link->link_url; ?>"><img
						class="wpcm-link-img"
						src="<?=$wpcm_edit_data_link->link_img_url; ?>"/></a>
		</li>
		<? endforeach; ?>
		<? endif; ?>
	</ul>
	<div class="wpcm_hidden_inputs" style="display: none">
		<input value="<?=$wpcm_edit_item->bshadow?>" id="<?=$wpcm_edit_item->idx?>wpcm-bshadow"/>
		<input value="<?=$wpcm_edit_item->radius?>" id="<?=$wpcm_edit_item->idx?>wpcm-circle_radius_prod"/>
		<input value="<?=$wpcm_edit_item->item_diameter?>" id="<?=$wpcm_edit_item->idx?>wpcm-item_diameter_prod"/>
		<input value="<?=$wpcm_edit_item->items_position?>" id="<?=$wpcm_edit_item->idx?>wpcm-direction"/>
		<input value="<?=$wpcm_edit_item->open_close_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-speed"/>
		<input value="<?=$wpcm_edit_item->spread_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_in"/>
		<input value="<?=$wpcm_edit_item->collapse_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_out"/>
		<input value="<?=$wpcm_edit_item->show_effect?>" <? echo($wpcm_edit_item->show_effect_extra !='')? 'data-extra="'.$wpcm_edit_item->show_effect_extra.'"':''; ?> id="<?=$wpcm_edit_item->idx?>wpcm-transition_function"/>
		<input value="<?=$wpcm_edit_item->trigger_type?>" id="<?=$wpcm_edit_item->idx?>wpcm-trigger"/>
		<input value="<? echo ($wpcm_edit_item->closed_img != '') ? $wpcm_edit_item->closed_img : plugin_dir_url(dirname(__FILE__)) . 'css/images/trigger_icon.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-closed_img"/>
		<input value="<? echo ($wpcm_edit_item->opened_img != '') ? $wpcm_edit_item->opened_img : plugin_dir_url(dirname(__FILE__)) . 'css/images/trigger_icon_opened.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-opened_img"/>
	</div>
</div>
<? elseif($pos=='top-middle'):?>
<div class="wpcm-preview-display wpcm-top-middle">
	<ul data-wpcm-item-id="<?=$wpcm_edit_item->idx?>" class="wpcm-preview-menu">
		<li class="wpcm-link-opener"><a class="wpcm-open-links" href="#">+</a></li>
		<? if (isset($wpcm_edit_item) && !empty($wpcm_edit_links)): ?>
		<? foreach ($wpcm_edit_links as $wpcm_edit_data_link): ?>
		<li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="<?= $wpcm_edit_data_link->link_url; ?>"><img
						class="wpcm-link-img"
						src="<?=$wpcm_edit_data_link->link_img_url; ?>"/></a>
		</li>
		<? endforeach; ?>
		<? endif; ?>
	</ul>
	<div class="wpcm_hidden_inputs" style="display: none">
		<input value="<?=$wpcm_edit_item->bshadow?>" id="<?=$wpcm_edit_item->idx?>wpcm-bshadow"/>
		<input value="<?=$wpcm_edit_item->radius?>" id="<?=$wpcm_edit_item->idx?>wpcm-circle_radius_prod"/>
		<input value="<?=$wpcm_edit_item->item_diameter?>" id="<?=$wpcm_edit_item->idx?>wpcm-item_diameter_prod"/>
		<input value="<?=$wpcm_edit_item->items_position?>" id="<?=$wpcm_edit_item->idx?>wpcm-direction"/>
		<input value="<?=$wpcm_edit_item->open_close_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-speed"/>
		<input value="<?=$wpcm_edit_item->spread_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_in"/>
		<input value="<?=$wpcm_edit_item->collapse_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_out"/>
		<input value="<?=$wpcm_edit_item->show_effect?>" <? echo($wpcm_edit_item->show_effect_extra !='')? 'data-extra="'.$wpcm_edit_item->show_effect_extra.'"':''; ?> id="<?=$wpcm_edit_item->idx?>wpcm-transition_function"/>
		<input value="<?=$wpcm_edit_item->trigger_type?>" id="<?=$wpcm_edit_item->idx?>wpcm-trigger"/>
		<input value="<? echo ($wpcm_edit_item->closed_img != '') ? $wpcm_edit_item->closed_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-closed_img"/>
		<input value="<? echo ($wpcm_edit_item->opened_img != '') ? $wpcm_edit_item->opened_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon_opened.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-opened_img"/>
	</div>
</div>
<? elseif($pos=='top-left'):?>
<div class="wpcm-preview-display wpcm-top-left">
	<ul data-wpcm-item-id="<?=$wpcm_edit_item->idx?>" class="wpcm-preview-menu">
		<li class="wpcm-link-opener"><a class="wpcm-open-links" href="#">+</a></li>
		<? if (isset($wpcm_edit_item) && !empty($wpcm_edit_links)): ?>
		<? foreach ($wpcm_edit_links as $wpcm_edit_data_link): ?>
		<li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="<?= $wpcm_edit_data_link->link_url; ?>"><img
						class="wpcm-link-img"
						src="<?=$wpcm_edit_data_link->link_img_url; ?>"/></a>
		</li>
		<? endforeach; ?>
		<? endif; ?>
	</ul>
	<div class="wpcm_hidden_inputs" style="display: none">
		<input value="<?=$wpcm_edit_item->bshadow?>" id="<?=$wpcm_edit_item->idx?>wpcm-bshadow"/>
		<input value="<?=$wpcm_edit_item->radius?>" id="<?=$wpcm_edit_item->idx?>wpcm-circle_radius_prod"/>
		<input value="<?=$wpcm_edit_item->item_diameter?>" id="<?=$wpcm_edit_item->idx?>wpcm-item_diameter_prod"/>
		<input value="<?=$wpcm_edit_item->items_position?>" id="<?=$wpcm_edit_item->idx?>wpcm-direction"/>
		<input value="<?=$wpcm_edit_item->open_close_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-speed"/>
		<input value="<?=$wpcm_edit_item->spread_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_in"/>
		<input value="<?=$wpcm_edit_item->collapse_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_out"/>
		<input value="<?=$wpcm_edit_item->show_effect?>" <? echo($wpcm_edit_item->show_effect_extra !='')? 'data-extra="'.$wpcm_edit_item->show_effect_extra.'"':''; ?> id="<?=$wpcm_edit_item->idx?>wpcm-transition_function"/>
		<input value="<?=$wpcm_edit_item->trigger_type?>" id="<?=$wpcm_edit_item->idx?>wpcm-trigger"/>
		<input value="<? echo ($wpcm_edit_item->closed_img != '') ? $wpcm_edit_item->closed_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-closed_img"/>
		<input value="<? echo ($wpcm_edit_item->opened_img != '') ? $wpcm_edit_item->opened_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon_opened.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-opened_img"/>
	</div>
</div>
<? elseif($pos=='top-right'):?>
<div class="wpcm-preview-display wpcm-top-right">
	<ul data-wpcm-item-id="<?=$wpcm_edit_item->idx?>" class="wpcm-preview-menu">
		<li class="wpcm-link-opener"><a class="wpcm-open-links" href="#">+</a></li>
		<? if (isset($wpcm_edit_item) && !empty($wpcm_edit_links)): ?>
		<? foreach ($wpcm_edit_links as $wpcm_edit_data_link): ?>
		<li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="<?= $wpcm_edit_data_link->link_url; ?>"><img
						class="wpcm-link-img"
						src="<?=$wpcm_edit_data_link->link_img_url; ?>"/></a>
		</li>
		<? endforeach; ?>
		<? endif; ?>
	</ul>
	<div class="wpcm_hidden_inputs" style="display: none">
		<input value="<?=$wpcm_edit_item->bshadow?>" id="<?=$wpcm_edit_item->idx?>wpcm-bshadow"/>
		<input value="<?=$wpcm_edit_item->radius?>" id="<?=$wpcm_edit_item->idx?>wpcm-circle_radius_prod"/>
		<input value="<?=$wpcm_edit_item->item_diameter?>" id="<?=$wpcm_edit_item->idx?>wpcm-item_diameter_prod"/>
		<input value="<?=$wpcm_edit_item->items_position?>" id="<?=$wpcm_edit_item->idx?>wpcm-direction"/>
		<input value="<?=$wpcm_edit_item->open_close_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-speed"/>
		<input value="<?=$wpcm_edit_item->spread_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_in"/>
		<input value="<?=$wpcm_edit_item->collapse_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_out"/>
		<input value="<?=$wpcm_edit_item->show_effect?>" <? echo($wpcm_edit_item->show_effect_extra !='')? 'data-extra="'.$wpcm_edit_item->show_effect_extra.'"':''; ?> id="<?=$wpcm_edit_item->idx?>wpcm-transition_function"/>
		<input value="<?=$wpcm_edit_item->trigger_type?>" id="<?=$wpcm_edit_item->idx?>wpcm-trigger"/>
		<input value="<? echo ($wpcm_edit_item->closed_img != '') ? $wpcm_edit_item->closed_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-closed_img"/>
		<input value="<? echo ($wpcm_edit_item->opened_img != '') ? $wpcm_edit_item->opened_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon_opened.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-opened_img"/>
	</div>
</div>
<?else:?>
<div class="wpcm-preview-display wpcm-free-form">
	<ul data-wpcm-item-id="<?=$wpcm_edit_item->idx?>" class="wpcm-preview-menu">
		<li class="wpcm-link-opener"><a class="wpcm-open-links" href="#">+</a></li>
		<? if (isset($wpcm_edit_item) && !empty($wpcm_edit_links)): ?>
		<? foreach ($wpcm_edit_links as $wpcm_edit_data_link): ?>
		<li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="<?= $wpcm_edit_data_link->link_url; ?>"><img
						class="wpcm-link-img"
						src="<?=$wpcm_edit_data_link->link_img_url; ?>"/></a>
		</li>
		<? endforeach; ?>
		<? endif; ?>
	</ul>
	<div class="wpcm_hidden_inputs" style="display: none">
		<input value="<?=$wpcm_edit_item->bshadow?>" id="<?=$wpcm_edit_item->idx?>wpcm-bshadow"/>
		<input value="<?=$wpcm_edit_item->radius?>" id="<?=$wpcm_edit_item->idx?>wpcm-circle_radius_prod"/>
		<input value="<?=$wpcm_edit_item->item_diameter?>" id="<?=$wpcm_edit_item->idx?>wpcm-item_diameter_prod"/>
		<input value="<?=$wpcm_edit_item->items_position?>" id="<?=$wpcm_edit_item->idx?>wpcm-direction"/>
		<input value="<?=$wpcm_edit_item->open_close_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-speed"/>
		<input value="<?=$wpcm_edit_item->spread_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_in"/>
		<input value="<?=$wpcm_edit_item->collapse_speed?>" id="<?=$wpcm_edit_item->idx?>wpcm-step_out"/>
		<input value="<?=$wpcm_edit_item->show_effect?>" <? echo($wpcm_edit_item->show_effect_extra !='')? 'data-extra="'.$wpcm_edit_item->show_effect_extra.'"':''; ?> id="<?=$wpcm_edit_item->idx?>wpcm-transition_function"/>
		<input value="<?=$wpcm_edit_item->trigger_type?>" id="<?=$wpcm_edit_item->idx?>wpcm-trigger"/>
		<input value="<? echo ($wpcm_edit_item->closed_img != '') ? $wpcm_edit_item->closed_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-closed_img"/>
		<input value="<? echo ($wpcm_edit_item->opened_img != '') ? $wpcm_edit_item->opened_img : plugin_dir_url(__FILE__) . 'css/images/trigger_icon_opened.png' ?>" id="<?=$wpcm_edit_item->idx?>wpcm-opened_img"/>
	</div>
</div>
<?endif;?>