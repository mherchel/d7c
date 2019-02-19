/*
 * Logic to load ClippyJS while preserving global jQuery version 1.4.4.
 * @see https://github.com/smore-inc/clippy.js
 *
 * How to use:
 * Clippy will only activate on Apr 1, 2019. It first checks bandwidth (if it can),
 * and checks to make sure that "data saver" isn't enabled. It also checks to
 * make sure the viewport width is greater than 1000px.
 *
 * URL parameters:
 * You can pass in a 'debug' parameter into the URL to output console info on why Clippy is or
 * is not loading.
 * You can pass in a 'showmesomeclippy' parameter to show clippy no matter the date.
 *
 * Example: https://drupal.org?showmesomeclippy&debug
 *
 * Created by the contribution sprint at Florida DrupalCamp (www.fldrupal.camp) with
 * special thanks to Mike Herchel (mherchel), John Tucker, Mike Anello (ultimike), and Jordana Fung (jordana).
 * @see https://photos.app.goo.gl/QveFZvhDaY9KRnoj9
 */
(function() {
  debugMode('Original global jQuery version: ' + window.jQuery.fn.jquery);

  if (loadClippy()) {
    // Preserve jQuery 1.44.
    window.jQueryOld = window.jQuery;

    // If $ is used, preserve that up, too (similar to jQuery no conflict mode).
    if ($ in window) {
      window.$old = window.$
    };

    // Download jQuery 1.7. This overwrites the window.jQuery namespace.
    jQuery.getScript('https://code.jquery.com/jquery-1.7.2.min.js', function() {

      // Once the new version of jQuery is downloaded. Move it over to jQueryNew, and restore the original.
      window.jQueryNew = window.jQuery;
      window.jQuery = window.jQueryOld;

      // Restore the $ if it was in use.
      if ($old in window) {
        window.$ = window.$old
      };

      // Load the Clippy script and then instantiate it! 😎
      jQueryNew.getScript('/sites/all/libraries/clippy-js/build/clippy.js', function() {
        clippy.load('Clippy', runClippyRun);
        debugMode('Final global jQuery version: ' + window.jQuery.fn.jquery);
      });
    });
  }

  /*
   * Logic to determine if Clippy even load ¯\_(ツ)_/¯
   */
  function loadClippy() {
    // Should we show Clippy no matter what?
    if (alwaysShowClippy()) {
      debugMode('"Always show Clippy" enabled.');
      return true;
    }

    // If we can detect the network speed, and we determine it's not fast, we do not load Clippy 😞.
    // We also check if Data Saver is enabled. If it is, we don't load Clippy.
    if (navigator && navigator.connection && navigator.connection.effectiveType) {
      if (navigator.connection.effectiveType != '4g' || navigator.connection.saveData) {
        debugMode('Connection speed not sufficient or data saver enabled.');
        return false;
      }
    }

    // If the window width is not at least 1000px, don't load Clippy 😞.
    if (!matchMedia('(min-width: 1000px)').matches) {
      debugMode('Viewport width to small to load Clippy.')
      return false;
    }

    var date = 'April 01, 2019';
    var startDate = new Date(date + ' 00:00:00');
    var endDate = new Date(date + ' 23:59:59');
    var CurrentDate = new Date();

    // If it's not April fools day, don't load Clippy 😞.
    if (CurrentDate < startDate || CurrentDate > endDate) {
      debugMode('Today\'s not the correct day to load Clippy. Try between\n' + startDate + ' and \n' + endDate + '\nRight now is\n' + CurrentDate);
      return false;
    }

    debugMode('We\'re loading Clippy!');
    return true; // Load Clippy! 😆
  }

  /*
   * Always Show Clippy -- no matter the date.
   *
   * To use, append a 'showmesomeclippy' parameter into the querystring.
   */
  function alwaysShowClippy() {
    var urlSearchParams = (new URL(document.location)).searchParams;
    return urlSearchParams.get('showmesomeclippy') != null;
  }

  /*
   * Are we in debug mode?
   *
   * This will also log any data passed into it.
   */
  function debugMode(params) {
    var urlSearchParams = (new URL(document.location)).searchParams;
    var debug = urlSearchParams.get('debug') != null;

    if (debug && params != 'undefined') {
      console.log(params);
    }

    return debug;
  }

  /*
   * This is where we keep the logic to tell Clippy what to do, and when to do it.
   */
  function runClippyRun(agent) {
    agent.show();
    if (debugMode) {
      agent.speak('Hi! I\'m in debug mode!');
    }
    agent.speak('Have you registered for <a href="https://events.drupal.org/seattle2019">DrupalCon Seattle</a> yet?  😀');
    console.log(agent.animations());
  }
})();
