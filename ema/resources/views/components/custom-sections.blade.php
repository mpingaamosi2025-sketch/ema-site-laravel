@php($customSections = $page?->value('custom_sections', []) ?? [])

@if(count($customSections))
  <section class="custom-content-section section">
    <div class="container">
      @foreach($customSections as $section)
        <div class="custom-content-block" data-cms-key="page.{{ $page->slug }}.custom_sections.{{ $section['id'] }}" data-section-id="{{ $section['id'] }}">
          @if($section['title'] ?? '')
            <h2>{{ $section['title'] }}</h2>
          @endif
          @if($section['body'] ?? '')
            @foreach(preg_split('/\R{2,}/', $section['body']) as $paragraph)
              <p>{{ $paragraph }}</p>
            @endforeach
          @endif
        </div>
      @endforeach
    </div>
  </section>
@endif
