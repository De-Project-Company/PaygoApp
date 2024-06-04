<x-layout>
    <x-slot name="title">PayGo Verify Email</x-slot>
<div class="flex flex-col h-screen md:h-full py-10 px-4 justify-center">
    <div class="grid grid-rows-2 md:grid-cols-2 md:gap-x-40 text-center py-6 px-4">
        <!--verifcation  div -->
        <div class="flex flex-col items-center justify-center">
            <!-- rext div -->
            <div class="py-12">
                <p class="text-xl font-bold">
                    Verify Your Email Address
                </p>
                <p class="text-xs font-semibold">Before proceeding, please check your email for a verification link.</p>

                <p class="font-semibold text-right text-sm py-3">Resend in <span class="text-red-600">15s</span></p>
                <div class="py-12">
                    <p class="text-xs font-semibold">If you did not receive the email</p>
                </div>
                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Click here to request another</button>
                </form>
                {{-- <p class="font-semibold text-right text-sm py-3">Resend in <span class="text-red-600">15s</span></p> --}}
            </div>
            <!-- end of verification input -->

        </div>
        <!-- end of verification div -->

        <!--  image and button div -->
        <div class="flex flex-col  items-center space-y-5 ">
            <!-- developer man svg -->
            <svg width="241" height="219" viewBox="0 0 241 219" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="241" height="219" fill="url(#pattern0)"/>
                <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_141_2008" transform="scale(0.00199203 0.00219214)"/>
                    </pattern>
                    <image id="image0_141_2008" width="502" height="456" xlink:href="data:image/png;base64,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"/>
                </defs>
            </svg>

            <!-- end of dveloper man svg -->

            <!-- verify button -->
            <a href="" class="w-[211px] bg-blue-500 py-3 text-gray-50 px-10 rounded-2xl">Verify</a>


            {{-- <a href="" class="w-[211px] bg-blue-500 py-3 text-gray-50 px-10 rounded-2xl">Verify</a> --}}


            <!-- end of verify button -->
        </div>
        <!--  end of image and button div -->

    </div>
</div>

</x-layout>