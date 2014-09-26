<style type="text/css">
#__wp-kc-add-media-div .form-table td {padding: 0}
#insertedLang {padding: 2px 2px; line-height: 1.75;}
#insertedLang span {white-space: nowrap; padding: 1px 3px; background-color: #ddd; cursor: pointer;}
</style>
<div tabindex="0" id="__wp-kc-add-media-div" class="supports-drag-drop" style="display: none;">
    <div class="media-modal wp-core-ui">
        <a id="__wp-kc-add-media-close" class="media-modal-close" href="#" title="Close"><span
            class="media-modal-icon"></span></a>
        <div class="media-modal-content">
            <div class="media-frame wp-core-ui">
                <div class="media-frame-title" style="left:0">
                    <h1>插入多媒体<span class="dashicons dashicons-arrow-down"></span></h1>
                </div>
                <div class="media-frame-router" style="left: 16px; top: 49px;">
                    <div class="media-router">
                        <a href="#" class="media-menu-item active" id="wp-kcfinder-type-images">图片</a>
                        <a href="#" class="media-menu-item" id="wp-kcfinder-type-files">文件</a>
                        <a href="#" class="media-menu-item" id="wp-kcfinder-type-videos">视频</a>
                        <a href="#" class="media-menu-item" id="wp-kcfinder-type-audios">音乐</a>
                    </div>
                </div>
                <div class="media-frame-content" style="left:16px; border-left: 1px solid #ddd; overflow: hidden;">
                    <div style="padding-right: 300px; height: 100%;">
                        <iframe id="kcfinder_frame" src="" style="width:100%; height:100%"></iframe>
                    </div>
                    <div class="media-sidebar">
                        <div class="media-uploader-status">
                            <h3>附件详情</h3>
                        </div>
                        <label class="setting">
                            <span class="name">URL</span>
                            <input id="wp-kcfinder-url" type="text" value="" readonly="">
                        </label>
                    </div>
                </div>
                <div class="media-frame-toolbar" style="left: 300px;">
                    <div class="media-toolbar">
                        <div class="media-toolbar-primary">
                            <a href="#" id="__wp-kc-insert-media"
                                class="button media-button button-primary button-large media-button-insert"
                                ><?php echo __('Insert into post', 'wp_kf')?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="media-modal-backdrop"></div>
</div>
<script type="text/javascript">    
    (function(){
        var kcfindPath = '<?php echo $this->currentUrl . '/kcfinder' ?>';
        var $ = jQuery;
        $(document).ready(function() {
            var wpKcfinderType = '';
            var selectNode = $('#wp-kcfinder-type-images');

            var setUrl = function() {
                if (wpKcfinderType === '') {
                    wpKcfinderType = 'images';
                }
                $('#kcfinder_frame').attr('src', kcfindPath + '?lang=zh-cn&type=' + wpKcfinderType);
            };

            var makeHtml = function() {
                var url = $('#wp-kcfinder-url').val();
                var html = '';
                var lastIndex = url.lastIndexOf('.');
                var extentname = '';
                if (lastIndex === -1 || lastIndex >= url.length - 3) {
                    extentname = '';
                } else {
                    extentname = url.substring(lastIndex + 1);
                }

                if (wpKcfinderType === 'images') {
                    html = '<img src="' + url + '" class="alignnone" />'
                } else if (wpKcfinderType === 'files') {
                    html = '<a class="download" href="' + url + '" target="_blank">本地下载</a>';
                } else if (extentname.length === 0) {
                    return '';
                } else if (wpKcfinderType === 'videos') {
                    html = '[video width="800" height="450" ' + extentname + '="' + url + '"][/video]';
                } else if (wpKcfinderType === 'audios') {
                    html = '[audio ' + extentname + '="' + url + '"][/audio]'
                }
                return html;
            }

            $('a[id^=wp-kcfinder-type]').click(function(var1, var2) {
                selectNode.removeClass('active');
                selectNode = $(this);
                selectNode.addClass('active');
                var id = selectNode.attr('id');
                wpKcfinderType = id.substring('wp-kcfinder-type-'.length);
                setUrl();
            });

            $('#wp-kcfinder-button').click(function() {
                $('#__wp-kc-add-media-div').show();
                if (wpKcfinderType === '') {
                    setUrl();
                }
            });
            $('#__wp-kc-add-media-close').click(function() {
                $('#__wp-kc-add-media-div').hide();
            });
            $('#__wp-kc-insert-media').click(function() {
                send_to_editor(makeHtml());
                $('#__wp-kc-add-media-div').hide();
                return false;
            });
        });
    })();

    var wpKcfinderUrl = document.getElementById('wp-kcfinder-url');
    window.KCFinder = {
        callBack: function(url) {
            wpKcfinderUrl.value = url;
        }
    };
</script>