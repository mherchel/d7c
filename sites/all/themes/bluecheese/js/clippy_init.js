if (loadClippy() ) {
  // Preserve jQuery 1.44.
  window.jQueryOld = window.jQuery;

  // If $ is used, preserve that up, too (similar to jQuery no conflict mode).
  if (typeof (window.$) != 'undefined') {
    window.$old = window.$
  };

  // Download jQuery 1.7. This overwrites the window.jQuery namespace.
  jQuery.getScript('https://code.jquery.com/jquery-1.7.2.min.js', function() {

    // Once the new version of jQuery is downloaded. Move that over to jQueryNew, and restore the original.
    window.jQueryNew = window.jQuery;
    window.jQuery = window.jQueryOld;

    // Restore the $ if that was in use.
    if (typeof (window.$old) != 'undefined') {
      window.$ = window.$old
    };

    // Load the Clippy script and then instantiate it! 😎
    jQueryNew.getScript('/sites/all/libraries/clippy-js/build/clippy.js', function() {
      clippy.load('Clippy', runClippyRun);
    });
  });
}

// Should clippy run?

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

  var date = 'February 17, 2019';
  var startDate = new Date(date + ' 00:00:00');
  var endDate = new Date(date + ' 23:59:59');
  var CurrentDate = new Date();

  // If it's not April fools day, don't load Clippy 😞.
  if (CurrentDate < startDate || CurrentDate > endDate) {
    return false;
  }

  return true; // Load Clippy! 😆
}

function runClippyRun(agent) {
  // Do anything with the loaded agent
  agent.show();
  agent.speak('Heya..  😀');
  console.log(agent.animations());
}
