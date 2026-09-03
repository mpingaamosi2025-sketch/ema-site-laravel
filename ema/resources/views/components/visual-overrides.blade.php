@if($page?->visualOverrides())
  <script type="application/json" id="visual-overrides">@json($page->visualOverrides())</script>
  <script>
    (() => {
      const overrides = JSON.parse(document.getElementById('visual-overrides').textContent);
      overrides.forEach((override) => {
        const element = document.querySelector(override.selector);
        if (!element) return;
        if (override.text !== undefined) element.textContent = override.text;
        if (override.image_path && element.tagName === 'IMG') element.src = @json(asset('storage')) + '/' + override.image_path;
        if (override.background_color) element.style.backgroundColor = override.background_color;
        if (override.text_color) element.style.color = override.text_color;
      });
    })();
  </script>
@endif