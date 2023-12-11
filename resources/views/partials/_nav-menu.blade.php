<header class="w-[100%] hidden h-[100px] md:flex flex-col justify-end items-center">
    <nav class="w-[100%] h-[70px] flex flex-row justify-between">
        <div class="w-[15%] h-full flex flex-row justify-start items-center">
            <img
                class="mr-[10px]"
                src="{{asset('storage/images/arrow-left.svg')}}"
                alt="back"
            />
            <img src="{{asset('storage/images/paygo-logo.svg')}}" alt="paygo" />
        </div>
        <div class="w-[82%] h-full flex pr-10 justify-start items-center">
            <div class="w-[127px] h-[35px] rounded-[6px] border border-solid flex flex-row justify-around items-center">
                <img src="{{asset('storage/images/add-icon.svg')}}" alt="" />
                <span class="text-[12px]">New</span>
                <span class="text-[12px]">(Cntrl+Q)</span>
            </div>
            <div
                class="w-[539px] h-[35px] mx-4 rounded-[6px] border border-solid flex  flex-row items-center"
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
                    class="w-[400px] h-full pl-[10px] focus:outline-none"
                    type="text"
                    placeholder="Search"
                />
            </div>
            <div class="w-[15%] h-full flex flex-row  justify-end items-center">
                <div
                    class="w-[80%] h-full flex flex-row justify-around items-center"
                >
                    <img
                        class="w-[18px] h-[18px] rounded-md px-1 py-1 bg-[#D9D9D9]"
                        src="{{asset('storage/images/notification-icon.svg')}}"
                        alt=""
                    />
                    <img
                        class="w-[18px] h-[18px] rounded-md px-1 py-1 bg-[#D9D9D9]"
                        src="{{asset('storage/images/settings-icon.svg')}}"
                        alt=""
                    />
                    <div
                        class="w-[25px] h-[24px] flex flex-col justify-center items-center"
                    >
                        <img
                            class="w-[18px] h-[18px] rounded-md px-1 py-1 bg-[#D9D9D9]"
                            src="{{asset('storage/images/question-mark.svg')}}"
                            alt=""
                        />
                    </div>
                    <img
                        class="w-[18px] h-[18px] rounded-md "
                        src="{{asset('storage/images/profile-display-picture-icon.svg')}}"
                        alt=""
                    />
                </div>
            </div>
        </div>
    </nav>
</header>
