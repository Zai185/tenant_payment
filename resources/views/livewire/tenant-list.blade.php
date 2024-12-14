<x-layouts.dashboard>
    <div
        class="relative w-full  overflow-auto rounded-md border border-main-border bg-surface shadow-lg shadow-gray-400">
        <!-- // TODO FIX COLOR CODE 400  -->
        <table class="w-full text-left text-sm text-main-text rtl:text-right">
            <thead class="bg-primary  text-xs uppercase text-primary-text">
                <tr>
                    <th scope="col" class="px-4 py-3">Customer name</th>
                    <th scope="col" class="px-4 py-3">Date/Time</th>
                    <th scope="col" class="px-4 py-3">Location</th>
                    <th scope="col" class="px-4 py-3">Total</th>
                </tr>
            </thead>

            <tbody>
                <tr
                    class="border-b bg-surface text-main-text odd:bg-surface even:bg-accent">
                    <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium">
                        Aaliyah Martinez
                    </th>
                    <td class="px-4 py-3">Feb 17, 2024</td>
                    <td class="px-4 py-3">
                        <p class="w-28 truncate">123 Main Street, Anytown, USA</p>
                    </td>
                    <td class="px-4 py-3">$2999</td>
                </tr>

                <tr
                    class="border-b bg-surface text-main-text odd:bg-surface even:bg-accent">
                    <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium">
                        Cameron Williamson
                    </th>
                    <td class="px-4 py-3">Feb 17, 2024</td>
                    <td class="px-4 py-3">
                        <p class="w-28 truncate">456 Elm Avenue, Smallville, CA</p>
                    </td>
                    <td class="px-4 py-3">$1999</td>
                </tr>

                <tr
                    class="border-b bg-surface text-main-text odd:bg-surface even:bg-accent">
                    <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium">
                        Lindsay Walton
                    </th>
                    <td class="px-4 py-3">Feb 17, 2024</td>
                    <td class="px-4 py-3">
                        <p class="w-28 truncate">789 Maple Lane, Pleasantville, NY</p>
                    </td>
                    <td class="px-4 py-3">$99</td>
                </tr>

                <tr
                    class="border-b bg-surface text-main-text odd:bg-surface even:bg-accent">
                    <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium">
                        Leonard Krasner
                    </th>
                    <td class="px-4 py-3">Feb 17, 2024</td>
                    <td class="px-4 py-3">
                        <p class="w-28 truncate">890 Birch Boulevard, Riverside, WA</p>
                    </td>
                    <td class="px-4 py-3">$799</td>
                </tr>

                <tr class="bg-surface text-main-text odd:bg-surface even:bg-accent">
                    <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium">
                        Alexander Hernandez
                    </th>
                    <td class="px-4 py-3">Feb 17, 2024</td>
                    <td class="px-4 py-3">
                        <p class="w-28 truncate">329 Second Street Dallas</p>
                    </td>
                    <td class="px-4 py-3">$999</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layouts.dashboard>