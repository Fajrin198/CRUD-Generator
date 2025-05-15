@extends('layouts.main')

@section('content')
    @include('partials.headerAddMenu')
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="table" style="display: block; font-weight: bold; margin-bottom: 5px;">Table</label>
                <input type="text" id="table" name="table" required placeholder="students" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                <small>Do not use cms_* as prefix on your table names</small>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="module_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Module Name</label>
                <input type="text" id="name" name="name" required placeholder="Mahasiswa" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" >
            </div>

            <div style="margin-bottom: 15px;">
                <label for="icon" style="display: block; font-weight: bold; margin-bottom: 5px;">Icon</label>
                <select id="icon" name="icon" required placeholder="graduation-cap" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                    <option value="file-earmark">file-earmark</option>
                    
                    <option value="bi bi-mortarboard-fill">bi bi-mortarboard-fill</option>
                    <option value="mazda">Mazda</option>
                </select>
                <!-- <input type="text" id="icon" name="icon" required placeholder="graduation-cap" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" > -->
            </div>

            <div style="margin-bottom: 15px;">
                <label for="module_slug" style="display: block; font-weight: bold; margin-bottom: 5px;">Module Slug</label>
                <input type="text" id="module_slug" name="module_slug" required placeholder="students" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                <small>Please use alphanumeric characters only, without spaces, instead use _ and avoid special characters.</small>
            </div>

            <div style="display: flex; align-items: center; margin-top: 10px;">
                <input type="checkbox" id="create_menu" style="margin-right: 10px;">
                <label for="create_menu">Also create menu for this module</label>
            </div>

            <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                <button style="background-color: #007bff; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Step 2 &raquo;</button>
            </div>
        </form>
<!-- <div class="container">
        <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="header1">
            <h1>Module Generator</h1>
            <button class="btn1">+ Generate New Module</button>
        </div>

        <div class="step-navigation">
            <div class="active">Step 1 - Module Information</div>
            <div>Step 2 - Table Display</div>
            <div>Step 3 - Form Display</div>
            <div>Step 4 - Configuration</div>
        </div>
            <div class="form-group">
                <label for="table">Table</label>
                <input type="text" id="table" placeholder="students">
                <small>Do not use cms_* as prefix on your table names</small>
            </div>

            <div class="form-group">
                <label for="module_name">Module Name</label>
                <input type="text" id="module_name" name="name" placeholder="Mahasiswa">
            </div>

            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" id="icon" placeholder="graduation-cap">
            </div>

            <div class="form-group">
                <label for="module_slug">Module Slug</label>
                <input type="text" id="module_slug" placeholder="students">
                <small>Please use alphanumeric characters only, without spaces, instead use _ and avoid special characters.</small>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="create_menu">
                <label for="create_menu">Also create menu for this module</label>
            </div>

            <div class="footer">
                <button class="btn">Step 2 &raquo;</button>
            </div>
        </form>
    </div> -->
    

    <!-- <form action="{{ route('store') }}" method="POST">
        @csrf
        <label>Nama Menu:</label>
        <input type="text" name="name" required>
        
        <label>Sub Menu:</label>
        <div id="subMenuContainer"></div>
        <button type="button" id="addSubMenu">Tambah Sub Menu</button>

        <button type="submit">Simpan</button>
    </form> -->

    <!-- <h2 style="text-align: center; font-family: Arial, sans-serif;">Form Input Data</h2>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; font-family: Arial, sans-serif;">
        @csrf
        <label for="title" style="display: block; margin-bottom: 8px; font-weight: bold;">Title:</label>
        <input type="text" name="name" placeholder="Enter title" required style="width: 100%; padding: 8px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="category" style="display: block; margin-bottom: 8px; font-weight: bold;">Category:</label>
        <select id="category" name="category" required style="width: 100%; padding: 8px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">-- Select Category --</option>
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select>

        <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Upload Image:</label>
        <input type="file" name="image" accept="image/*" required style="width: 100%; padding: 8px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px;">

        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; font-size: 16px; font-weight: bold; border: none; border-radius: 4px; cursor: pointer;">Save</button>
    </form> -->

    <!-- <script>
        document.getElementById('addSubMenu').addEventListener('click', () => {
            const container = document.getElementById('subMenuContainer');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'subMenus[]';
            container.appendChild(input);
        });
    </script> -->
@endsection
