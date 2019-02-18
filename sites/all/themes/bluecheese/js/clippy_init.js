/*
 * Logic to load ClippyJS while preserving global jQuery version 1.4.4.
 * @see https://github.com/smore-inc/clippy.js
 *
 * Created by the contribution sprint at Florida DrupalCamp (www.fldrupal.camp) with
 * special thanks to Mike Herchel (mherchel), John Tucker, Mike Anello (ultimike), and Jordana Fung (jordana).
 * @see https://photos.app.goo.gl/QveFZvhDaY9KRnoj9
 */
(function() {
  if (loadClippy() ) {
    // Preserve jQuery 1.44.
    window.jQueryOld = window.jQuery;

    // If $ is used, preserve that up, too (similar to jQuery no conflict mode).
    if (typeof (window.$) != 'undefined') {
      window.$old = window.$
    };

    // Download jQuery 1.7. This overwrites the window.jQuery namespace.
    jQuery.getScript('https://code.jquery.com/jquery-1.7.2.min.js', function() {

      // Once the new version of jQuery is downloaded. Move it over to jQueryNew, and restore the original.
      window.jQueryNew = window.jQuery;
      window.jQuery = window.jQueryOld;

      // Restore the $ if it was in use.
      if (typeof (window.$old) != 'undefined') {
        window.$ = window.$old
      };

      // Load the Clippy script and then instantiate it! 😎
      jQueryNew.getScript('/sites/all/libraries/clippy-js/build/clippy.js', function() {
        clippy.load('Clippy', runClippyRun);
      });
    });
  }

  /*
   * Logic to determine if Clippy even load ¯\_(ツ)_/¯
   */
  function loadClippy() {
    // If we can detect the network speed, and we determine it's not fast, we do not load Clippy 😞.
    if (navigator && navigator.connection && navigator.connection.effectiveType) {
      if (navigator.connection.effectiveType != '4g') {
        return false;
      }
    }

    // If the window width is not at least 1000px, don't load Clippy 😞.
    if (!matchMedia('(min-width: 1000px)').matches) {
      return false;
    }

    var date = 'February 18, 2019';
    var startDate = new Date(date + ' 00:00:00');
    var endDate = new Date(date + ' 23:59:59');
    var CurrentDate = new Date();

    // If it's not April fools day, don't load Clippy 😞.
    if (CurrentDate < startDate || CurrentDate > endDate) {
      return false;
    }

    return true; // Load Clippy! 😆
  }

  // /*
  //  * Debug mode
  //  */
  // function isDebugMode() {
  //   var urlSearchParams = (new URL(document.location)).searchParams;
  // }

  /*
   * This is where we keep the logic to tell Clippy what to do, and when to do it.
   */
  function runClippyRun(agent) {
    // Do anything with the loaded agent
    agent.show();
    agent.speak('Have you registered for <a href="https://events.drupal.org/seattle2019">DrupalCon Seattle</a> yet?  😀');
    console.log(agent.animations());
  }
})();
