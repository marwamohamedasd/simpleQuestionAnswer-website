<!DOCTYPE html>
<html lang="en">
@include('layouts.meta')
<body>
<div>
    <!-- start Header -->
    @include('layouts.header')
    <!-- End Header -->
    <!-- Stat Content -->
    <div class=" main_content">
        <!-- start Aside -->

        @include('layouts.sidebar')

        <!--Start Main  -->

        <div class="main container">
            @yield('content')
        </div>
        <!--End Main  -->
        <!--Start Notification -->
        @auth
        <div class="notfication">
            <div class="">
                <h5><i class="far fa-comment-alt"></i> Notification</h5>
                <ul>
                    <li>Mohammed Comment in Your Post</li>
                    <li>Ali Comment in Your Post</li>
                    <li>Your Comment has three votes</li>
                    <li>You Make votes in Question</li>
                    <li>Mohammed Comment in Your Post</li>
                </ul>
            </div>
        </div>
        <!--End Notification -->
        @endauth

        <div class="clearFix"></div>
    </div>
    <!-- End Content -->

    @include('layouts.footer')
</div>
</body>
@include('layouts.script')
</html>
