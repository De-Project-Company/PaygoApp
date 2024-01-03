<x-layout>
    <div class="flex flex-col items-center justify-center px-4 py-6 col ">
        @if($errors->any())
        <div>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif
        
        @if(session()->has('success'))
        <div>{{session('success')}}</div>
        @endif
        
        <img src="./svgs/PAYGO.svg" class="py-4 my-10 m" alt="">
        <p class="font-semibold w-[157px] h-[23px] mb-5 py-3 pb-6 text-center leading-6">Reset Password</p>
        <p class="font-semibold w-[157px] h-[23px] mb-5 py-3 pb-6 text-center leading-6">Kindly check your email for the link to reset your password.</p>
    </div>
        <div class="flex flex-col items-center justify-center px-4 py-6">
    
    
            <!-- reset password form start-->
            <div class="w-full px-3 my-7">
                <form method="POST" action="{{ route('reset.password') }}"
                    class="flex flex-col text-center  items-center space-y-6">
                    @csrf
                    <input type="text" hidden value="{{$token}}" name="token">
                    <input type="text" name="email" class="leading-[19.5px] text-[13px] font-semibold border border-[#00000069] focus:outline-none rounded-[13px] h-[51px] w-[332px] px-3" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                    <input type="password" name="password" class="leading-[19.5px] rounded-[13px] text-[13px] font-semibold border focus:outline-none border-[#00000069] h-[51px] w-[332px] px-3" placeholder="Enter New Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <input type="password" name="password_confirmation" class="leading-[19.5px] rounded-[13px] text-[13px] font-semibold border focus:outline-none border-[#00000069] h-[51px] w-[332px] px-3" placeholder="Confirm Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
    
                    <!-- reset password button -->
                    <div class="flex flex-col my-10 items-center text-center ">
                        <input type="submit" value="Send" class=" my-4 w-[211px] h-[44px] px-[42px] py-[12px] rounded-2xl bg-blue-500 text-white font-semibold text-[13px] leading-[19.5px]">
                        <!-- reset password button -->
                </form>
                <!-- reset password form end-->
            </div>
        </div>
    </x-layout>
    