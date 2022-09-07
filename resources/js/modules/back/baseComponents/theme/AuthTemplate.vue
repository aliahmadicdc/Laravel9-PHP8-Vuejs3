<template>
    <div class="d-flex flex-column flex-root">
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
            <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10"
                 style="background-image: url('/assets/back/media/bg/bg-4.jpg');">
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <a href="https://didebanco.com" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                        <img src="'assets/back/media/logos/logo.png'" class="max-h-70px"
                             alt="vgbg">
                    </a>
                    <div class="flex-column-fluid d-flex flex-column justify-content-center">
                        <h3 class="font-size-h1 mb-5 text-white">messages.welcome</h3>
                        <p class="font-weight-lighter text-white opacity-80">
                           fhtryhfthythtf
                        </p>
                    </div>
                    <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                        <div class="opacity-70 font-weight-bold	text-white">
                            hnmhjmnmn
                        </div>
                        <div class="d-flex">
                            <a href="/about-us" class="text-white ml-10">ghjhjj</a>
                            <a href="/contact-us"
                               class="text-white ml-10">ghjhjjjh</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
                <div
                    class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
                    <span class="font-weight-bold text-dark-50">@yield('routeText')</span>
                    <a href="@yield('routeUrl')" class="font-weight-bold ml-2"
                       id="kt_login_signup">@yield('routeName')</a>
                </div>
                <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0" id="app">
                    @yield('content')
                </div>
                <div
                    class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                    <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                        {{trans('messages.copyRight')}}
                    </div>
                    <div class="d-flex order-1 order-sm-2 my-2">
                        <a href="/about-us"
                           class="text-dark-75 text-hover-primary ml-4">ertrdrd</a>
                        <a href="/contact-us"
                           class="text-dark-75 text-hover-primary ml-4">rtrettret</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AuthTemplate"
}
</script>
