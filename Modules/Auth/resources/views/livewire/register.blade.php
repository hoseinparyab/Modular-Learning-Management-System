<main>
    <section class="p-0 d-flex align-items-center position-relative overflow-hidden">

        <div class="container-fluid">
            <div class="row mt-6">
                <div class="col-6 m-auto">
                    <div class="row my-5">
                        <div class="col-sm-10 col-xl-8 m-auto">
                            <!-- Title -->
                            <h2 class="">ثبت نام</h2>
                            <!-- Form START -->
                            <form wire:submit="registerUser">

                                <div class="mb-4">
                                    <label for="name" class="form-label">نام و نام خانوادگی</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                                        <input wire:model="name" type="text" class="form-control border-0 bg-light rounded-end ps-1" id="name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">ایمیل</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                                        <input wire:model="email" type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="***@gmail.com" id="exampleInputEmail1">
                                    </div>
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="inputPassword5" class="form-label">رمز عبور *</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                                        <input wire:model="password" type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword5">
                                    </div>
                                    @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="inputPassword6" class="form-label">تایید رمز عبور *</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                                        <input wire:model="password_confirmation" type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword6">
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="align-items-center mt-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary mb-0" type="submit">ثبت نام</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                            <!-- Sign up link -->
                            <div class="mt-4 text-center">
                                <span>آیا قبلا ثبت نام کرده اید؟<a href="{{route('login')}}"> ورود</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
