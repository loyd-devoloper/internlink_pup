<div class="bg-gray-100 min-h-[100svh] flex">
    {{-- aside --}}
  <x-asset.company.header/>
    {{-- header --}}

    <div class="w-full">
        <x-asset.company.topnav/>

            <div class="p-10">
                <div class="grid grid-cols-2 gap-10">
                    <div class="relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800">
                        <div class="space-y-2">
                            <div
                                class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
                                <span>Jobs</span>
                            </div>

                            <div class="text-3xl dark:text-gray-100">
                              {{ $jobs }}
                            </div>


                        </div>

                    </div>
                    <div class="relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800">
                        <div class="space-y-2">
                            <div
                                class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
                                <span>Applicants</span>
                            </div>

                            <div class="text-3xl dark:text-gray-100">
                                {{ $applicant }}
                            </div>


                        </div>

                    </div>
                </div>
            </div>
       </div>
</div>
