<div class="page-content-wrapper border">

    <h4 class="fs-5 ff-vb">جزئیات دوره</h4>

    <hr> <!-- Divider -->

    <!-- Basic information START -->
    <div class="row g-4">
        <div class="col-12">
            <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                <label class="form-label">آپلود بنر</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control upload-name-image border-end-0" id="inputGroupFile"/>
                    <span class="btn btn btn-secondary-soft cursor-pointer upload-button-image border-start-0">آپلود بنر</span>
                </div>
                <input wire:model="image" type="file" class="d-none hidden-upload-image"/>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                <label class="form-label">آپلود ویدیو</label>

                <div class="input-group mb-3">
                    <label class="input-group-text" dir="ltr">.mp4</label>
                    <input type="text" class="form-control upload-name-mp4 border-end-0" id="inputGroupFile01"/>
                    <span class="btn btn btn-secondary-soft cursor-pointer upload-button-mp4 border-start-0">آپلود فایل</span>

                </div>
                <input wire:model="video" type="file" class="d-none hidden-upload-mp4"/>
                @error('video')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="progress m-b-10" x-show="uploading">
                    <div class="progress-bar" role="progressbar" x-bind:style="`width:${progress}%`" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" x-text="`${progress}`">
                    </div>
                </div>
            </div>
        </div>
        <!-- Course title -->
        <div class="col-12">
            <label class="form-label">عنوان دوره</label>
            <input wire:model="title" class="form-control" type="text" >
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Short description -->
        <div class="col-12" wire:ignore>
            <label class="form-label">توضیحات </label>
            <textarea id="editor" class="form-control" rows="2"></textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Course category -->
        <div class="col-md-6" wire:ignore>
            <label class="form-label">دسته بندی</label>
            <select wire:model="category_id" class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm" data-search-enabled="true">
                <option>انتخاب</option>
                @foreach($categories as $key=>$value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Course level -->
        <div class="col-md-6" wire:ignore>
            <label class="form-label">سطح دوره</label>
            <select wire:model="level" class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm" data-search-enabled="false" data-remove-item-button="true">
                <option>انتخاب</option>
                <option  value="primary">مقدماتی</option>
                <option  value="medium">متوسطه</option>
                <option  value="professional">پیشرفته</option>
            </select>
            @error('level')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Course price -->
        <div class="col-md-6">
            <label class="form-label">قیمت</label>
            <input wire:model="price" type="text" class="form-control" placeholder="90,000 تومان">
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 d-flex align-items-center mt-6">
            <button wire:click="createTeacherCourse" class="btn btn-primary">ثبت</button>
        </div>

    </div>
</div>
@push('scripts')
    <script>
        // Upload image
        document.querySelector(".upload-button-image").onclick = function() {
            document.querySelector(".hidden-upload-image").click();
        };

        document.querySelector(".hidden-upload-image").onchange = function() {
            document.querySelector(".upload-name-image").value = event.target.files[0].name;
        };

        // Upload Video .mp4
        document.querySelector(".upload-button-mp4").onclick = function() {
            document.querySelector(".hidden-upload-mp4").click();
        };

        document.querySelector(".hidden-upload-mp4").onchange = function() {
            document.querySelector(".upload-name-mp4").value = event.target.files[0].name;
        };


        $(document).ready(function () {

            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            '|',
                            'fontSize',
                            'fontColor',
                            '|',
                            'imageUpload',
                            'blockQuote',
                            'insertTable',
                            'undo',
                            'redo',
                            'codeBlock'
                        ]
                    },
                    language: {
                        ui: 'fa',
                        content: 'fa'
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },

                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData());
                    })
                })
        });
    </script>
@endpush
