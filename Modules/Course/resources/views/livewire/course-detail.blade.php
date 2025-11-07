<div class="page-content-wrapper border">

    <div>
        <!-- Title -->
        <h4 class="ff-vb fs-5">جلسات دوره</h4>

        <hr> <!-- Divider -->

        <div class="row">
            <!-- Add lecture Modal button -->
            <div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
                <h5 class="mb-2 mb-sm-0">آپلود جلسات دوره</h5>
                <a href="#" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal" data-bs-target="#addSeason"><i class="bi bi-plus-circle me-2"></i>افزودن فصل</a>
            </div>

            <!-- Edit lecture START -->
            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                @foreach($seasons as $season)
                    <!-- Item START -->
                    <div class="accordion-item mb-3">
                        <h6 class="accordion-header font-base" id="heading-1">
                            <button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                {{$season->title}}
                            </button>
                        </h6>

                        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                            <!-- Topic START -->
                            <div class="accordion-body mt-3">
                               @foreach($season->lessons as $lesson)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="position-relative">
                                            <a href="#" class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i class="fas fa-play"></i></a>
                                            <span class="ms-2 mb-0 h6 fw-light">{{$lesson->title}}</span>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i class="far fa-fw fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                               @endforeach

                                <!-- Add topic -->
                                <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal"
                                x-on:click="$wire.set('season_id',{{$season->id}})"   data-bs-target="#addLesson"><i class="bi bi-plus-circle me-2"></i>افزودن</a>
                            </div>
                            <!-- Topic END -->
                        </div>
                    </div>
                    <!-- Item END -->
                @endforeach
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addSeason" tabindex="-1" aria-labelledby="addLectureLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addLectureLabel">افزودن فصل</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form class="row text-start g-3">
                        <!-- Course name -->
                        <div class="col-12">
                            <label class="form-label">نام فصل <span class="text-danger">*</span></label>
                            <input wire:model="title" type="text" class="form-control" placeholder="نام فصل را وارد کنید">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">بستن</button>
                    <button wire:click="addSeason" type="button" class="btn btn-success my-0">ذخیره</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addLesson" tabindex="-1" aria-labelledby="addTopicLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="addTopicLabel">افزودن قسمت</h5>
                    <button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <form class="row text-start g-3">
                        <!-- Topic name -->
                        <div class="col-md-6">
                            <label class="form-label">نام فارسی قسمت</label>
                            <input wire:model="lesson_title" class="form-control" type="text" >
                        </div>
                        <!-- Video link -->
                        <div class="col-md-6">
                            <label class="form-label">نام انگلیسی قسمت</label>
                            <input wire:model="lesson_e_title" class="form-control" type="text" >
                        </div>
                        <!-- Description -->

                        <!-- Buttons -->
                        <div class="col-6 mt-3">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <!-- رایگان button -->
                                <input wire:model="is_free" type="radio" class="btn-check" name="options" id="option1" checked value="0">
                                <label class="btn btn-sm btn-light btn-primary-soft-check border-0 m-0" for="option1">رایگان</label>
                                <!-- Premium button -->
                                <input wire:model="is_free" value="1" type="radio" class="btn-check" name="options" id="option2">
                                <label class="btn btn-sm btn-light btn-primary-soft-check border-0 m-0" for="option2">پولی</label>
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
                                    <input  type="text" class="form-control upload-name-mp4 border-end-0" id="inputGroupFile01"/>
                                    <span class="btn btn btn-secondary-soft cursor-pointer upload-button-mp4 border-start-0">آپلود ویدئو</span>

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

                        <div class="col-12">
                            <div class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
                                <label class="form-label">ضمیمه</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control upload-name-file border-end-0" id="inputGroupFile"/>
                                    <span class="btn btn btn-secondary-soft cursor-pointer upload-button-file border-start-0">آپلود ضمیمه</span>
                                </div>
                                <input wire:model="attachment" type="file" class="d-none hidden-upload-file"/>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">بستن</button>
                    @isset($season)
                        <button wire:click="AddLesson({{$season->id}})" type="button" class="btn btn-success my-0">ذخیره</button>
                    @endisset
                </div>
            </div>
        </div>
    </div>

@push('scripts')
    <script>
        // Upload file
        document.querySelector(".upload-button-file").onclick = function() {
            document.querySelector(".hidden-upload-file").click();
        };

        document.querySelector(".hidden-upload-file").onchange = function() {
            document.querySelector(".upload-name-file").value = event.target.files[0].name;
        };
        // Upload Video .mp4
        document.querySelector(".upload-button-mp4").onclick = function() {
            document.querySelector(".hidden-upload-mp4").click();
        };

        document.querySelector(".hidden-upload-mp4").onchange = function() {
            document.querySelector(".upload-name-mp4").value = event.target.files[0].name;
        };

        document.addEventListener('livewire:init',()=>{
            Livewire.on('closeSeasonModal',()=>{
                $('#addSeason').modal('toggle')
            })
        })

        document.addEventListener('livewire:init',()=>{
            Livewire.on('closeLessonModal',()=>{
                $('#addLesson').modal('toggle')
            })
        })

    </script>
@endpush