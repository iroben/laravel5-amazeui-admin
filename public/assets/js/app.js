(function ($) {
    'use strict';

    $(function () {
        var $fullText = $('.admin-fullText');
        $('#admin-fullscreen').on('click', function () {
            $.AMUI.fullscreen.toggle();
        });

        $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function () {
            $.AMUI.fullscreen.isFullscreen ? $fullText.text('关闭全屏') : $fullText.text('开启全屏');
        });

        /*****************************role/actions.blade.php***********************************/
        $(':checkbox[class^=action_]', '#role_actions').click(function () {

            $(':checkbox.action_' + $(this).val(), '#role_actions').prop('checked', $(this).prop('checked'));
        });
        /*****************************role/actions.blade.php***********************************/

    });
})(jQuery);
