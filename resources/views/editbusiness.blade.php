<x-layout>
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Update Business Info
                        </h2>
                        <p class="mb-4">Edit: {{$user->business_name}}</p>
                    </header>

                    <form method="POST" action="{{ route('update.business', $user) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-6">
                            <label
                                for="name"
                                class="inline-block text-lg mb-2"
                                >Owners Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="name" value="{{$user->name}}" 
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Owners Email</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                placeholder="example@gmail.com" value="{{$user->email}}" 
                            />

                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="phone_number"
                                class="inline-block text-lg mb-2"
                                >Owners Phone Number</label
                            >
                            <input
                                type="tel"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location" value="{{$user->phone_number}}" 
                            />

                            @error('phone_number')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="business_name" class="inline-block text-lg mb-2"
                                >Business Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="business_name" value="{{$user->business_nmae}}" 
                            />

                            @error('business_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="company_email"
                                class="inline-block text-lg mb-2"
                            >
                                Business Email
                            </label>
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="business_email" value="{{$user->business_email}}" 
                            />

                            @error('business_email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button type="submit"
                                class=""
                            >
                                Update
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
</x-layout>