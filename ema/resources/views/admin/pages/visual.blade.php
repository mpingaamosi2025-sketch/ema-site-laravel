<x-layouts.admin :title="'Visual Edit: ' . $page->name">
    <style>
        .visual-editor { display: grid; grid-template-columns: minmax(0, 1fr) 280px; gap: 1rem; min-height: calc(100vh - 150px); }
        .preview-frame { width: 100%; height: calc(100vh - 170px); min-height: 620px; border: 1px solid #dbe3ea; border-radius: 8px; background: #fff; }
        .properties { position: sticky; top: 1rem; align-self: start; }
        .selected-element { outline: 3px solid #1b7f95 !important; outline-offset: 3px; }
        .section-list { max-height: 220px; overflow-y: auto; }
        @media (max-width: 991px) { .visual-editor { grid-template-columns: 1fr; } .properties { position: static; } .preview-frame { height: 70vh; min-height: 520px; } }
    </style>
    <div class="visual-editor">
        <iframe id="website-preview" class="preview-frame" src="{{ $page->slug === 'home' ? route('index') : url('/' . $page->slug) }}" title="Website preview"></iframe>
        <aside class="panel p-3 properties">
            <h3 class="h6">Selected element</h3>
            <p id="empty-properties" class="text-muted small">Click highlighted text in the website preview to edit it.</p>
            <div id="editor-properties" class="d-none">
                <label for="element-value" class="form-label">Text</label>
                <textarea id="element-value" class="form-control" rows="6"></textarea>
                <label for="element-image" class="form-label d-none mt-2">Image</label>
                <input id="element-image" class="form-control d-none" type="file" accept="image/jpeg,image/png,image/webp">
                <div class="row g-2 mt-1">
                    <div class="col-6"><label for="background-color" class="form-label">Background</label><input id="background-color" class="form-control form-control-color w-100" type="color" value="#ffffff"></div>
                    <div class="col-6"><label for="text-color" class="form-label">Text color</label><input id="text-color" class="form-control form-control-color w-100" type="color" value="#000000"></div>
                </div>
                <button id="save-element" type="button" class="btn btn-primary w-100 mt-3">Save change</button>
                <div id="save-status" class="small text-success mt-2"></div>
            </div>
            <div class="border-top mt-3 pt-3">
                <h3 class="h6">Custom sections</h3>
                <p class="text-muted small">Add content blocks without changing the page design.</p>
                <div id="section-list" class="section-list mb-2"></div>
                <input id="section-title" class="form-control mb-2" placeholder="Section heading">
                <textarea id="section-body" class="form-control" rows="4" placeholder="Section content"></textarea>
                <button id="add-section" type="button" class="btn btn-outline-primary w-100 mt-2">Add section</button>
                <div id="section-status" class="small text-success mt-2"></div>
            </div>
            <hr>
            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-outline-secondary btn-sm w-100">Open full editor</a>
        </aside>
    </div>
    <script>
        const frame = document.getElementById('website-preview');
        const emptyProperties = document.getElementById('empty-properties');
        const editorProperties = document.getElementById('editor-properties');
        const elementValue = document.getElementById('element-value');
        const saveButton = document.getElementById('save-element');
        const saveStatus = document.getElementById('save-status');
        const backgroundColor = document.getElementById('background-color');
        const textColor = document.getElementById('text-color');
        const sectionList = document.getElementById('section-list');
        const sectionTitle = document.getElementById('section-title');
        const sectionBody = document.getElementById('section-body');
        const addSectionButton = document.getElementById('add-section');
        const sectionStatus = document.getElementById('section-status');
        let selectedElement = null;

        const elementSelector = (element) => {
            const parts = [];
            while (element && element !== frame.contentDocument.body) {
                let selector = element.tagName.toLowerCase();
                if (element.id) {
                    selector += '#' + CSS.escape(element.id);
                } else {
                    const siblings = Array.from(element.parentElement.children).filter((child) => child.tagName === element.tagName);
                    if (siblings.length > 1) selector += ':nth-of-type(' + (siblings.indexOf(element) + 1) + ')';
                }
                parts.unshift(selector);
                element = element.parentElement;
            }
            return 'body > ' + parts.join(' > ');
        };

        const saveSection = async (action, sectionId = '', title = '', body = '') => {
            const formData = new FormData();
            formData.append('action', action);
            formData.append('section_id', sectionId);
            formData.append('title', title);
            formData.append('body', body);
            return fetch('{{ route('admin.pages.visual.update', $page) }}', {
                method: 'POST',
                headers: {'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: formData
            });
        };

        const renderSectionList = () => {
            sectionList.innerHTML = '';
            frame.contentDocument.querySelectorAll('.custom-content-block').forEach((section) => {
                const item = document.createElement('div');
                item.className = 'd-flex gap-2 align-items-center mb-1';
                item.innerHTML = `<button type="button" class="btn btn-sm btn-outline-secondary flex-grow-1 text-start"></button><button type="button" class="btn btn-sm btn-outline-danger">Delete</button>`;
                item.querySelector('button').textContent = section.querySelector('h2')?.textContent || 'Untitled section';
                item.querySelector('button').addEventListener('click', () => {
                    section.click();
                    sectionTitle.value = section.querySelector('h2')?.textContent || '';
                    sectionBody.value = Array.from(section.querySelectorAll('p')).map((paragraph) => paragraph.textContent).join('\n\n');
                });
                item.querySelector('.btn-outline-danger').addEventListener('click', async () => {
                    if (!(await saveSection('delete-section', section.dataset.sectionId)).ok) return;
                    section.remove();
                    item.remove();
                    sectionStatus.textContent = 'Section deleted';
                });
                sectionList.appendChild(item);
            });
        };

        frame.addEventListener('load', () => {
            const documentBody = frame.contentDocument;
            documentBody.querySelectorAll('body *:not(script):not(style):not(link):not(meta):not(iframe)').forEach((element) => {
                element.addEventListener('click', (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    if (selectedElement) selectedElement.classList.remove('selected-element');
                    selectedElement = element;
                    selectedElement.classList.add('selected-element');
                    if (!selectedElement.dataset.cmsKey) selectedElement.dataset.visualSelector = elementSelector(selectedElement);
                    elementValue.value = selectedElement.textContent.trim();
                    const colors = getComputedStyle(selectedElement);
                    const toHex = (value, fallback) => {
                        const channels = value.match(/\d+/g)?.slice(0, 3);
                        return channels ? '#' + channels.map((channel) => Number(channel).toString(16).padStart(2, '0')).join('') : fallback;
                    };
                    backgroundColor.value = toHex(colors.backgroundColor, '#ffffff');
                    textColor.value = toHex(colors.color, '#000000');
                    if (selectedElement.dataset.sectionId) {
                        sectionTitle.value = selectedElement.querySelector('h2')?.textContent || '';
                        sectionBody.value = Array.from(selectedElement.querySelectorAll('p')).map((paragraph) => paragraph.textContent).join('\n\n');
                    }
                    document.getElementById('element-image').classList.toggle('d-none', selectedElement.tagName !== 'IMG');
                    document.querySelector('label[for="element-image"]').classList.toggle('d-none', selectedElement.tagName !== 'IMG');
                    elementValue.classList.toggle('d-none', selectedElement.tagName === 'IMG');
                    document.querySelector('label[for="element-value"]').classList.toggle('d-none', selectedElement.tagName === 'IMG');
                    emptyProperties.classList.add('d-none');
                    editorProperties.classList.remove('d-none');
                    saveStatus.textContent = '';
                });
            });
            renderSectionList();
        });

        addSectionButton.addEventListener('click', async () => {
            addSectionButton.disabled = true;
            sectionStatus.textContent = 'Saving...';
            const response = await saveSection('add-section', '', sectionTitle.value, sectionBody.value);
            if (response.ok) {
                sectionStatus.textContent = 'Section added. Reload preview to edit it.';
                sectionTitle.value = '';
                sectionBody.value = '';
                frame.contentWindow.location.reload();
            } else {
                sectionStatus.textContent = 'Could not add section';
            }
            addSectionButton.disabled = false;
        });

        saveButton.addEventListener('click', async () => {
            if (!selectedElement) return;
            saveButton.disabled = true;
            saveStatus.textContent = 'Saving...';
            if (selectedElement.dataset.sectionId) {
                const response = await saveSection('update-section', selectedElement.dataset.sectionId, sectionTitle.value, sectionBody.value);
                saveStatus.textContent = response.ok ? 'Saved' : 'Could not save this section';
                saveButton.disabled = false;
                if (response.ok) frame.contentWindow.location.reload();
                return;
            }
            const formData = new FormData();
            if (selectedElement) {
                formData.append('action', 'override-element');
                formData.append('selector', selectedElement.dataset.visualSelector || elementSelector(selectedElement));
                formData.append('text', elementValue.value);
                formData.append('background_color', backgroundColor.value);
                formData.append('text_color', textColor.value);
                if (selectedElement.tagName === 'IMG' && document.getElementById('element-image').files[0]) formData.append('image', document.getElementById('element-image').files[0]);
                const response = await fetch('{{ route('admin.pages.visual.update', $page) }}', {
                    method: 'POST',
                    headers: {'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    body: formData
                });
                saveStatus.textContent = response.ok ? 'Saved' : 'Could not save this element';
                saveButton.disabled = false;
                return;
            }
            formData.append('key', selectedElement.dataset.cmsKey);
            formData.append('value', elementValue.value);
            if (selectedElement.tagName === 'IMG' && document.getElementById('element-image').files[0]) formData.append('image', document.getElementById('element-image').files[0]);
            const response = await fetch('{{ route('admin.pages.visual.update', $page) }}', {
                method: 'POST',
                headers: {'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: formData
            });
            if (response.ok) {
                if (selectedElement.tagName !== 'IMG') selectedElement.textContent = elementValue.value;
                if (selectedElement.tagName === 'IMG' && document.getElementById('element-image').files[0]) selectedElement.src = URL.createObjectURL(document.getElementById('element-image').files[0]);
                saveStatus.textContent = 'Saved';
            } else {
                saveStatus.textContent = 'Could not save this change';
            }
            saveButton.disabled = false;
        });
    </script>
</x-layouts.admin>
