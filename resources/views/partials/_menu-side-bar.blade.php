<div class="w-[100%] h-auto bg-white flex flex-col justify-center px-4">
    <main class="w-[90%] h-auto flex flex-row justify-center items-center">
        <div class="w-[20%] hidden h-[500px] md:flex md:flex-col md:justify-start items-end">
            <div class="w-[98%] h-[80%] flex flex-col justify-between items-start">

                <div class="w-[100%] h-[70px] flex flex-col justify-items-center items-start space-y-4">
                    {{--<img
                        class="w-[23px] h-[23px]"
                        src="{{asset('storage/images/hamburger-menu-icon.svg')}}"
                        alt=""
                    />--}}

                    <div class="flex flex-row justify-start items-center">
                        <img
                            class="w-[20px] h-[20px] mr-[7px]"
                            src="{{asset('storage/images/home-icon.svg')}}"
                            alt=""
                        />
                        <a href="/dashboard" class="text-[14px]">Dashboard</a>
                    </div>




                    <div class="flex flex-row justify-start py-1   w-full items-center">
                        <img class="w-[23px] h-[23px] mr-[7px]" src="{{ asset('storage/images/profile-icon.svg') }}" alt="" />
                        <a href="/clients" class="text-[14px]"><span class="{{ request()->is('clients*') ?  'opacity-[100%] text-indigo-700 font-bold text-xl' : 'opacity-[74%]' }}">Clients</span></a>
                    </div>



                    {{--<div class="flex flex-row justify-start py-1  bg-[#ebf1fc] opacity-[74%] w-full items-center">
                        <img
                            class="w-[23px] h-[23px] mr-[7px]"
                            src="{{asset('storage/images/profile-icon.svg')}}"
                            alt=""
                        />
                        <a href="/clients" class="text-[14px]">Clients</a>
                    </div>--}}

                    <div class="flex flex-row justify-start {{ request()->is('invoices*') ? 'opacity-[100%]' : 'opacity-[74%]' }} py-1 items-center">
                        <img
                            class="w-[23px] h-[23px] mr-[7px]"
                            src="{{asset('storage/images/invoice-icon.svg')}}"
                            alt=""
                        />
                        <a href="/invoices" class="text-[14px]">Invoices</a>
                    </div>

                    <div class="flex flex-row justify-start py-1 items-center {{ request()->is('receipts*') ? 'opacity-[100%]' : 'opacity-[74%]' }} ">
                        <img
                            class="w-[23px] h-[23px] mr-[7px]"
                            src="{{asset('storage/images/sales-receipt-icon.svg')}}"
                            alt=""
                        />
                        <a href="/receipts" class="text-[14px]">Sales Receipt</a>
                    </div>

                    <div class="flex flex-row justify-start py-1 items-center {{ request()->is('payments-received*') ? 'opacity-[100%]' : 'opacity-[74%]' }} ">
                        <img
                            class="w-[23px] h-[23px] mr-[7px]"
                            src="{{asset('storage/images/payment-receipt-icon.svg')}}"
                            alt=""
                        />
                        <a href="/payments-received" class="text-[14px]">Payments Received</a>
                    </div>

                    <div class="flex flex-row justify-start py-1 items-center">
                        <img
                            class="w-[23px] h-[23px] mr-[7px]"
                            src="{{asset('storage/images/payment-receipt-icon.svg')}}"
                            alt=""
                        />
                        <a href="{{ route('edit.business', $user) }}" class="text-[14px]">Manage Business</a>
                    </div>


                </div>



            </div>
        </div>
