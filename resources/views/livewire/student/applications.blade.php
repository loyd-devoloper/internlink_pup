<div class="bg-gray-100 min-h-[100svh]">
    {{-- header --}}
   <x-asset.student.header/>

   {{-- company --}}
   <section class="max-w-screen-xl px-6 xl:px-0 mx-auto py-10">
        <div>
            <h1 class="text-2xl font-bold">All Application</h1>
        </div>
        <div class="pt-10">

            {{ $this->table }}
        </div>
   </section>
</div>
