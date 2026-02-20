/**
 * Keep scroll position when user zooms (browser zoom) on desktop only.
 * Disabled on touch devices to avoid flicker from address bar/keyboard resize.
 * On desktop, restores scroll a few times after a clear zoom-style resize, not every frame.
 */
(function () {
    'use strict';

    var isTouch = 'ontouchstart' in window || (navigator.maxTouchPoints && navigator.maxTouchPoints > 0);
    if (isTouch) {
        return;
    }

    var savedScrollX = 0;
    var savedScrollY = 0;
    var lastInnerWidth = window.innerWidth;
    var restoreCount = 0;
    var restoreMax = 5;
    var tickId = null;

    function save() {
        savedScrollX = window.scrollX || window.pageXOffset;
        savedScrollY = window.scrollY || window.pageYOffset;
    }

    function restore() {
        window.scrollTo(savedScrollX, savedScrollY);
    }

    function onResize() {
        var w = window.innerWidth;
        var widthChange = Math.abs(w - lastInnerWidth);
        lastInnerWidth = w;
        /* Only react to zoom-like resize: significant width change (e.g. zoom) */
        if (widthChange < 10) return;

        if (tickId) cancelAnimationFrame(tickId);
        restoreCount = 0;

        function tick() {
            restore();
            restoreCount += 1;
            if (restoreCount < restoreMax) {
                tickId = requestAnimationFrame(tick);
            } else {
                tickId = null;
            }
        }
        tickId = requestAnimationFrame(tick);
    }

    function onScroll() {
        save();
    }

    if (window.addEventListener) {
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onResize, false);
    }
    save();
})();
