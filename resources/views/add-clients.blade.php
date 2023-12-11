<x-layout>
    <x-slot name="title">PayGo - Add Client</x-slot>
@include('partials._nav-menu')
    @include('partials._menu-side-bar')
            <div class="w-[80%] h-[500px] border border-solid rounded-[20px] px-4 ms:px-20 py-10">
                <h1 class="text-4xl font-bold text-center pb-12">Add Client</h1>
                <div class="flex justify-between mb-8">
                    <p>Select Client type</p>
                    <div x-data="{ isToggled: false }" class="flex">
                        <button @click="isToggled = !isToggled" class="border border-black w-[20px] h-[20px] rounded-full relative flex justify-center items-center">
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
                                <div x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-211 h-100 bg-white border border-gray-300 rounded shadow-lg">
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
    </main>
    </div>

</x-layout>
