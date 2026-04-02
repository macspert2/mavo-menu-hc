/**
 * Mavo Menu HC — menu.js
 * Handles: mobile toggle, desktop hover-intent, click-outside, ESC.
 * No jQuery. ~80 lines.
 */
(function () {
  'use strict';

  var DELAY   = 150; // ms hover-intent delay (desktop)
  var timers  = new WeakMap();
  var isMobile = function () { return window.innerWidth <= 959; };

  /* ── Mobile toggle ─────────────────────────────────────────── */
  function initToggle() {
    var btn = document.querySelector('.mavo-toggle');
    var nav = document.getElementById('mavo-nav');
    if (!btn || !nav) return;

    btn.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  /* ── Desktop hover-intent ──────────────────────────────────── */
  function hoverOpen(el) {
    clearTimeout(timers.get(el));
    timers.set(el, setTimeout(function () {
      closeAll();
      el.classList.add('is-active');
      var trigger = el.querySelector(':scope > .mavo-link, :scope > .mavo-link-icon');
      if (trigger) trigger.setAttribute('aria-expanded', 'true');
    }, DELAY));
  }

  function hoverClose(el) {
    clearTimeout(timers.get(el));
    timers.set(el, setTimeout(function () {
      el.classList.remove('is-active');
      var trigger = el.querySelector(':scope > .mavo-link, :scope > .mavo-link-icon');
      if (trigger) trigger.setAttribute('aria-expanded', 'false');
    }, DELAY));
  }

  function initHover() {
    var items = document.querySelectorAll(
      '.mavo-has-fly, .mavo-has-mega, .mavo-item-search'
    );
    items.forEach(function (el) {
      el.addEventListener('mouseenter', function () { if (!isMobile()) hoverOpen(el); });
      el.addEventListener('mouseleave', function () { if (!isMobile()) hoverClose(el); });
    });

    // L2 sub-flyouts (CSS-driven on desktop, JS-toggled on mobile)
    var sub2Items = document.querySelectorAll('.mavo-has-fly2');
    sub2Items.forEach(function (el) {
      el.addEventListener('mouseenter', function () { if (!isMobile()) el.classList.add('is-active'); });
      el.addEventListener('mouseleave', function () { if (!isMobile()) el.classList.remove('is-active'); });
    });
  }

  /* ── Mobile click-to-toggle ────────────────────────────────── */
  function initMobileClick() {
    // All direct children of toggleable items that act as the click trigger
    var triggers = document.querySelectorAll(
      '.mavo-has-fly > .mavo-link,' +
      '.mavo-has-mega > .mavo-link,' +
      '.mavo-item-search > .mavo-link-icon,' +
      '.mavo-has-fly2 > a'
    );
    triggers.forEach(function (trigger) {
      trigger.addEventListener('click', function (e) {
        if (!isMobile()) return;
        var item = trigger.parentElement;
        var wasActive = item.classList.contains('is-active');
        // Close siblings at the same level
        if (item.parentElement) {
          item.parentElement.querySelectorAll(':scope > .is-active').forEach(function (s) {
            if (s !== item) s.classList.remove('is-active');
          });
        }
        item.classList.toggle('is-active', !wasActive);
        // If item has a real navigable URL and was already open: allow navigation
        var href = trigger.getAttribute('href');
        if (!wasActive && href && href !== '#') e.preventDefault();
      });
    });
  }

  /* ── Close all open menus ──────────────────────────────────── */
  function closeAll() {
    document.querySelectorAll('.mavo-item.is-active, .mavo-sub-item.is-active, .mavo-has-fly2.is-active')
      .forEach(function (el) { el.classList.remove('is-active'); });
  }

  /* ── Click outside ─────────────────────────────────────────── */
  function initClickOutside() {
    document.addEventListener('click', function (e) {
      var nav = document.getElementById('mavo-nav');
      if (nav && !nav.contains(e.target)) closeAll();
    });
  }

  /* ── ESC key ───────────────────────────────────────────────── */
  function initEsc() {
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeAll();
    });
  }

  /* ── Boot ──────────────────────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', function () {
    initToggle();
    initHover();
    initMobileClick();
    initClickOutside();
    initEsc();
  });
}());
