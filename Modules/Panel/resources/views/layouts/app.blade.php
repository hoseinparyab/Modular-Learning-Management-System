<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title> دوره آنلاین و آموزش</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="پنل مدیریت">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if(el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/apexcharts/css/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/apexcharts/css/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/choices/css/choices.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/overlay-scrollbar/css/overlayscrollbars.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/vendor/sweet_alert/sweetalert2.min.css')}}">
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/style-rtl.css')}}">
    @stack('styles')
</head>

<body>
<!-- **************** MAIN CONTENT START **************** -->
<main>
    <!-- Sidebar START -->
    @include('panel::layouts.sidebar')
    <!-- Sidebar END -->
    <!-- Page content START -->
    <div class="page-content">
        <!-- Top bar START -->
        @include('panel::layouts.navbar')
        <!-- Top bar END -->
        <!-- Page main content START -->
        @isset($slot)
            {{$slot}}
        @else
            @yield('content')
        @endisset
        <!-- Page main content END -->
    </div>
    <!-- Page content END -->
</main>
<!-- **************** MAIN CONTENT END **************** -->
<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
<!-- Bootstrap JS -->
<script src="{{url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{url('assets/vendor/purecounterjs/dist/purecounter_vanilla.js')}}"></script>
<script src="{{url('assets/vendor/apexcharts/js/apexcharts.min.js')}}"></script>
<script src="{{url('assets/vendor/choices/js/choices.min.js')}}"></script>
<script src="{{url('assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js')}}"></script>
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/ckeditor.js')}}"></script>
<script src="{{url('assets/vendor/sweet_alert/sweetalert2.all.min.js')}}"></script>
<!-- Template Functions -->
<script src="{{url('assets/js/functions.js')}}"></script>
@stack('scripts')
</body>
</html>
