(function () {

    "use strict";

    // Methods/polyfills.

    // classList | (c) @remy | github.com/remy/polyfills | rem.mit-license.org
    /**
     * !开头function ->表示立即执行
     */
    !function () {
        /**
         *  替换文本前与后的空格(^表示开头，$表示结尾，\s+表示一个或多个空格，/g表示全局）
         * @param t
         */
        function t(t) {
            this.el = t;
            var n = t.className.replace(/^\s+|\s+$/g, "").split(/\s+/);
            for (i = 0; i < n.length; i++) {
                e.call(this, n[i])
            }
        }

        /**
         *
         * @param t
         * @param n
         * @param i
         */
        function n(t, n, i) {
            Object.defineProperty ? Object.defineProperty(t, n, {get: i}) : t.__defineGetter__(n, i)
        }

        if (!("undefined" == typeof window.Element || "classList" in document.documentElement)) {
            var i = Array.prototype, e = i.push, s = i.splice, o = i.join;
            t.prototype = {
                add: function (t) {
                    this.contains(t) || (e.call(this, t), this.el.className = this.toString())
                }, contains: function (t) {
                    return -1 != this.el.className.indexOf(t)
                }, item: function (t) {
                    return this[t] || null
                }, remove: function (t) {
                    if (this.contains(t)) {
                        for (var n = 0; n < this.length && this[n] != t; n++);
                        s.call(this, n, 1), this.el.className = this.toString()
                    }
                }, toString: function () {
                    return o.call(this, " ")
                }, toggle: function (t) {
                    return this.contains(t) ? this.remove(t) : this.add(t), this.contains(t)
                }
            }, window.DOMTokenList = t, n(Element.prototype, "classList", function () {
                return new t(this)
            })
        }
    }();

    // canUse
    window.canUse = function (p) {
        if (!window._canUse)window._canUse = document.createElement("div");
        var e = window._canUse.style, up = p.charAt(0).toUpperCase() + p.slice(1);
        return p in e || "Moz" + up in e || "Webkit" + up in e || "O" + up in e || "ms" + up in e
    };

    // window.addEventListener
    (function () {
        if ("addEventListener" in window)return;
        window.addEventListener = function (type, f) {
            window.attachEvent("on" + type, f)
        }
    })();

    // Vars.获取body对象
    var $body = document.querySelector('body');

    // Disable animations/transitions until everything's loaded.
    $body.classList.add('is-loading');

    window.addEventListener('load', function () {
        window.setTimeout(function () {
            $body.classList.remove('is-loading');
        }, 100);
    });

    // Slideshow Background.
    (function () {

        // Settings.Slide show的配置信息
        var settings = {

            // Images (in the format of 'url': 'alignment').
            images: {
                './assets/eventually/images/tl1.jpg': 'center',
                './assets/eventually/images/tl2.jpeg': 'center',
                './assets/eventually/images/tl3.jpg': 'center'
            },

            // Delay.
            delay: 6000

        };

        // Vars.变量定义
        var pos = 0, lastPos = 0,
            $wrapper, $bgs = [], $bg,
            k, v;

        // Create BG wrapper, BGs.
        $wrapper = document.createElement('div');
        $wrapper.id = 'bg';
        $body.appendChild($wrapper);

        for (k in settings.images) {

            // Create BG.
            $bg = document.createElement('div');
            $bg.style.backgroundImage = 'url("' + k + '")';
            $bg.style.backgroundPosition = settings.images[k];
            $wrapper.appendChild($bg);

            // Add it to array.
            $bgs.push($bg);

        }

        // Main loop.
        $bgs[pos].classList.add('visible'); // pos 索引位置图像可见
        $bgs[pos].classList.add('top');     // pos 索引位置图像置顶

        // 对只有一张图片或客户端不支持移动动画做的兼容处理
        if ($bgs.length == 1
            || !canUse('transition'))
            return;

        window.setInterval(function () {

            lastPos = pos;
            pos++;

            // Wrap to beginning if necessary.
            if (pos >= $bgs.length)
                pos = 0;

            // Swap top images.
            $bgs[lastPos].classList.remove('top');
            $bgs[pos].classList.add('visible');
            $bgs[pos].classList.add('top');

            // Hide last image after a short delay.
            window.setTimeout(function () {
                $bgs[lastPos].classList.remove('visible');
            }, settings.delay / 2);

        }, settings.delay);

    })();

    // Signup Form.
    (function () {

        // Vars.
        var $form = document.querySelectorAll('#signup-form')[0],
            $submit = document.querySelectorAll('#signup-form input[type="submit"]')[0],
            $message;

        // Bail if addEventListener isn't supported.
        if (!('addEventListener' in $form))
            return;

        // Message.
        $message = document.createElement('span');
        $message.classList.add('message');
        $form.appendChild($message);

        $message._show = function (type, text) {

            $message.innerHTML = text;
            $message.classList.add(type);
            $message.classList.add('visible');
            // 显示之后3秒自动小时
            window.setTimeout(function () {
                $message._hide();
            }, 3000);

        };

        $message._hide = function () {
            $message.classList.remove('visible');
        };

        // form绑定事件：事件类型，事件处理函数
        $form.addEventListener('submit', function (event) {

            var $username = $('#username').val(),
                $password = $("#password").val();
            console.log("sign up点击");
            // console.log($username);
            event.stopPropagation();
            event.preventDefault();
            // Hide message.
            $message._hide();

            // Disable submit.
            $submit.disabled = true;

            // Process form.
            // Note: Doesn't actually do anything yet (other than report back with a "thank you"),
            // but there's enough here to piece together a working AJAX submission call that does.
            // 设置一个定时器，在定时器到期后执行function函数

            // 跳转到首页
            // window.location.assign("../Welcome/naveToIndex")
            console.log($username);
            console.log($password);
            $.ajax({
                type: "POST",
                url: "../api/User/login",
                dataType: "json",
                data: {
                    username: $username,
                    psw: $password,
                    platform: "android"
                },
                success: function (data) {
                    console.log("访问成功");
                    // window.location.assign("../Welcome/naveToIndex")
                    // alert("访问成功" + JSON.stringify(data));
                    console.log(JSON.stringify(data));
                    if (data.code == 1) {
                        console.log("登录成功");
                        window.location.assign("../Welcome/naveToIndex");
                    } else {
                        console.log("登录失败")
                        $message._show('failure', data.message)
                        // reset() 方法可以重置一个表单内所有的表单控件到初始状态
                        // Enable submit.
                        $submit.disabled = false;
                        $form.reset();
                    }

                },
                error: function (jqXHR) {
                    console.log("发生错误");
                    // window.location.assign("../Welcome/naveToIndex")
                    alert("发生错误" + jqXHR.status);
                }
            });
        });

    })();

})();