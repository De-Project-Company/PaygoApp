<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Generate QR Code with Payment Information
        </h2>
        <p class="mb-4">Generate QR Code for: {{Auth::user()->business_name}}</p>
    </header>

    <form method="POST" action="{{ route('generate.qrcode') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="bank_name"
                class="inline-block text-lg mb-2"
                >Bank Name</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="bank_name" value="{{Auth::user()->bank_name}}" placeholder="Enter bank name"/>
            @error('bank_name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="account_number" class="inline-block text-lg mb-2"
                >Account Number</label>
            <input
                type="number"
                class="border border-gray-200 rounded p-2 w-full"
                name="account_number" value="{{Auth::user()->account_number}}"
                placeholder="Enter account number"/>

            @error('account_number')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="account_name"
                class="inline-block text-lg mb-2"
                >Account Name</label>
            <input
                type="account-name"
                class="border border-gray-200 rounded p-2 w-full"
                name="account_name" value="{{Auth::user()->account_name}}"/>

            @error('account_name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit">
                Generate QR Code
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-layout>