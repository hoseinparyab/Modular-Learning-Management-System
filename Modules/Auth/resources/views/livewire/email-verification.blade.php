<main>
    <section class="p-0 d-flex align-items-center position-relative overflow-hidden">
        <div class="container-fluid ">
            <div class="row mt-6">

                <div class="col-6 d-flex justify-content-center mx-auto">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <p>{{session('message')}}</p>
                        </div>
                    @endif
                    <div class="row my-5">
                        <div class="col-sm-10 col-xl-12 m-auto">
                            <!-- Title -->
                            <h1 class="fs-4">ارسال ایمیل تایید</h1>
                            <h5 class="fw-light mb-4">در صورتی که ایمیل را دریافت نکردید مجدد سعی کنید</h5>
                            <!-- Form START -->
                            <form wire:submit="resendEmail">
                                <div class="align-items-center">
                                    <div class="d-grid">
                                        <button class="btn btn-primary mb-0" type="submit">ارسال مجدد ایمیل</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div> <!-- Row END -->
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
</main>

