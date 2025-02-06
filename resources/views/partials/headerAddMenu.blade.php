
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 style="font-size: 1.5em; color: #333;">Module Generator</h1>
            <button style="background-color: #28a745; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">+ Generate New Module</button>
    </div>
    <div style="display: flex; margin-bottom: 20px;">
        <div style="margin-right: 20px; color: #007bff; cursor: pointer; {{ $tittle == "Add Menu" ? 'font-weight: bold; text-decoration: underline;' : '' }}">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('addMenu') }}">Step 1 - Module Information</a>
        </div>
        <div style="margin-right: 20px; color: #007bff; cursor: pointer; {{ $tittle == "displayTable" ? 'font-weight: bold; text-decoration: underline;' : '' }}">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('displayTable') }}">Step 2 - Table Display</a>
        </div>
        <div style="margin-right: 20px; color: #007bff; cursor: pointer; {{ $tittle == "formDisplay" ? 'font-weight: bold; text-decoration: underline;' : '' }}">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('formDisplay') }}">Step 3 - Form Display</a>
        </div>
        <div style="margin-right: 20px; color: #007bff; cursor: pointer; {{ $tittle == "configuration" ? 'font-weight: bold; text-decoration: underline;' : '' }}">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ route('configuration') }}">Step 4 - Configuration</a>
        </div>
    </div>