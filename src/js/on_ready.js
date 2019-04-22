export function onReady (callback) {
  if (document.readyState != 'loading') {
    callback();
  } else {
    document.addEventListener("DOMContentLoaded",function() {
      callback();
    });
  }
}