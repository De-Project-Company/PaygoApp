<x-layout>
    <!-- brand logo svg -->
    <section class="flex h-screen justify-center items-center">
        <img src="{{asset('storage/images/paygo.png')}}" alt="logo" />
    </section>
    <!-- end of logo svg  -->
    <!-- <script src="./js/onboard.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Wait for 2 seconds, then redirect to the signup page
        setTimeout(function () {
            window.location.href = '/onboarding/signup';
        }, 2000);
    });
</script>
</x-layout>
