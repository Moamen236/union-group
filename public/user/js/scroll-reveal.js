/**
 * Scroll reveal: add .is-visible to .reveal-on-scroll when section enters viewport.
 * Uses Intersection Observer for performance.
 */
(function () {
    'use strict';

    if (typeof window.IntersectionObserver === 'undefined') {
        /* Fallback: show all sections if no IntersectionObserver (old browsers) */
        var sections = document.querySelectorAll('.reveal-on-scroll');
        for (var i = 0; i < sections.length; i++) {
            sections[i].classList.add('is-visible');
        }
        return;
    }

    var observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            root: null,
            rootMargin: '0px 0px -80px 0px', /* trigger when 80px from bottom of viewport */
            threshold: 0.1
        }
    );

    function init() {
        var sections = document.querySelectorAll('.reveal-on-scroll');
        sections.forEach(function (el) {
            observer.observe(el);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
