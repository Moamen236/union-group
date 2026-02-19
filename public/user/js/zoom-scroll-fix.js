/**
 * Keep scroll position when user zooms (browser zoom).
 * Saves position on scroll; on resize (zoom) restores it every frame for 2s.
 */
(function () {
    'use strict';
    var savedScrollX = 0;
    var savedScrollY = 0;
    var restoring = false;
    var until = 0;

    function save() {
        if (restoring) return;
        savedScrollX = window.scrollX || window.pageXOffset;
        savedScrollY = window.scrollY || window.pageYOffset;
    }
    function restore() {
        window.scrollTo(savedScrollX, savedScrollY);
    }
    function onResize() {
        until = Date.now() + 2000;
        if (restoring) return;
        restoring = true;
        function tick() {
            restore();
            if (Date.now() < until) requestAnimationFrame(tick);
            else restoring = false;
        }
        requestAnimationFrame(tick);
    }
    function onScroll() {
        save();
    }

    if (window.addEventListener) {
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onResize, false);
    }
    if (window.visualViewport && window.visualViewport.addEventListener) {
        window.visualViewport.addEventListener('resize', onResize, false);
    }
    save();
})();
