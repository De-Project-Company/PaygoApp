<x-layout>
    <section
        class="font-poppins xl:flex justify-between py-16 max-w-[1110px] mx-auto onboard">
        <div>
            <img src="{{asset('storage/images/paygo.png')}}" alt="" class="mb-[84px] hidden xl:block"/>
            <img src="{{asset('storage/images/pana.svg')}}" alt="" class="hidden xl:block" />
        </div>
        <div
            class="mt-24 px-4 max-w-[500px] text-center xl:max-w-[670px] xl:m-0 mx-auto">
            <img src="{{asset('storage/images/paygo.svg')}}" alt="" class="mx-auto mb-[34px] xl:hidden"/>
            <p class="font-semibold xl:text-[32px]">Create an account</p>
            <form action="/onboarding" method="POST" class="w-full mt-[72px]">
                @csrf
                <div class="relative">
                    <!-- <MdOutlineEmail class="absolute left-6 top-[18px] text-2xl" /> -->
                    <input
                        type="email"
                        name="email"
                        class="border border-[#D9D9D9] rounded-[13px] w-full pl-5 py-4 placeholder:text-[13px] placeholder:text-[#9E9E9E] placeholder:font-semibold outline-none"
                        placeholder="Email"
                    />

                    @error('email')
                    <p class="text-xs text-red-500 mt-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="relative">
                    <input
                        type="tel"
                        name="phone_number"
                        class="mt-[28px] border border-[#D9D9D9] rounded-[13px] w-full pl-5 py-4 placeholder:text-[13px] placeholder:text-[#9E9E9E] placeholder:font-semibold outline-none placeholder:text-opacity-19"
                        placeholder="Phone Number"
                    />
                    @error('phone_number')
                    <p class="text-xs text-red-500 mt-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="relative">
                    <!-- <MdLockOutline class="absolute left-6 top-[42px] text-2xl" /> -->
                    <input
                        type="password"
                        name="password"
                        class="mt-[28px] border-[#D9D9D9] border rounded-[13px] w-full pl-5 py-4 placeholder:text-[13px] placeholder:text-[#9E9E9E] placeholder:font-semibold outline-none"
                        placeholder="Password"
                    />
                    @error('password')
                    <p class="text-xs text-red-500 mt-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="relative">
                    <!-- <MdLockOutline class="absolute left-6 top-[42px] text-2xl" /> -->
                    <input
                        type="password"
                        name="password_confirmation"
                        class="mt-[28px] border-[#D9D9D9] border rounded-[13px] w-full pl-5 py-4 placeholder:text-[13px] placeholder:text-[#9E9E9E] placeholder:font-semibold outline-none"
                        placeholder="Confirm Password"
                    />
                    @error('password')
                    <p class="text-xs text-red-500 mt-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="flex mt-[28px] gap-2">
                    <input type="checkbox" name="" id="" class="h-[17px] w-[17px]" />
                    <label htmlFor="" class="text-[11px]">
                        I would like to receive emails and sms with useful offers from
                        ProfitPal.
                    </label>
                </div>
                <button
                    type="submit"
                    class="w-52 py-3 text-[13px] text-white bg-[#3B82F6] rounded-[16px] mt-[72px] font-semibold disabled:bg-opacity-30 hover:shadow-shadow"
                >
                    Create Account
                </button>
            </form>
            <div class="flex justify-center items-center mt-[66px] mb-14">
                <div class="bg-[#D9D9D98A] h-[1px] w-[100%] max-w-[216px]"></div>
                <p class="whitespace-nowrap font-semibold text-[13px]">
                    Or sign in with
                </p>
                <div class="bg-[#D9D9D98A] h-[1px] w-[100%] max-w-[216px]"></div>
            </div>
            <div class="flex justify-center">
          <span
              class="border mx-2 border-[#9E8BBD] w-[61px] h-[61px] rounded-full flex justify-center items-center">
            <img src="{{asset('storage/images/apple.svg')}}" alt="" />
          </span>
        <form class="d-inline" method="GET" action="{{ route('google.login') }}">
            @csrf
            <label>
                <span
                    class="border mx-2 border-[#9E8BBD] w-[61px] h-[61px] rounded-full flex justify-center items-center">
                    <input type="submit" style="display: none;">
                    <img src="{{asset('storage/images/google.svg')}}" alt="" />
                </span>
            </label>
        </form>
        <form class="d-inline" method="GET" action="{{ route('facebook.login') }}">
            @csrf
            <label>
                <span
                    class="border mx-2 border-[#9E8BBD] w-[61px] h-[61px] rounded-full flex justify-center items-center">
                    <input type="submit" style="display: none;">
                    <img src="{{asset('storage/images/facebook.svg')}}" alt="" />
                </span>
            </label>
        </form>
            </div>
            <p class="text-[#5E91E6] mt-7">
                Already have an account?
                <span class="text-[#FF2B2BB2]"
                ><a href="/login">Login</a></span
                >
            </p>
        </div>
    </section>
    <!-- <script src="./js/onboard.js"></script> -->
</x-layout>