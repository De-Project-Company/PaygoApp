<x-layout>
    <x-slot name="title">PayGo - Add Client</x-slot>
    @include('partials._nav-menu')
    @include('partials._menu-side-bar')


    <div class="sm:w-[80%] md:h-[500px] md:border md:border-solid rounded-[20px] md:flex md:flex-col md:justify-center items-center">

        <div class="flex flex-col  items-center justify-between md:justify-center  h-screen md:h-full mt-10 ">

            <!-- client text and svg -->
            <div class="flex items-center md:hidden w-full">
                <span class="flex-1"></span>
                <p class="w-[58px] flex-1 h-[23px]  col-span-2 col-start-2  font-poppins font-semibold text-base justify-self-center">Clients</p>

                <div class="flex flex-1 justify-evenly items-center">
                    <a href="" class="flex justify-center w-[20px] h-[20px] border border-black rounded-full items-center">
                        <img src="../assets/svgs/Vector.svg" alt="">
                    </a>


                    <a href="" class="w-[20px] flex items-center h-[33px] font-poppins text-[32px] leading-[48px] font-semibold">+</a>
                </div>


            </div>
            <!--end of  client text and svg -->

            <!-- input tag for search -->

            <form class="flex justify-center  md:hidden" >
                <div class="w-[309px] flex items-center px-6 h-[34px] rounded-[18px] border border-[#6C6A6A]">
                    <span class="w-[14px] flex justify-center mx-2  items-center">
                        <img src="../assets/svgs/Search.svg" alt="">
                    </span>
                    <input type="text" name="" id="" placeholder="Search" class="focus:outline-none  px-2 text-[9px] leading-[13.5px] font-normal text-black text-opacity-[31%] ">
                </div>
            </form>

            <!-- end of input tag for search -->

            <!-- customer segmentation image -->
            <div class="flex justify-center px-5 py-6">
                <img src="../assets/svgs/Customer segmentation and target audience.svg" alt="">
            </div>
            <!-- end of customer segmentation image -->

            <!-- text div -->
            <div class="flex justify-center flex-col items-center text-center">
                <p class="w-[322px] h-[71px] font-poppins font-medium text-base ">
                    Create customers to quickly pre-fill their information while creating invoices
                </p>
                <a href="" class="flex justify-center font-poppins items-center w-[146px] h-[40px] rounded-2xl border px-[32px] py-[8px] gap-[8px] text-[#3676E0] border-[#3676E0] font-bold text-base whitespace-nowrap"><span class="font-semibold text-[32px] leading-[48px]">+</span> Add new </a>

            </div>
            <!-- end of text div -->

            <!-- bottom navbar -->

            <div class="flex justify-evenly md:hidden items-end w-[390px] h-[81px]  px-1 py-3 text-sm ">
                <div>
                    <a href="" class="flex flex-col items-center">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_147_196)">
                                <path d="M18.1856 8.89778L13.9172 13.0939C13.4568 12.8721 12.9328 12.8202 12.4378 12.9474C11.9428 13.0746 11.5087 13.3726 11.2122 13.7889C10.9157 14.2052 10.7759 14.7129 10.8175 15.2222C10.8591 15.7316 11.0794 16.2099 11.4395 16.5725C11.7996 16.9352 12.2763 17.1589 12.7854 17.2041C13.2944 17.2493 13.8031 17.1131 14.2215 16.8195C14.6398 16.526 14.9409 16.094 15.0716 15.5999C15.2023 15.1058 15.1541 14.5814 14.9356 14.1194L19.2111 9.92334L18.1856 8.89778Z" fill="#111111"/>
                                <path d="M13 3.06945C10.727 3.06685 8.50065 3.71478 6.58401 4.93674C4.66736 6.15869 3.14044 7.90362 2.18357 9.96544C1.2267 12.0273 0.87986 14.3199 1.18401 16.5725C1.48816 18.825 2.43059 20.9436 3.9 22.6778L4.11667 22.9306H21.8833L22.1 22.6778C23.5694 20.9436 24.5118 18.825 24.816 16.5725C25.1201 14.3199 24.7733 12.0273 23.8164 9.96544C22.8596 7.90362 21.3326 6.15869 19.416 4.93674C17.4993 3.71478 15.273 3.06685 13 3.06945ZM21.19 21.4861H4.81C3.5141 19.8645 2.73198 17.8929 2.56389 15.8239H5.05556V14.3794H2.56389C2.68484 12.0862 3.56089 9.89734 5.05556 8.15389L6.825 9.92334L7.84333 8.90501L6.08833 7.12834C7.80958 5.607 9.98582 4.69791 12.2778 4.54278V7.07056H13.7222V4.55001C16.254 4.73361 18.6323 5.8324 20.4132 7.64121C22.1941 9.45001 23.2558 11.8452 23.4 14.3794H20.8867V15.8239H23.4361C23.268 17.8929 22.4859 19.8645 21.19 21.4861Z" fill="#111111"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_147_196">
                                    <rect width="26" height="26" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Dashboard</p>
                    </a>
                </div>

                <div>
                    <a href=""  class="flex flex-col items-center " >
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.28965 9.34537C7.01559 9.8443 6.31697 10.9941 6.08578 12.6922C4.21603 14.3797 3.79359 15.9862 5.7449 17.7621C5.85065 20.6212 7.75753 22.3059 10.8074 23.2464C11.1185 23.6588 11.5279 23.9867 11.9982 24.2002C12.4686 24.4137 12.9849 24.506 13.5001 24.4687C14.0153 24.506 14.5316 24.4137 15.002 24.2002C15.4723 23.9867 15.8817 23.6588 16.1928 23.2464C19.2427 22.3065 21.1495 20.6212 21.2553 17.7621C23.2066 15.9862 22.7842 14.3792 20.9144 12.6922C20.6827 10.9941 19.9846 9.8443 18.7105 9.34537" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.5 6.89287C13.5 0.789744 7.18421 2.68987 5.11084 3.27374C5.51696 5.78474 6.21503 8.31318 8.28953 9.34537C11.16 10.7736 13.5 8.88468 13.5 6.89287ZM13.5 6.89287C13.5 0.789744 19.8157 2.68987 21.8891 3.27374C21.483 5.78474 20.7855 8.31318 18.7104 9.34537C15.84 10.7736 13.5 8.88468 13.5 6.89287Z" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0404 7.09594C10.8199 5.84929 9.28724 4.953 7.60229 4.50056M15.0729 7.09594C16.2932 5.84938 17.8257 4.9531 19.5104 4.50056" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.5018 21.6388C16.4565 21.6388 18.8517 19.2426 18.8517 16.2866C18.8517 13.3307 16.4565 10.9344 13.5018 10.9344C10.5471 10.9344 8.15186 13.3307 8.15186 16.2866C8.15186 19.2426 10.5471 21.6388 13.5018 21.6388Z" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.0024 15.1273V17.4819C11.0021 17.5851 11.029 17.6866 11.0803 17.7761C11.1317 17.8656 11.2057 17.94 11.295 17.9917C11.3842 18.0435 11.4856 18.0709 11.5887 18.071C11.6919 18.0712 11.7933 18.0442 11.8828 17.9927L12.7366 17.5016L13.0865 17.3014V15.5098C13.0865 15.4485 13.0703 15.3883 13.0396 15.3353C13.0089 15.2822 12.9647 15.2382 12.9116 15.2077L11.8822 14.6166C11.7928 14.5654 11.6915 14.5386 11.5884 14.5389C11.4854 14.5393 11.3842 14.5667 11.2951 14.6184C11.206 14.6701 11.1321 14.7444 11.0807 14.8337C11.0293 14.923 11.0023 15.0243 11.0024 15.1273Z" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.0867 17.4302V15.1802C13.0873 15.067 13.1176 14.956 13.1746 14.8582C13.2316 14.7604 13.3132 14.6792 13.4114 14.6229C13.5096 14.5665 13.6208 14.5369 13.734 14.537C13.8472 14.537 13.9583 14.5668 14.0564 14.6233L14.0677 14.6301L16.0179 15.7489C16.0909 15.7918 16.1547 15.8487 16.2057 15.9163C16.2566 15.9839 16.2937 16.0609 16.3149 16.1429C16.336 16.2249 16.3407 16.3103 16.3287 16.3942C16.3167 16.478 16.2883 16.5586 16.2451 16.6314C16.1887 16.7251 16.1108 16.804 16.0179 16.8615L16.0066 16.8677L14.0564 17.9871C13.9079 18.0722 13.7317 18.0952 13.5663 18.051C13.4009 18.0069 13.2597 17.8992 13.1733 17.7514C13.1166 17.6538 13.0867 17.543 13.0867 17.4302Z" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <!-- when active -->
                        <p class="underline font-bold">Client</p>
                        <!--end of when active -->
                    </a>

                </div>

                <div>
                    <a href="" class="flex flex-col items-center">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.89893 21.1675H16.5064C19.4124 21.1675 21.7679 18.8115 21.7679 15.906V2.8325H11.1639C10.4661 2.8325 9.79694 3.1097 9.30353 3.60311C8.81012 4.09651 8.53293 4.76572 8.53293 5.4635L8.52943 8.0135" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.75 12.6955H8.0115M11.2185 12.6955H17.899M11.2185 16.0885H17.899M5.381 8.0135H8.0115V18.5365C8.01124 19.2341 7.73402 19.9031 7.24078 20.3964C6.74754 20.8898 6.07862 21.1671 5.381 21.1675C4.6833 21.1672 4.01425 20.89 3.52089 20.3966C3.02754 19.9033 2.75027 19.2342 2.75 18.5365V10.644C2.7504 9.94638 3.02774 9.27746 3.52107 8.78422C4.01441 8.29098 4.68338 8.01377 5.381 8.0135ZM11.2185 6.6575H14.1375V9.5765H11.2185V6.6575Z" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>Invoices</p>
                    </a>
                </div>

                <div>
                    <a href="" class="flex flex-col items-center">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.49734 4.62295C5.4088 3.68943 6.49801 2.94793 7.7007 2.44221C8.90339 1.93649 10.1952 1.67681 11.4999 1.67847C16.9116 1.67847 21.2988 6.06525 21.2988 11.477C21.2988 16.8887 16.9116 21.2759 11.4999 21.2759C6.08818 21.2759 1.70093 16.8882 1.70093 11.4765C1.70093 9.58568 2.23712 7.81995 3.16478 6.32256" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.7674 11.4157C14.7674 11.6944 14.6567 11.9618 14.4595 12.1589C14.2624 12.356 13.9951 12.4667 13.7163 12.4667C13.4376 12.4667 13.1702 12.356 12.9731 12.1589C12.776 11.9618 12.6653 11.6944 12.6653 11.4157C12.6653 10.8354 13.1358 10.3649 13.7161 10.3649C14.2964 10.3649 14.7674 10.8354 14.7674 11.4157Z" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.811 8.16503H16.9429C17.2961 8.16427 17.6352 8.30381 17.8855 8.55299C18.1358 8.80216 18.277 9.14055 18.2779 9.49376V13.3319C18.2785 13.6851 18.1388 14.0241 17.8896 14.2743C17.6403 14.5246 17.3019 14.6656 16.9487 14.6664H11.811C11.4578 14.6671 11.1188 14.5276 10.8684 14.2784C10.6181 14.0292 10.477 13.6908 10.4761 13.3376V9.49951C10.4757 9.32458 10.5098 9.15128 10.5764 8.98952C10.643 8.82776 10.7408 8.6807 10.8642 8.55674C10.9876 8.43278 11.1343 8.33434 11.2957 8.26705C11.4572 8.19976 11.6304 8.16493 11.8053 8.16455H11.811V8.16503Z" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.1782 14.6442V15.9619C17.1786 16.1369 17.1446 16.3102 17.078 16.472C17.0115 16.6337 16.9138 16.7808 16.7904 16.9049C16.667 17.0289 16.5204 17.1273 16.3589 17.1947C16.1975 17.262 16.0244 17.2969 15.8494 17.2974H6.90482C6.72989 17.2978 6.5566 17.2637 6.39484 17.1971C6.23308 17.1305 6.08602 17.0327 5.96206 16.9093C5.83809 16.7858 5.73966 16.6392 5.67236 16.4777C5.60507 16.3162 5.57024 16.1431 5.56987 15.9682V6.99194C5.56949 6.81701 5.60357 6.64372 5.67016 6.48196C5.73676 6.3202 5.83456 6.17314 5.95799 6.04917C6.08142 5.92521 6.22805 5.82677 6.38953 5.75948C6.551 5.69219 6.72414 5.65736 6.89907 5.65698H15.8427C16.1959 5.65635 16.5349 5.79602 16.7852 6.04528C17.0354 6.29454 17.1764 6.63299 17.1772 6.98619V8.18603M0.694824 7.93638L3.27993 6.04271L3.62732 9.22821" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>Expenses</p>
                    </a>
                </div>

                <div>
                    <a href="" class="flex flex-col items-center">
                        <svg width="31" height="9" viewBox="0 0 31 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="4.5" cy="4.5" r="2" stroke="#4A4848"/>
                            <circle cx="15.5" cy="4.5" r="2" stroke="#4A4848"/>
                            <circle cx="26.5" cy="4.5" r="2" stroke="#4A4848"/>
                            <circle cx="4.5" cy="4.5" r="4" stroke="#4A4848"/>
                            <circle cx="15.5" cy="4.5" r="4" stroke="#4A4848"/>
                            <circle cx="26.5" cy="4.5" r="4" stroke="#4A4848"/>
                        </svg>
                        <p class="mt-1">More</p>
                    </a>
                </div>

            </div>

        </div>
    </div>
    </main>
    </div>

</x-layout>
