/**
 *
 * @author: Enmanuel Corvo
 */

(function (setScope) {
    setScope(window.jQuery, window, document);
}(function ($, window, document) {
    wpCircleMenuMain = this.wpCircleMenuMain || {};
    $(function () {
        'use strict';
        wpCircleMenuMain = {

            init: function () {
                wpCircleMenuMain.menuType = $('#wpc_link_type').val();
                wpCircleMenuMain.menuId = '';
                wpCircleMenuMain.tabs();
                wpCircleMenuMain.pickMenu();
                var initSettings = {
                    circle_radius: $('#wpcm-circle_radius').val(),
                    item_diameter: $('#wpcm-item_diameter').val(),
                    direction: $('#wpcm-direction').val(),
                    speed: $('#wpcm-speed').val(),
                    step_in: $('#wpcm-step_in').val(),
                    step_out: $('#wpcm-step_out').val(),
                    transition_function: $('#wpcm-transition_function').val(),
                    trigger: $('#wpcm-trigger').val(),
                    closedImg: $('.wpcm-trigger_icon_closed .wpcm_upload_image_input').val(),
                    openedImg: $('.wpcm-trigger_icon_opened .wpcm_upload_image_input').val()
                }
                if (typeof($('#wpcm-transition_function option:selected').data('extra')) != 'undefined') {
                    initSettings.transition_function_extra = $('#wpcm-transition_function option:selected').data('extra');
                }
                $('#wpcm-preview-menu').circleMenu(initSettings);
                wpCircleMenuMain.propListeners();
                wpCircleMenuMain.previewLinkImages();
                wpCircleMenuMain.uploadImage();
                wpCircleMenuMain.mainMenuActions();
                var shadowStatus = $('input[name=wpcm-bshadow]:checked').val();
                if (shadowStatus == '0') {
                    $('.wpcm-link-opener').css('box-shadow', 'none');
                }
            },

            flashScreen: function () {
                setTimeout(function () {
                    $('.wpcm-backdrop').show();
                }, 300);
                setTimeout(function () {
                    $('.wpcm-backdrop').hide();
                }, 400);
                setTimeout(function () {
                    $('.wpcm-backdrop').show();
                }, 500);
                setTimeout(function () {
                    $('.wpcm-backdrop').hide();
                }, 600);
            },

            pickMenu: function () {

                $('.wpcm-link-menu-set-2').on('click', function (e) {
                    e.preventDefault();
                    if ($('.wpcm-url-inputs-2 .wpcm-each-link-edit').length == 0) {
                        alert('No links to add. Pick the menu you wish to use from the Saved WP Menus list bellow.');
                    }
                    $('#wpcm-preview-menu .wpcm-link-wrapper').remove();
                    $.each($('.wpcm-url-inputs-2 .wpcm-each-link-edit'), function (index, item) {
                        var link = $(item).find('input.wpcm-each-link-edit-item').val();
                        var imageUrl = $(item).find('.wpcm_upload_image_input').val();
                        wpCircleMenuMain.updateLinks(link, imageUrl);
                    });
                    wpCircleMenuMain.flashScreen();
                    wpCircleMenuMain.triggerPropVal();
                    console.log('wpCircleMenuMain.menuId ', wpCircleMenuMain.menuId);
                });
                $('.choose-wp-menu').on('click', function (e) {
                    e.preventDefault();
                    $('.choose-wp-menu').parent('p').removeClass('bm-selected-menu');
                    $(this).parent('p').addClass('bm-selected-menu');
                    $(this).text('Selected');
                    wpCircleMenuMain.menuId = this.id;
                    var data = {
                        action: 'wpcm_get_menu_links',
                        menu_id: this.id
                    };
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: data,
                        success: function (response) {
                            console.log("Resp", response)
                            $(".wpcm-url-inputs-2 .wpcm-each-link-edit").remove();
                            $.each(response, function (index, item) {
                                console.log('item',item);
                                var link = item.url;
                                if ($(".wpcm-url-inputs-2 .wpcm-each-link-edit").length < 4) {
                                    $('.wpcm-url-inputs-2').append('<div class="wpcm-each-link-edit"> <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden" name="ad_image" value="' + $('#wpcm-plugin-url').val() + 'css/images/target.png"/> <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" style="background-image:url(' + $('#wpcm-plugin-url').val() + 'css/images/target.png);" value=""/> ' +
                                        '<a href="' + link + '" target="=_blank" class="wpcm-each-link-edit-item wpcm-small-link-text">' + item.title + '</a>' +
                                        '<input style="display: none;" class="wpcm-each-link-edit-item" type="text" value="' + link + '" placeholder="Link Url"><div style="clear: both"></div> </div>');
                                    wpCircleMenuMain.uploadImage();
                                }
                            });
                        },
                        fail: function (response) {
                            console.log('response ', response)
                        }
                    });
                });
            },

            tabs: function () {
                $(".wpcm-tabs-menu a").click(function (event) {
                    event.preventDefault();
                    $(this).parent().addClass("current");
                    $(this).parent().siblings().removeClass("current");
                    var tab = $(this).attr("href");
                    $(".wpcm-tab-content").not(tab).css("display", "none");
                    $(tab).fadeIn();
                    wpCircleMenuMain.menuType = $(this).data('mtype');
                });
            },
            mainMenuActions: function () {
                $('.wpcm-save-creation').on('click', function (e) {
                    e.preventDefault();
                    //validate
                    if ($('#wpcm_creation_name').val() != '') {
                        //get main icon -trigger button
                        var triggerIconClosed = $('.wpcm-trigger_icon_closed').find('.wpcm_upload_image_input').val();
                        var triggerIconOpened = $('.wpcm-trigger_icon_opened').find('.wpcm_upload_image_input').val();

                        //get links
                        var LinksArr = Array();
                        if (wpCircleMenuMain.menuType == 'custom') {
                            $.each($('.wpcm-url-inputs div.wpcm-each-link-edit'), function (index, item) {
                                var linkImg = $(item).find('.wpcm_upload_image_input').val();
                                var linkUrl = $(item).find('.wpcm-each-link-edit-item').val();
                                LinksArr.push({
                                    img: linkImg,
                                    url: linkUrl
                                })
                            });
                        } else if (wpCircleMenuMain.menuType == 'reuse') {
                            $.each($('.wpcm-url-inputs-2 div.wpcm-each-link-edit'), function (index, item) {
                                var linkImg = $(item).find('.wpcm_upload_image_input').val();
                                var linkUrl = $(item).find('input.wpcm-each-link-edit-item').val();
                                LinksArr.push({
                                    img: linkImg,
                                    url: linkUrl
                                })
                            });
                        }
                        if (typeof($(this).data('extra')) != 'undefined') {
                            data[prop + '_extra'] = $(this).data('extra');
                        }
                        if (typeof($("option:selected", this).data('extra')) != 'undefined') {
                            data[prop + '_extra'] = $("option:selected", this).data('extra');
                        }
                        console.log("wpCircleMenuMain.menuType ", wpCircleMenuMain.menuType);
                        var data = {
                            action: 'wpcm_save_bm',
                            save_settings: {
                                name: $('#wpcm_creation_name').val(),
                                items_position: $('#wpcm-direction').val(),
                                trigger: $('#wpcm-trigger').val(),
                                show_effect: $('#wpcm-transition_function').val(),
                                show_effect_extra: null,
                                radius: $('#wpcm-circle_radius').val(),
                                item_diameter: $('#wpcm-item_diameter').val(),
                                open_close_speed: $('#wpcm-speed').val(),
                                spread_speed: $('#wpcm-step_in').val(),
                                collapse_speed: $('#wpcm-step_out').val(),
                                links: LinksArr,
                                closedImg: $('.wpcm-trigger_icon_closed .wpcm_upload_image_input').val(),
                                openedImg: $('.wpcm-trigger_icon_opened .wpcm_upload_image_input').val(),
                                bshadow: $('input[name=wpcm-bshadow]:checked').val(),
                                link_type: wpCircleMenuMain.menuType,
                                menu_id: wpCircleMenuMain.menuId
                            }
                        };
                        if (typeof($('#wpcm-transition_function option:selected').data('extra')) != 'undefined') {
                            data.save_settings.show_effect_extra = $('#wpcm-transition_function option:selected').data('extra');
                        }
                        $.ajax({
                            url: ajaxurl,
                            type: 'POST',
                            data: data,
                            success: function (response) {
                                if (response.success) {
                                    alert('Successfully Saved!')
                                } else {
                                    alert('Failed to save. Try again.')
                                }
                            },
                            fail: function (response) {
                                console.log('response ', response)
                            }
                        });
                    } else {
                        alert('Name cannot be empty. Please provide a name before saving.')
                    }
                })
            },

            uploadImage: function () {
                $('.wpcm_upload_image_button').off('click');
                //upload image
                $('.wpcm_upload_image_button').on('click', function () {
                    wpCircleMenuMain.uploadImageButton = $(this);
                    wpCircleMenuMain.img_input = $(this).prev('.wpcm_upload_image_input');
                    var formfield = wpCircleMenuMain.img_input.attr('name');
                    tb_show('', 'media-upload.php?TB_iframe=true');
                    return false;
                });

                window.send_to_editor = function (html) {
                    var imageUrl = $('img', html).attr('src');
                    wpCircleMenuMain.img_input.val(imageUrl);
                    wpCircleMenuMain.uploadImageButton.css('background-image', 'url(' + imageUrl + ')');
                    tb_remove();
                }
            },

            previewLinkImages: function () {
                $.each($('.wpcm-each-link-edit'), function (index, item) {
                    var imageUrl = $(item).find('.wpcm_upload_image_input').val();
                    $(item).find('.wpcm-link-img-preview').css('background-image', 'url(' + imageUrl + ')')
                });
                $.each($('.wpcm-trigger_icon > div'), function (index, item) {
                    var imageUrl = $(item).find('.wpcm_upload_image_input').val();
                    $(item).find('.wpcm-link-img-preview').css('background-image', 'url(' + imageUrl + ')')
                });
            },

            propListeners: function () {

                $('.wpcm-delete-item').off('click');
                $('.wpcm-delete-item').on('click', function (e) {
                    var data = {
                        action: 'wpcm_delete_bm',
                        idx: this.id.replace('wpcm_del_', '')
                    }
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: data,
                        success: function (response) {
                            if (response.success) {
                                alert('Successfully Deleted!')
                            } else {
                                alert('Failed to delete. Try again.')
                            }
                        },
                        fail: function (response) {
                            console.log('response ', response)
                        }
                    });
                })
                $('.wpcm-prop').on('change', function (e) {
                    e.preventDefault();
                    wpCircleMenuMain.triggerPropVal();
                });

                $('input[name=wpcm-bshadow]').on('change', function (e) {
                    e.preventDefault();
                    wpCircleMenuMain.triggerPropVal();
                });

                $('.wpcm-link-menu-add').on('click', function (e) {
                    e.preventDefault();
                    if ($(".wpcm-url-inputs .wpcm-each-link-edit").length < 4) {
                        $('.wpcm-url-inputs').append('<div class="wpcm-each-link-edit"> <input class="wpcm_upload_image_input" type="hidden" size="36" class="hidden" name="ad_image" value="' + $('#wpcm-plugin-url').val() + 'css/images/target.png"/> <input class="wpcm_upload_image_button wpcm-link-img-preview" type="button" style="background-image:url(' + $('#wpcm-plugin-url').val() + 'css/images/target.png);" value=""/> <input class="wpcm-each-link-edit-item" type="text" placeholder="Link Url"><a class="button wpcm-link-menu-remove">-</a><div style="clear: both"></div> </div>');
                        wpCircleMenuMain.uploadImage();
                    }
                });
                $('.wpcm-link-menu-remove').on('click', function (e) {
                    e.preventDefault();
                    if ($('.wpcm-url-inputs .wpcm-each-link-edit').length > 1) {
                        $(this).parent().remove();
                    }
                });
                $('.wpcm-link-menu-set').on('click', function (e) {
                    e.preventDefault();
                    $('#wpcm-preview-menu .wpcm-link-wrapper').remove();
                    $.each($('.wpcm-url-inputs .wpcm-each-link-edit'), function (index, item) {
                        var link = $(item).find('.wpcm-each-link-edit-item').val();
                        var imageUrl = $(item).find('.wpcm_upload_image_input').val();
                        wpCircleMenuMain.updateLinks(link, imageUrl);
                    });
                    wpCircleMenuMain.flashScreen();
                    wpCircleMenuMain.triggerPropVal();
                });

            },

            updateLinks: function (link, imageUrl) {
                console.log('linklinklinklink',link);
                $('#wpcm-preview-menu').append('<li class="wpcm-link-wrapper"><a class="wpcm-each-link" href="' + link + '"><img class="wpcm-link-img"src="' + imageUrl + '"/></a></li>');
            },

            triggerPropVal: function () {

                var data = {};
                $.each($('.wpcm-prop'), function (index, item) {
                    console.log('item',item);
                    var val = $(item).val();
                    var prop = item.id.replace('wpcm-', '');
                    if ($.isNumeric(val)) {
                        val = parseInt(val);
                    }
                    if (typeof($(this).data('extra')) != 'undefined') {
                        data[prop + '_extra'] = $(this).data('extra');
                    }
                    if (typeof($("option:selected", this).data('extra')) != 'undefined') {
                        data[prop + '_extra'] = $("option:selected", this).data('extra');
                    }
                    data[prop] = val;
                });
                data.closedImg = $('.wpcm-trigger_icon_closed .wpcm_upload_image_input').val();
                data.openedImg = $('.wpcm-trigger_icon_opened .wpcm_upload_image_input').val();
                $('#wpcm-preview-menu').circleMenu(data, true);
                var shadowStatus = $('input[name=wpcm-bshadow]:checked').val();
                if (shadowStatus == '0') {
                    $('.wpcm-link-opener').css('box-shadow', 'none');
                }
            }

        }
        wpCircleMenuMain.init();
    });
}))
;