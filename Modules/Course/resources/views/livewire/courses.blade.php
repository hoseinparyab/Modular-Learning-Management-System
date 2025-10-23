<div class="page-content-wrapper border">
    <div class="card bg-transparent border">
        <!-- Card body START -->
        <div class="card-body">
            <!-- Course table START -->
            <div class="table-responsive border-0 rounded-3">
                <!-- Table START -->
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">ردیف</th>
                        <th scope="col" class="border-0 rounded-start">عنوان دوره</th>
                        <th scope="col" class="border-0">نام مدرس</th>
                        <th scope="col" class="border-0">قیمت</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $index =>$course)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$courses->firstItem() + $index}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->title}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->price}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->user->name}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>{{ \Hekmatinasser\Verta\Verta::instance($course->created_at)->format('%B %d، %Y') }}</td>
                            <td wire:click="changeCourseStatus({{$course->id}})">
                                @if($course->status == \Modules\Course\app\Enums\CourseStatus::Draft->value)
                                <a href="#"  class="btn btn-sm btn-info me-1 mb-1 mb-md-0">پیش نویس</a>
                                @elseif($course->status == \Modules\Course\app\Enums\CourseStatus::Active->value)
                                    <a href="#"  class="btn btn-sm btn-success me-1 mb-1 mb-md-0">فعال</a>
                                @elseif($course->status == \Modules\Course\app\Enums\CourseStatus::Rejected->value)
                                    <a href="#"  class="btn btn-sm btn-danger me-1 mb-1 mb-md-0">رد شده</a>
                                @elseif($course->status == \Modules\Course\app\Enums\CourseStatus::Archived->value)
                                    <a href="#"  class="btn btn-sm btn-warning me-1 mb-1 mb-md-0">آرشیو</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!-- Table body END -->
                </table>
                <!-- Table END -->
            </div>
            <!-- Course table END -->
        </div>
        <!-- Card body END -->

        <div class="card-footer bg-transparent pt-0">
            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                {{$courses->links('vendor.livewire.admin-pagination')}}
            </div>
            <!-- Pagination END -->
        </div>
    </div>
</div>
