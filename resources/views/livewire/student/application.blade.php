<div class="bg-gray-100 min-h-[100svh]">
    {{-- header --}}
    <x-asset.student.header />


    {{-- company --}}
    <section class="max-w-screen-xl px-6 xl:px-0 mx-auto py-10 ">
        <div class="bg-white rounded shadow px-6 py-4">
            <div>
                <img src="{{ asset('storage/' . $job->company?->company_profile) }}" class="w-[8rem]" alt="">
            </div>
            <div>
                <h1 class="text-3xl font-extrabold">{{ $job->job_title }}</h1>
                <a href="{{ route('student.company', ['company' => $job->company?->company_name, 'id' => $job->company_id]) }}"
                    class="font-serif font-extralight flex items-center gap-1 text-blue-500">{{ $job->company?->company_name }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                      </svg>

                </a>

                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            clip-rule="evenodd" />
                    </svg>

                    {{ $job->location }}
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z"
                            clip-rule="evenodd" />
                    </svg>


                    {{ $job->category }}
                </div>
            </div>
            <small  class="text-black/50 ">Posted: {{ $job->created_at->diffForHumans() }}</small>



            <div class="mb-2" x-data="{description: false}">
                <article x-cloak x-show="description" x-transition class="prose px-2 py-6 ">
                    {!! $job->description !!}
                </article>
                <a type="button" x-on:click="description = !description" class="text-blue-500 text-sm cursor-pointer underline font-semibold">view description</a>
            </div>
            <hr>

           <form wire:submit="submitApplication" class="p-10">
            {{ $this->form }}
            <button type="submit" wire:confirm="Are you sure you want to delete this post?" class="px-6 py-2 mt-4 rounded bg-blue-500 text-white w-full">
                Submit Application
            </button>
           </form>
        </div>
    </section>
</div>
