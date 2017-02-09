/**
 * Created by RandyZhang on 2016/12/30.
 */
(function ($) {
    $(function () {
        // 定义变量
        var $window = $(window),
            $body = $('body'),
            $wrapper = $('#page-wrapper'),
            $header = $('#header');
        // 页面加载时禁用animations和transitions
        $body.addClass('is-loading');

        $window.on('load', function () {
            window.setTimeout(function () {
                // 0.1s后移除is-loading，也就是启用动画效果
                $body.removeClass('is-loading');
            }, 100)
        });

        // Menu，当点击bodymenu不消失时注意检查body的高度是否满屏
        $('#menu').append('<a href="#menu" class = "close"></a>')
            .appendTo($body)
            .panel({
                delay: 500,
                hideOnClick: true,
                hideOnSwipe: true,
                resetScroll: true,
                resetForm: true,
                hideOnEscape: true,
                side: 'right',
                target: $body,
                visibleClass: 'is-menu-visible'
            });
    })
})(jQuery);