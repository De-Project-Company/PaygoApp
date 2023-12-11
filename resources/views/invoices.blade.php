<x-layout>
    <x-slot name="title">PayGo - Customers</x-slot>
    @include('partials._nav-menu')
    @include('partials._menu-side-bar')
    <div class="sm:w-[80%] md:h-[500px] md:border md:border-solid rounded-[20px] md:flex md:flex-col md:justify-center items-center">

        <div class="flex flex-col  items-center justify-between md:justify-center  h-screen md:h-full mt-10 ">

            <!-- customer segmentation image -->
            <div class="flex justify-center px-5 py-6">
                <img src="{{asset('storage/images/Piggy bank with calculator, money and calendar for accounting.svg')}}" alt="">
            </div>
            <!-- end of customer segmentation image -->

            <!-- text div -->
            <div class="flex justify-center flex-col items-center text-center">
                <p class="w-[322px] h-[71px] font-poppins font-medium text-base ">
                    Create Invoices to receive or record payments from your customers
                </p>
                <a href="/add-clients" class="flex justify-center font-poppins items-center w-[146px] h-[40px] rounded-2xl border px-[32px] py-[8px] gap-[8px] text-[#3676E0] border-[#3676E0] font-bold text-base whitespace-nowrap"><span class="font-semibold text-[32px] leading-[48px]">+</span> Add new </a>

            </div>
            <!-- end of text div -->


        </div>
    </div>
    </main>
    </div>

</x-layout>
