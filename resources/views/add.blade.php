<x-layout>
    <div class="w-[100%]  flex flex-col justify-center items-center">
        <header class="w-[100%] h-[100px] flex flex-col justify-end items-center">
            <nav
                class="w-[90%] h-[70px] flex flex-row justify-between items-center"
            >
                <div class="w-[15%] h-full flex flex-row justify-start items-center">
                    <img
                        class="mr-[10px]"
                        src="../assets/svgs/arrow-left.svg"
                        alt="back"
                    />
                    <img src="../assets/svgs/paygo-logo.svg" alt="paygo" />
                </div>
                <div class="w-[60%] h-full flex flex-row justify-around items-center">
                    <div
                        class="w-[127px] h-[35px] rounded-[6px] border border-solid flex flex-row justify-around items-center"
                    >
                        <img src="../assets/svgs/add-icon.svg" alt="" />
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
                                src="../assets/svgs/search-icon.svg"
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
                            src="../assets/svgs/notification-icon.svg"
                            alt=""
                        />
                        <img
                            class="w-[18px] h-[18px] bg-[#D9D9D9]"
                            src="../assets/svgs/settings-icon.svg"
                            alt=""
                        />
                        <div
                            class="w-[25px] h-[24px] border border-solid flex flex-col justify-center items-center"
                        >
                            <img
                                class="w-[18px] h-[18px] bg-[#D9D9D9]"
                                src="../assets/svgs/question-mark-icon.svg"
                                alt=""
                            />
                        </div>
                        <img
                            class="w-[18px] h-[18px]"
                            src="../assets/svgs/profile-display-picture-icon.svg"
                            alt=""
                        />
                    </div>
                </div>
            </nav>
        </header>
        <main class="w-[90%] flex flex-row justify-center items-center">
            <div class="w-[20%] flex h-[500px] flex-col justify-start items-end">
                <div
                    class="w-[98%] h-[80%] flex flex-col justify-between items-start"
                >
                    <div
                        class="w-[100%] h-[70px] flex flex-col justify-start items-start"
                    >
                        <img
                            class="w-[23px] h-[23px]"
                            src="../assets/svgs/hamburger-menu-icon.svg"
                            alt=""
                        />
                    </div>
                    <div
                        class="w-[100%] h-[50px] flex flex-col justify-between items-start"
                    >
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[20px] h-[20px] mr-[7px]"
                                src="../assets/svgs/home-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Dashboard</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[20px] h-[20px] mr-[7px]"
                                src="../assets/svgs/items-icon.svg"
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
                                src="../assets/svgs/profile-icon.svg"
                                alt=""
                            />
                            <a href="" class="text-[14px]">Clients</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[23px] h-[23px] mr-[7px]"
                                src="../assets/svgs/invoice-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Invoices</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[23px] h-[23px] mr-[7px]"
                                src="../assets/svgs/sales-receipt-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Sales Receipt</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[23px] h-[23px] mr-[7px]"
                                src="../assets/svgs/payment-receipt-icon.svg"
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
                                src="../assets/svgs/expenses-icon.svg"
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
                                src="../assets/svgs/project-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">Projects</a>
                        </div>
                        <div class="flex flex-row justify-center items-center">
                            <img
                                class="w-[20px] h-[20px] mr-[7px]"
                                src="../assets/svgs/clock-icon.svg"
                                alt=""
                            />
                            <a class="text-[14px]">TimeSheet</a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-[80%] h-[500px] border border-solid rounded-[20px] px-4 ms:px-20 py-10"
            >
                <h1 class="text-4xl font-bold text-center pb-12">Add Client</h1>
                <div class="flex justify-between mb-8">
                    <p>Select Client type</p>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button
                            @click="isToggled = !isToggled"
                            class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center"
                        >
                            <svg
                                class="tick-icon w-6 h-6 text-black absolute opacity-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                x-show="isToggled"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                        </button>
                        <p>Business</p>
                    </div>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button
                            @click="isToggled = !isToggled"
                            class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center"
                        >
                            <svg
                                class="tick-icon w-6 h-6 text-black absolute opacity-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                x-show="isToggled"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                        </button>
                        <p>Individual</p>
                    </div>
                </div>

                <div class="flex justify-between">
                    <p>Salutation</p>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button
                            @click="isToggled = !isToggled"
                            class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center"
                        >
                            <svg
                                class="tick-icon w-6 h-6 text-black absolute opacity-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                x-show="isToggled"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                        </button>
                        <p>Mr</p>
                    </div>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button
                            @click="isToggled = !isToggled"
                            class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center"
                        >
                            <svg
                                class="tick-icon w-6 h-6 text-black absolute opacity-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                x-show="isToggled"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                        </button>
                        <p>Mrs.</p>
                    </div>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button
                            @click="isToggled = !isToggled"
                            class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center"
                        >
                            <svg
                                class="tick-icon w-6 h-6 text-black absolute opacity-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                x-show="isToggled"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                        </button>
                        <p>Dr.</p>
                    </div>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button
                            @click="isToggled = !isToggled"
                            class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center"
                        >
                            <svg
                                class="tick-icon w-6 h-6 text-black absolute opacity-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                x-show="isToggled"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                        </button>
                        <p>Miss</p>
                    </div>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button
                            @click="isToggled = !isToggled"
                            class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center"
                        >
                            <svg
                                class="tick-icon w-6 h-6 text-black absolute opacity-0"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                x-show="isToggled"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                        </button>
                        <p>None</p>
                    </div>
                </div>
                <form
                    action=""
                    class="grid grid-cols-2 gap-x-7 gap-y-14 border border-green-700"
                >
                    <div class="flex flex-col">
                        <label for="" class="font-medium text-[13px] block"
                        >First Name:</label
                        >
                        <input
                            type="text"
                            name=""
                            id=""
                            class="border border-#727272 h-[45px]"
                        />
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-medium text-[13px] block"
                        >Last Name:</label
                        >
                        <input
                            type="text"
                            name=""
                            id=""
                            class="border border-[#727272] h-[45px]"
                        />
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-medium text-[13px] block"
                        >Email Address:</label
                        >
                        <input
                            type="text"
                            name=""
                            id=""
                            class="border border-[#727272] h-[45px]"
                        />
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-medium text-[13px] block"
                        >Phone Number:</label
                        >
                        <input
                            type="text"
                            name=""
                            id=""
                            class="border border-[#727272] h-[45px]"
                        />
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-medium text-[13px] block"
                        >Website:</label
                        >
                        <input
                            type="text"
                            name=""
                            id=""
                            class="border border-[#727272] h-[45px]"
                        />
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-medium text-[13px] block"
                        >Address 1:</label
                        >
                        <input
                            type="text"
                            name=""
                            id=""
                            class="border border-[#727272] h-[45px]"
                        />
                    </div>
                </form>
                <div>
                    <h2>OTHER DETAILS</h2>
                    <div>
                        <p>Currency</p>
                        <div>
                            NGN
                            <div x-data="{ isOpen: false }" class="relative inline-block">
                                <button
                                    @click="isOpen = !isOpen"
                                    class="px-4 py-2 bg-gray-200"
                                >

                                </button>
                                <div
                                    x-show="isOpen"
                                    @click.away="isOpen = false"
                                    class="absolute z-10 w-211 h-100 bg-white border border-gray-300 rounded shadow-lg"
                                >
                                    <!-- Dropdown content -->
                                    <p class="p-4">Dropdown Item 1</p>
                                    <p class="p-4">Dropdown Item 2</p>
                                    <p class="p-4">Dropdown Item 3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"
        defer
    ></script>
    <!-- <script src="/dist/js/checkbox.js"></script>÷ -->
</x-layout>
