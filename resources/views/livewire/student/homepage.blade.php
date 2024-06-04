<div class="bg-gray-100 min-h-[100svh]">
    {{-- header --}}
    <x-asset.student.header />

    {{-- search --}}
    <div class="h-[13rem] relative z-0 flex justify-center items-center">
        <img src="{{ asset('asset/campaign-creators-gMsnXqILjp4-unsplash.jpg') }}"
            class="h-[13rem] -z-10 brightness-50 absolute w-full object-cover" alt="">
        <form wire:submit="searchCompany" class="flex items-center gap-1">
            <select wire:model='search' class="border border-black/30 rounded-lg px-3 py-2   text-sm w-[15rem]">

                    <option value="">Choose Location</option>
                    <option value="Manila">Manila</option>
                    <option value="Quezon City">Quezon City</option>
                    <option value="Caloocan">Caloocan</option>
                    <option value="Las Piñas">Las Piñas</option>
                    <option value="Makati">Makati</option>
                    <option value="Malabon">Malabon</option>
                    <option value="Mandaluyong">Mandaluyong</option>
                    <option value="Marikina">Marikina</option>
                    <option value="Muntinlupa">Muntinlupa</option>
                    <option value="Navotas">Navotas</option>
                    <option value="Parañaque">Parañaque</option>
                    <option value="Pasay">Pasay</option>
                    <option value="Pasig">Pasig</option>
                    <option value="Pateros">Pateros</option>
                    <option value="San Juan">San Juan</option>
                    <option value="Taguig">Taguig</option>
                    <option value="Valenzuela">Valenzuela</option>

            </select>

            <button type="submit" class="py-2 px-3 bg-blue-500 rounded-lg text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

            </button>
        </form>
    </div>

    {{-- company --}}
    <section class="max-w-screen-xl px-6 xl:px-0 mx-auto py-10">
        <div class="grid grid-cols-4 gap-10">
            @forelse ($companies as $company)
                <div class="bg-white border py-2 shadow">
                    <img src="{{ asset('storage/' . $company->company_profile) }}"
                        class="w-[7rem] h-[7rem] mx-auto rounded-full" alt="">
                    <div class=" w-full grid  pt-3 ">
                        <a href="{{ route('student.company', ['company' => $company->company_name, 'id' => $company->id]) }}"
                            class="text-blue-600 underline mx-auto font-semibold">{{ $company->company_name }}</a>
                        <p class="mx-auto"> Review: {{ number_format($company->reviews_avg_rating,1) }}</p>
                        <p class="mx-auto">Available Job: {{ $company->jobs_count }}</p>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
    </section>
</div>
