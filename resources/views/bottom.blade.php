<x-layout>
    <div class="w-[100%] bg-black flex flex-col justify-center items-center">
        <header class="w-[100%] h-[100px] flex flex-col justify-end items-center">
            <nav
                class="w-[90%] h-[70px] flex flex-row justify-between items-center"
            >
                <div class="w-[15%] h-full flex flex-row justify-start items-center">
                    <img
                        class="mr-[10px]"
                        src="{{asset('storage/images/arrow-left.svg')}}"
                        alt="back"
                    />
                    <img src="{{asset('storage/images/paygo-logo.svg')}}" alt="paygo" />
                </div>
                <div class="w-[60%] h-full flex flex-row justify-around items-center">
                    <div
                        class="w-[127px] h-[35px] rounded-[6px] border border-solid flex flex-row justify-around items-center"
                    >
                        <img src="{{asset('storage/images/add-icon.svg')}}" alt="" />
                        <span class="text-[12px]">New</span>
                        <span class="text-[12px]">(Cntrl+Q)</span>
                    </div>
                    <div
                        class="w-[539px] h-[35px] rounded-[6px] border border-solid flex flex-row justify-center items-center"
                    >
                        <div
                            class="w-[40px] h-full flex flex-col justify-center items-center"
                        >
                            <img
                                class="w-[18px] h-[18px]"
                                src="{{asset('storage/images/search-icon.svg')}}"
                                alt=""
                            />
                        </div>
                        <input
                            class="w-[498px] h-full pl-[10px]"
                            type="text"
                            placeholder="Search"
                        />
                    </div>
                </div>
                <div class="w-[15%] h-full flex flex-row justify-start items-center">
                    <div
                        class="w-[80%] h-full flex flex-row justify-around items-center"
                    >
                        <img
                            class="w-[18px] h-[18px] bg-[#D9D9D9]"
                            src="../../assets/svgs/notification-icon.svg"
                            alt=""
                        />
                        <img
                            class="w-[18px] h-[18px] bg-[#D9D9D9]"
                            src="../../assets/svgs/settings-icon.svg"
                            alt=""
                        />
                        <div
                            class="w-[25px] h-[24px] border border-solid flex flex-col justify-center items-center"
                        >
                            <img
                                class="w-[18px] h-[18px] bg-[#D9D9D9]"
                                src="../../assets/svgs/question-mark-icon.svg"
                                alt=""
                            />
                        </div>
                        <img
                            class="w-[18px] h-[18px]"
                            src="../../assets/svgs/profile-display-picture-icon.svg"
                            alt=""
                        />
                    </div>
                </div>
            </nav>
        </header>
        <main class="w-[90%] border flex flex-row justify-center items-center">
            <div class="w-[20%] flex h-[500px] flex-col justify-start items-end">
                <div
                    class="w-[98%] h-[80%] flex flex-col justify-between items-start"
                >
                    <div
                        class="w-[100%] h-[70px] flex flex-col justify-start items-start"
                    >
                        <img
                            class="w-[23px] h-[23px]"
                            src="../../assets/svgs/hamburger-menu-icon.svg"
                            alt=""
                        />
                    </div>
                    <div
                        class="w-[100%] h-[50px] flex flex-col justify-between items-start"
                    >
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[20px] h-[20px] mr-[7px]"
                                src="../../assets/svgs/home-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Dashboard</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[20px] h-[20px] mr-[7px]"
                                src="../../assets/svgs/items-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Items</a>
                        </div>
                    </div>
                    <div
                        class="w-[100%] h-[120px] flex flex-col justify-around items-start"
                    >
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[23px] h-[23px] mr-[7px]"
                                src="../../assets/svgs/profile-icon.svg"
                                alt=""
                            />
                            <a href="" class="text-[14px]">Clients</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[23px] h-[23px] mr-[7px]"
                                src="../../assets/svgs/invoice-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Invoices</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[23px] h-[23px] mr-[7px]"
                                src="../../assets/svgs/sales-receipt-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Sales Receipt</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[23px] h-[23px] mr-[7px]"
                                src="../../assets/svgs/payment-receipt-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Payments Received</a>
                        </div>
                    </div>
                    <div
                        class="w-[100%] h-[30px] flex flex-col justify-between items-start"
                    >
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[22px] h-[23px] mr-[7px]"
                                src="../../assets/svgs/expenses-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Expenses</a>
                        </div>
                    </div>
                    <div
                        class="w-[100%] h-[50px] flex flex-col justify-between items-start"
                    >
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[20px] h-[20px] mr-[7px]"
                                src="../../assets/svgs/project-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Projects</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[20px] h-[20px] mr-[7px]"
                                src="../../assets/svgs/clock-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">TimeSheet</a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-[80%] h-[500px] border border-solid rounded-[20px] flex flex-col justify-center items-center"
            >
                <img src="/assets/svgs/clients 21.39.32.svg" alt="" />
                <p class="mt-[18px] mb-8 font-medium">
                    Create customers to quickly pre-fill their information while
                    creating invoices
                </p>
                <a
                    href="/dist/addClients.html"
                    class="my-8 text-[#3676E0] border border-blue-500 rounded-[16px] px-8 py-2 flex gap-2"
                ><img src="/assets/svgs/+.svg" alt="" /> Add new</a
                >
            </div>
        </main>
    </div>
</x-layout>
