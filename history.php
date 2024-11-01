<?php $all_wpcm_items = get_wpcm_list(); ?>
<div class="wpcm-main-container">
    <div class="wpcm-pull-left wpcm-section-title">History</div>
    <div style="clear: both;"></div>
    <div class="wpcm-history-list">
        <table id="wpcm-history-table" class="widefat">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date Created</th>
                <th>Last Modified</th>
                <th>Shortcode</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($all_wpcm_items as $wpcm_item): ?>
                <?php
                $d_created = new DateTime($wpcm_item->date_created);
                $d_modified = new DateTime($wpcm_item->last_modified);
                ?>
                <tr>
                    <td><?php echo $wpcm_item->name; ?></td>
                    <td><?php echo $d_created->format('m/d/y h:m A'); ?></td>
                    <td><?php echo $d_modified->format('m/d/y h:m A'); ?></td>
                    <td>[wp_easy_bubble_menu id="<?php echo $wpcm_item->idx; ?>"]</td>
                    <!--                    <td><a class="wpcm_copy_sc" href="#" onclick="window.clipboardData.setData('text', '[wp_easy_bubble_menu  id=".-->
                    <?php //echo $wpcm_item->idx; ?><!--".']');">Copy Shortcode</a></td>-->
                    <td class="wpcm-table-action-menu"><a
                            href="/wp-admin/admin.php?page=wp_bubble_menu&wpcm_edit_bubble=<?php echo $wpcm_item->idx; ?>">Edit</a><a
                            id="wpcm_del_<?php echo $wpcm_item->idx; ?>" class="wpcm-delete-item" href="">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pos-options">
            <h3>Positioning Options</h3>

            <p>Use the following options to position your menu:</p>
            <ul>
                <li>
                    <p><b>free-form</b></p>

                    <p>Positions the menu anywhere you want inside a parent element</p>
                    <em>This is the default position</em>
                </li>
                <li>
                    <p><b>top-middle</b></p>

                    <p>Positions the menu on the Top Middle of the page</p>
                    <em>Example: [wp_easy_bubble_menu id="1" pos="top-middle"]</em>
                </li>
                <li>
                    <p><b>top-left</b></p>

                    <p>Positions the menu on the Top Left corner of the page</p>
                    <em>Example: [wp_easy_bubble_menu id="1" pos="top-left"]</em>
                </li>
                <li>
                    <p><b>top-right</b></p>

                    <p>Positions the menu on the Top Right corner of the page</p>
                    <em>Example: [wp_easy_bubble_menu id="1" pos="top-right"]</em>
                </li>
            </ul>
        </div>
    </div>
</div>