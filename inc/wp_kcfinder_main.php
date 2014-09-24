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
                        <a href="#" class="media-menu-item active">图片</a>
                        <a href="#" class="media-menu-item">文件</a>
                    </div>
                </div>
                <div class="media-frame-content" style="left:16px; border-left: 1px solid #ddd; overflow: hidden;">
                    <div style="padding-right: 300px; height: 100%;">
                        <iframe id="kcfinder_frame" src="" style="width:100%; height:100%"></iframe>
                    </div>
                    <div class="media-sidebar">
                        <div class="media-uploader-status" style="display: none;">
                            <h3>正上传</h3>
                        </div>
                    </div>
                </div>
                <div class="media-frame-toolbar" style="left: 300px;">
                    <div class="media-toolbar">
                        <div class="media-toolbar-primary">
                            <a href="#" id="__wp-ae-insert-code"
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
        $(document).ready(function(){
            $('#wp-kcfinder-button').click(function() {
                $('#__wp-kc-add-media-div').show();
                $('#kcfinder_frame').attr('src', kcfindPath);
            });
            $('#__wp-kc-add-media-close').click(function() {
                $('#__wp-kc-add-media-div').hide();
            });
            $('#__wp-kc-insert-media').click(function() {
                send_to_editor(html);
                $('#__wp-kc-add-media-div').hide();
                return false;
            });
        });
    })();
    window.KCFinder = {
        callBack: function(url) {
            console.log(url);
        }
    };
</script>