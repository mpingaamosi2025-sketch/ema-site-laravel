<style>
  body:not(.login-page):not(.auth-page) input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="hidden"]),
  body:not(.login-page):not(.auth-page) textarea {
    background-color: #fff !important;
  }
</style>
@if($page?->visualOverrides())
  <script type="application/json" id="visual-overrides">@json($page->visualOverrides())</script>
  <script>
    (() => {
      const overrides = JSON.parse(document.getElementById('visual-overrides').textContent);
      overrides.forEach((override) => {
        const element = document.querySelector(override.selector);
        if (!element) return;
        if (override.text) element.textContent = override.text;
        if (Object.prototype.hasOwnProperty.call(override, 'placeholder') && element.matches('input, textarea')) {
          element.setAttribute('placeholder', override.placeholder);
        }
        if (override.image_path && element.tagName === 'IMG') element.src = @json(asset('storage')) + '/' + override.image_path;
      });
    })();
  </script>
@endif