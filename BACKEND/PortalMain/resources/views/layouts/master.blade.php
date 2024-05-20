<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-wide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../assets/"
    data-storage-path="../../storage/"
    data-template="front-pages-no-customizer">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    {{--<title>Ministry of the Interior</title>--}}
    @yield('title')

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/bromar-logo.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/rateyo/rateyo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/wizard-ex-checkout.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/front-config.js') }}"></script>
    @yield('css')
</head>

<body>
<script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
<script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>

<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
    <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
            <!-- Menu logo wrapper: Start -->
            <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
                <!-- Mobile menu toggle: Start-->
                <button
                    class="navbar-toggler border-0 px-0 me-2"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="ti ti-menu-2 ti-sm align-middle"></i>
                </button>
                <!-- Mobile menu toggle: End-->
                <a href="landing-page.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/bromar-logo.svg') }}" alt="">
              </span>
                    <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">

                    </span>
                </a>
            </div>
            <!-- Menu logo wrapper: End -->
            <!-- Menu wrapper: Start -->
            <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                <button
                    class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="ti ti-x ti-sm"></i>
                </button>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page" href="landing-page.html#landingHero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="landing-page.html#landingFeatures">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="landing-page.html#landingTeam">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="landing-page.html#landingFAQ">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="landing-page.html#landingContact">Contact us</a>
                    </li>
                    <li class="nav-item mega-dropdown active">
                        <a
                            href="javascript:void(0);"
                            class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown mega-dropdown fw-medium"
                            aria-expanded="false"
                            data-bs-toggle="mega-dropdown"
                            data-trigger="hover">
                            <span data-i18n="Pages">Pages</span>
                        </a>
                        <div class="dropdown-menu p-4">
                            <div class="row gy-4">
                                <div class="col-12 col-lg">
                                    <div class="h6 d-flex align-items-center mb-2 mb-lg-3">
                                        <div class="avatar avatar-sm flex-shrink-0 me-2">
                                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-layout-grid"></i></span>
                                        </div>
                                        <span class="ps-1">Other</span>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link mega-dropdown-link" href="pricing-page.html">
                                                <i class="ti ti-circle me-1"></i>
                                                <span data-i18n="Pricing">Pricing</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mega-dropdown-link" href="payment-page.html">
                                                <i class="ti ti-circle me-1"></i>
                                                <span data-i18n="Payment">Payment</span>
                                            </a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link mega-dropdown-link" href="checkout-page.html">
                                                <i class="ti ti-circle me-1"></i>
                                                <span data-i18n="Checkout">Checkout</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mega-dropdown-link" href="help-center-landing.html">
                                                <i class="ti ti-circle me-1"></i>
                                                <span data-i18n="Help Center">Help Center</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="h6 d-flex align-items-center mb-2 mb-lg-3">
                                        <div class="avatar avatar-sm flex-shrink-0 me-2">
                                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-lock-open"></i></span>
                                        </div>
                                        <span class="ps-1">Auth Demo</span>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-login-basic.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Login (Basic)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-login-cover.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Login (Cover)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-register-basic.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Register (Basic)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-register-cover.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Register (Cover)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-register-multisteps.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Register (Multi-steps)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-forgot-password-basic.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Forgot Password (Basic)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-forgot-password-cover.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Forgot Password (Cover)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-reset-password-basic.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Reset Password (Basic)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-reset-password-cover.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Reset Password (Cover)
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg">
                                    <div class="h6 d-flex align-items-center mb-2 mb-lg-3">
                                        <div class="avatar avatar-sm flex-shrink-0 me-2">
                          <span class="avatar-initial rounded bg-label-primary"
                          ><i class="ti ti-file-analytics"></i
                              ></span>
                                        </div>
                                        <span class="ps-1">Other</span>
                                    </div>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/pages-misc-error.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Error
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/pages-misc-under-maintenance.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Under Maintenance
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/pages-misc-comingsoon.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Coming Soon
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/pages-misc-not-authorized.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Not Authorized
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-verify-email-basic.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Verify Email (Basic)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-verify-email-cover.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Verify Email (Cover)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-two-steps-basic.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Two Steps (Basic)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link mega-dropdown-link"
                                                href="../vertical-menu-template/auth-two-steps-cover.html"
                                                target="_blank">
                                                <i class="ti ti-circle me-1"></i>
                                                Two Steps (Cover)
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="bg-body nav-img-col p-2">
                                        <img
                                            src="../../assets/img/front-pages/misc/nav-item-col-img.png"
                                            alt="nav item col image"
                                            class="w-100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="../vertical-menu-template/index.html" target="_blank">Admin</a>
                    </li>
                </ul>
            </div>
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper: End -->
            <!-- Toolbar: Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- navbar button: Start -->
                <li>
                    <a href="../vertical-menu-template/auth-login-cover.html" class="btn btn-primary" target="_blank"
                    ><span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span
                        ><span class="d-none d-md-block">Login/Register</span></a
                    >
                </li>
                <!-- navbar button: End -->
            </ul>
            <!-- Toolbar: End -->
        </div>
    </div>
</nav>
<!-- Navbar: End -->

<!-- Sections:Start -->

@yield('content')

<!-- / Sections:End -->

<!-- Footer: Start -->
<footer class="landing-footer bg-body footer-text">
    <div class="footer-bottom py-3">
        <div
            class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
            <div class="mb-2 mb-md-0">
            <span class="footer-text"
            >©
              <script>
                document.write(new Date().getFullYear());
              </script>
            </span>
                <a href="https://pixinvent.com" target="_blank" class="fw-medium text-white footer-link">Pixinvent,</a>
                <span class="footer-text"> Made with ❤️ for a better web.</span>
            </div>
            <div>
                <a href="https://github.com/pixinvent" class="footer-link me-3" target="_blank">
                    <img
                        src="../../assets/img/front-pages/icons/github-light.png"
                        alt="github icon"
                        data-app-light-img="front-pages/icons/github-light.png"
                        data-app-dark-img="front-pages/icons/github-dark.png" />
                </a>
                <a href="https://www.facebook.com/pixinvents/" class="footer-link me-3" target="_blank">
                    <img
                        src="../../assets/img/front-pages/icons/facebook-light.png"
                        alt="facebook icon"
                        data-app-light-img="front-pages/icons/facebook-light.png"
                        data-app-dark-img="front-pages/icons/facebook-dark.png" />
                </a>
                <a href="https://twitter.com/pixinvents" class="footer-link me-3" target="_blank">
                    <img
                        src="../../assets/img/front-pages/icons/twitter-light.png"
                        alt="twitter icon"
                        data-app-light-img="front-pages/icons/twitter-light.png"
                        data-app-dark-img="front-pages/icons/twitter-dark.png" />
                </a>
                <a href="https://www.instagram.com/pixinvents/" class="footer-link" target="_blank">
                    <img
                        src="../../assets/img/front-pages/icons/instagram-light.png"
                        alt="google icon"
                        data-app-light-img="front-pages/icons/instagram-light.png"
                        data-app-dark-img="front-pages/icons/instagram-dark.png" />
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- Footer: End -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/rateyo/rateyo.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/front-main.js') }}"></script>

<!-- Page JS -->

<script src="{{ asset('assets/js/modal-add-new-address.js') }}"></script>
<script src="{{ asset('assets/js/wizard-ex-checkout.js') }}"></script>
@yield('scripts')
</body>
</html>

