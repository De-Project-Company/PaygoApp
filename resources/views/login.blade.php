<x-layout>
    <div class="flex flex-col items-center justify-center px-4 py-6">
        <img src="./svgs/PAYGO.svg" class="py-4 my-10 m" alt="">
        <p class="font-semibold w-[157px] h-[23px] mb-5 py-3 pb-6 text-center leading-6">Sign In</p>

        <!-- sign in form -->
        <div class="w-full px-3 my-7">
            <form method="POST" action="/onboarding/authenticate"
                class="flex flex-col text-center  items-center space-y-6">
                @csrf
                <input type="text" name="email" class="leading-[19.5px] text-[13px] font-semibold border border-[#00000069] focus:outline-none rounded-[13px] h-[51px] w-[332px] px-3" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                <input type="password" name="password" class="leading-[19.5px] rounded-[13px] text-[13px] font-semibold border focus:outline-none border-[#00000069] h-[51px] w-[332px] px-3" placeholder="Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                <!-- signin button -->
                <div class="flex flex-col my-10 items-center text-center ">
                    <input type="submit" value="Sign In" class=" my-4 w-[211px] h-[44px] px-[42px] py-[12px] rounded-2xl bg-blue-500 text-white font-semibold text-[13px] leading-[19.5px]">
                    <!-- signin button -->

                    <a href="{{route('forgot.password')}}"><p class="text-[13px] text-[#3676E0] py-1 font-semibold leading-[16.5px] align-middle w-[173px] h-[43px]">Forgot Password?</p></a>
                </div>
            </form>
            <!-- sign in form -->

            <div class="flex py-5 mt-10 items-center">
                <span class="w-[98px] h-[1px] bg-[#D9D9D9]"></span>
                <p class="w-[74px] h-[15px] text-[10px] font-semibold leading[15px]">Learn more</p>
                <span class="w-[98px] h-[1px] bg-[#D9D9D9]"></span>
            </div>
            <!-- svg links div -->
            <div class="flex justify-center">
                <!-- apple svg -->
                <form class="d-inline" method="GET" action="">
                    @csrf
                    <label>
                        <span class="border mx-2 border-[#9E8BBD] w-[61px] h-[61px] rounded-full flex justify-center items-center">
                            <input type="submit" style="display: none;">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.1271 34.645C27.4529 36.2679 25.625 36.0117 23.8654 35.2429C22.0033 34.4571 20.295 34.4229 18.3304 35.2429C15.8704 36.3021 14.5721 35.9946 13.1029 34.645C4.76624 26.0521 5.99624 12.9662 15.4604 12.4879C17.7667 12.6075 19.3725 13.7521 20.7221 13.8546C22.7379 13.4446 24.6683 12.2658 26.8208 12.4196C29.4004 12.6246 31.3479 13.6496 32.6292 15.4946C27.2992 18.6892 28.5633 25.7104 33.4492 27.675C32.4754 30.2375 31.2112 32.7829 29.11 34.6621L29.1271 34.645ZM20.5512 12.3854C20.295 8.57583 23.3871 5.4325 26.9404 5.125C27.4358 9.5325 22.9429 12.8125 20.5512 12.3854Z" fill="#111111"/>
                            </svg>
                        </span>
                    </label>
                </form>
                <!-- end of apple  -->

                <!-- google svg -->
                <form class="d-inline" method="GET" action="{{ route('google.login') }}">
                    @csrf
                    <label>
                        <span class="border mx-2 border-[#9E8BBD] w-[61px] h-[61px] rounded-full flex justify-center items-center">
                            <input type="submit" style="display: none;">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.4398 11.7151H24.5V11.6666H14V16.3333H20.5934C19.6315 19.0499 17.0468 21 14 21C10.1343 21 7.00001 17.8657 7.00001 14C7.00001 10.1342 10.1343 6.99998 14 6.99998C15.7844 6.99998 17.4078 7.67315 18.6439 8.77273L21.9438 5.47281C19.8602 3.5309 17.073 2.33331 14 2.33331C7.55709 2.33331 2.33334 7.55706 2.33334 14C2.33334 20.4429 7.55709 25.6666 14 25.6666C20.4429 25.6666 25.6667 20.4429 25.6667 14C25.6667 13.2177 25.5862 12.4541 25.4398 11.7151Z" fill="#FFC107"/>
                                <path d="M3.6785 8.56973L7.51158 11.3808C8.54875 8.81298 11.0606 6.99998 14 6.99998C15.7844 6.99998 17.4078 7.67315 18.6439 8.77273L21.9438 5.47281C19.8602 3.5309 17.073 2.33331 14 2.33331C9.51883 2.33331 5.63266 4.86323 3.6785 8.56973Z" fill="#FF3D00"/>
                                <path d="M14 25.6666C17.0135 25.6666 19.7517 24.5134 21.8219 22.638L18.2111 19.5825C17.0004 20.5032 15.521 21.0012 14 21C10.9655 21 8.38891 19.0651 7.41824 16.3648L3.61374 19.2961C5.54457 23.0743 9.46574 25.6666 14 25.6666Z" fill="#4CAF50"/>
                                <path d="M25.4398 11.7151H24.5V11.6667H14V16.3334H20.5934C20.1333 17.6263 19.3045 18.756 18.2093 19.5831L18.2111 19.5819L21.8219 22.6374C21.5664 22.8696 25.6667 19.8334 25.6667 14C25.6667 13.2178 25.5862 12.4542 25.4398 11.7151Z" fill="#1976D2"/>
                            </svg>
                        </span>
                    </label>
                </form>
                <!-- end of google svg -->

                <!-- facebook svg -->
                <form class="d-inline" method="GET" action="{{ route('facebook.login') }}">
                    @csrf
                    <label>
                        <span class="border mx-2 border-[#9E8BBD] w-[61px] h-[61px] rounded-full flex justify-center items-center">
                            <input type="submit" style="display: none;">
                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8808 27.7709H17.0474V17.4246H21.7026L22.2141 12.2838H17.0474V9.68752C17.0474 9.34495 17.1835 9.01641 17.4257 8.77417C17.668 8.53194 17.9965 8.39585 18.3391 8.39585H22.2141V3.22919H18.3391C16.6262 3.22919 14.9835 3.90962 13.7724 5.12079C12.5612 6.33196 11.8808 7.97466 11.8808 9.68752V12.2838H9.29742L8.78592 17.4246H11.8808V27.7709Z" fill="#111111"/>
                            </svg>
                        </span>
                    </label>
                </form>
                <!-- end of facebook  -->
            </div>
            <!-- end of svg links div -->
        </div>









    </div>
</x-layout>
