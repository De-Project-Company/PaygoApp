<x-layout>
        <h1 class="text-2xl font-semibold mb-6">Transaction Dashboard XXX</h1>

        <div class="mb-4">
            <label for="dateRange" class="block text-sm font-medium text-gray-600">Sort By:</label>
            <select id="dateRange" class="mt-1 block w-full p-2 border rounded">
                <option value="month">Month</option>
                <option value="week">Week</option>
                <option value="3months">3 Months</option>
                <option value="6months">6 Months</option>
                <option value="year">Year</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-600">Status:</label>
            <select id="status" class="mt-1 block w-full p-2 border rounded">
                <option value="success">Success</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
            </select>
        </div>

        <div class="mb-4 flex items-center">
            <input type="text" placeholder="Search..." class="flex-1 p-2 border rounded mr-2">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
            <tr>
                <th class="p-3 text-left">Amount</th>
                <th class="p-3 text-left">Customer</th>
                <th class="p-3 text-left">Reference</th>
                <th class="p-3 text-left">Payment Method</th>
                <th class="p-3 text-left">Date Paid</th>
            </tr>
            </thead>
            <tbody>
            <!-- Sample data, replace with actual data -->
            <tr>
                <td class="p-3 border"> $100.00 </td>
                <td class="p-3 border"> John Doe </td>
                <td class="p-3 border"> REF123456 </td>
                <td class="p-3 border"> Credit Card </td>
                <td class="p-3 border"> 2023-11-22 </td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>
</x-layout>
