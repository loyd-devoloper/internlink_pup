<div class="bg-gray-100 min-h-[100svh]">
    {{-- header --}}
    <x-asset.student.header />

    {{-- company --}}
    <section class="max-w-screen-xl px-6 xl:px-0 mx-auto py-10 ">

        <main class="flex gap-5 w-full">
            <div class="min-w-[25rem] max-w-[25rem] space-y-5">
                <div class="bg-white p-4 rounded-md space-y-2 shadow">
                    <img src="{{ asset('asset/campaign-creators-gMsnXqILjp4-unsplash.jpg') }}"
                        class="w-[9rem] h-[9rem] border-2 border-blue-500 mx-auto rounded-full" alt="">
                    <h1 class="text-center font-semibold">
                        {{ Auth::guard('student')->user()->firstname . ' ' . Auth::guard('student')->user()->lastname }}
                    </h1>
                    <h1 class="text-center font-semibold font-mono text-xs opacity-50">
                        {{ Auth::guard('student')->user()->course }}</h1>
                </div>
                @if ($check)
                    <div class="bg-white grid gap-2 p-3 ">
                       @if (!!$check->linkedin)
                       <div class="flex items-center gap-3  text-sm">
                        <svg class="min-w-12 max-w-12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                            fill="none">
                            <path fill="#0A66C2"
                                d="M12.225 12.225h-1.778V9.44c0-.664-.012-1.519-.925-1.519-.926 0-1.068.724-1.068 1.47v2.834H6.676V6.498h1.707v.783h.024c.348-.594.996-.95 1.684-.925 1.802 0 2.135 1.185 2.135 2.728l-.001 3.14zM4.67 5.715a1.037 1.037 0 01-1.032-1.031c0-.566.466-1.032 1.032-1.032.566 0 1.031.466 1.032 1.032 0 .566-.466 1.032-1.032 1.032zm.889 6.51h-1.78V6.498h1.78v5.727zM13.11 2H2.885A.88.88 0 002 2.866v10.268a.88.88 0 00.885.866h10.226a.882.882 0 00.889-.866V2.865a.88.88 0 00-.889-.864z" />
                        </svg>
                        {{ $check->linkedin }}
                    </div>
                       @endif
                        @if (!!$check->github)
                        <div class="flex items-center gap-3  text-sm">
                            <svg class="min-w-12 max-w-12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>github</title>
                                <rect width="24" height="24" fill="none" />
                                <path
                                    d="M12,2A10,10,0,0,0,8.84,21.5c.5.08.66-.23.66-.5V19.31C6.73,19.91,6.14,18,6.14,18A2.69,2.69,0,0,0,5,16.5c-.91-.62.07-.6.07-.6a2.1,2.1,0,0,1,1.53,1,2.15,2.15,0,0,0,2.91.83,2.16,2.16,0,0,1,.63-1.34C8,16.17,5.62,15.31,5.62,11.5a3.87,3.87,0,0,1,1-2.71,3.58,3.58,0,0,1,.1-2.64s.84-.27,2.75,1a9.63,9.63,0,0,1,5,0c1.91-1.29,2.75-1,2.75-1a3.58,3.58,0,0,1,.1,2.64,3.87,3.87,0,0,1,1,2.71c0,3.82-2.34,4.66-4.57,4.91a2.39,2.39,0,0,1,.69,1.85V21c0,.27.16.59.67.5A10,10,0,0,0,12,2Z" />
                            </svg>
                            {{ $check->github }}
                        </div>
                        @endif
                        @if (!!$check->facebook)
                        <div class="flex items-center gap-3 text-sm">
                            <svg class="min-w-12 max-w-12" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16" cy="16" r="14" fill="url(#paint0_linear_87_7208)" />
                                <path
                                    d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z"
                                    fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear_87_7208" x1="16" y1="2"
                                        x2="16" y2="29.917" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#18ACFE" />
                                        <stop offset="1" stop-color="#0163E0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                           {{ $check->facebook }}
                        </div>
                        @endif
                    </div>
                @endif
            </div>

                <div class="w-full space-y-5">
                    <div class="bg-white p-4 rounded-md space-y-2 shadow">
                        <h1 class="text-lg font-extrabold">Basic Information</h1>
                        <p class="flex items-center gap-3 pt-4">Fullname: <span
                                class="text-gray-500">{{ Auth::guard('student')->user()->firstname . ' ' . Auth::guard('student')->user()->lastname }}</span>
                        </p>
                        <hr>
                        <p class="flex items-center gap-3 py-2">Email: <span
                                class="text-gray-500">{{ Auth::guard('student')->user()->email }}</span></p>
                        <hr>
                        <p class="flex items-center gap-3 py-2">Mobile Number: <span
                                class="text-gray-500">{{ Auth::guard('student')->user()->mobile_number }}</span></p>
                        <hr>
                        <p class="flex items-center gap-3 py-2">Student Number: <span
                                class="text-gray-500">{{ Auth::guard('student')->user()->student_number }}</span></p>
                        <hr>
                        <p class="flex items-center gap-3 py-2">Complete Address: <span
                                class="text-gray-500">{{ Auth::guard('student')->user()->address }}</span></p>


                        {{ $this->modalFormAction }}
                    </div>
                    @if (!!$check)
                    <div class="bg-white grid grid-cols-1  p-4">
                        <div class="mb-8">
                            <h3
                                class="text-xl text-gray-900 uppercase mb-4 flex items-center font-semibold hover:scale-[1.02] transition-all duration-1000 ease-in-out">
                                <div
                                    class=" w-10 h-10 bg-resume text-white rounded-full flex items-center justify-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path fill-rule="evenodd"
                                            d="M14.447 3.026a.75.75 0 0 1 .527.921l-4.5 16.5a.75.75 0 0 1-1.448-.394l4.5-16.5a.75.75 0 0 1 .921-.527ZM16.72 6.22a.75.75 0 0 1 1.06 0l5.25 5.25a.75.75 0 0 1 0 1.06l-5.25 5.25a.75.75 0 1 1-1.06-1.06L21.44 12l-4.72-4.72a.75.75 0 0 1 0-1.06Zm-9.44 0a.75.75 0 0 1 0 1.06L2.56 12l4.72 4.72a.75.75 0 0 1-1.06 1.06L.97 12.53a.75.75 0 0 1 0-1.06l5.25-5.25a.75.75 0 0 1 1.06 0Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </div>

                                Programming Skills
                            </h3>
                            <ul>
                                @if (!!$check->pskill1)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->prating1 }}"><span
                                            class="block w-32">{{ $check->pskill1 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->prating1 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->pskill2)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->prating2 }}"><span
                                            class="block w-32">{{ $check->pskill2 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->prating2 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->pskill3)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->prating3 }}"><span
                                            class="block w-32">{{ $check->pskill3 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->prating3 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->pskill4)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->prating4 }}"><span
                                            class="block w-32">{{ $check->pskill4 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->prating4 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->pskill5)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->prating5 }}"><span
                                            class="block w-32">{{ $check->pskill5 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->prating5 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="mb-8">
                            <h3
                                class="text-xl text-gray-900 uppercase mb-4 flex items-center font-semibold hover:scale-[1.02] transition-all duration-1000 ease-in-out">
                                <div
                                    class=" w-10 h-10 bg-resume text-white rounded-full flex items-center justify-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z" />
                                        <path fill-rule="evenodd"
                                            d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </div>

                                Hardware Skills
                            </h3>
                            <ul>
                                @if (!!$check->hskill1)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->hrating1 }}"><span
                                            class="block w-32">{{ $check->hskill1 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->hrating1 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->hskill2)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->hrating2 }}"><span
                                            class="block w-32">{{ $check->hskill2 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->hrating2 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->hskill3)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->hrating3 }}"><span
                                            class="block w-32">{{ $check->hskill3 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->hrating3 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->hskill4)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->hrating4 }}"><span
                                            class="block w-32">{{ $check->hskill4 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->hrating4 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                                @if (!!$check->hskill5)
                                    <li class="mb-4 flex items-center" data-percent="{{ $check->hrating5 }}"><span
                                            class="block w-32">{{ $check->hskill5 }}</span>
                                        <div class="bg-gray-300 w-full h-1 rounded-full relative">
                                            <div class="bg-resume h-1 rounded-full"
                                                style="width: {{ $check->hrating5 }}%;"></div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div>
                            <h3
                                class="text-xl text-gray-900 uppercase mb-4 flex items-center font-semibold hover:scale-[1.02] transition-all duration-1000 ease-in-out">
                                <div
                                    class=" w-10 h-10 bg-resume text-white rounded-full flex items-center justify-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path d="M16.5 7.5h-9v9h9v-9Z" />
                                        <path fill-rule="evenodd"
                                            d="M8.25 2.25A.75.75 0 0 1 9 3v.75h2.25V3a.75.75 0 0 1 1.5 0v.75H15V3a.75.75 0 0 1 1.5 0v.75h.75a3 3 0 0 1 3 3v.75H21A.75.75 0 0 1 21 9h-.75v2.25H21a.75.75 0 0 1 0 1.5h-.75V15H21a.75.75 0 0 1 0 1.5h-.75v.75a3 3 0 0 1-3 3h-.75V21a.75.75 0 0 1-1.5 0v-.75h-2.25V21a.75.75 0 0 1-1.5 0v-.75H9V21a.75.75 0 0 1-1.5 0v-.75h-.75a3 3 0 0 1-3-3v-.75H3A.75.75 0 0 1 3 15h.75v-2.25H3a.75.75 0 0 1 0-1.5h.75V9H3a.75.75 0 0 1 0-1.5h.75v-.75a3 3 0 0 1 3-3h.75V3a.75.75 0 0 1 .75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h10.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V6.75Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                </div>

                                Software Skills
                            </h3>
                            <ul class="grid grid-cols-3">

                                @if (!!$check->sskill1)
                                    <li class="list-none relative flex justify-center" x-data="{ percent: 283 - (283 * ({{ $check->srating3 }} / 100)) }">
                                        <svg viewBox="0 0 100 100" class="w-44 h-44 ">
                                            <circle cx="50" cy="50" r="45"
                                                class="fill-transparent stroke-gray-300 stroke-2"></circle>
                                            <circle cx="50" cy="50" r="45"
                                                class="fill-transparent stroke-resume stroke-[3] percent-circle"
                                                :style="`stroke-dasharray: 283; stroke-dashoffset:${percent}`"></circle>
                                            {{-- calc(283 - (283 * 99 / 100)) --}}

                                        </svg>
                                        <span
                                            class="absolute top-1/2 pb-5 left-1/2 text-center -translate-x-1/2 -translate-y-1/2">{{ $check->sskill1 }}</span>
                                        <small
                                            class="absolute top-1/2 pt-32 left-1/2 -translate-x-1/2 -translate-y-1/2">{{ $check->srating1 }}%</small>
                                    </li>
                                @endif
                                @if (!!$check->sskill2)
                                    <li class="list-none relative flex justify-center" x-data="{ percent: 283 - (283 * ({{ $check->srating2 }} / 100)) }">
                                        <svg viewBox="0 0 100 100" class="w-44 h-44 ">
                                            <circle cx="50" cy="50" r="45"
                                                class="fill-transparent stroke-gray-300 stroke-2"></circle>
                                            <circle cx="50" cy="50" r="45"
                                                class="fill-transparent stroke-resume stroke-[3] percent-circle"
                                                :style="`stroke-dasharray: 283; stroke-dashoffset:${percent}`"></circle>
                                            {{-- calc(283 - (283 * 99 / 100)) --}}

                                        </svg>
                                        <span
                                            class="absolute top-1/2 pb-5 left-1/2 text-center -translate-x-1/2 -translate-y-1/2">{{ $check->sskill2 }}</span>
                                        <small
                                            class="absolute top-1/2 pt-32 left-1/2 -translate-x-1/2 -translate-y-1/2">{{ $check->srating2 }}%</small>
                                    </li>
                                @endif
                                @if (!!$check->sskill3)
                                    <li class="list-none relative flex justify-center" x-data="{ percent: 283 - (283 * ({{ $check->srating3 }} / 100)) }">
                                        <svg viewBox="0 0 100 100" class="w-44 h-44 ">
                                            <circle cx="50" cy="50" r="45"
                                                class="fill-transparent stroke-gray-300 stroke-2"></circle>
                                            <circle cx="50" cy="50" r="45"
                                                class="fill-transparent stroke-resume stroke-[3] percent-circle"
                                                :style="`stroke-dasharray: 283; stroke-dashoffset:${percent}`"></circle>
                                            {{-- calc(283 - (283 * 99 / 100)) --}}

                                        </svg>
                                        <span
                                            class="absolute top-1/2 pb-5 left-1/2 text-center -translate-x-1/2 -translate-y-1/2">{{ $check->sskill3 }}</span>
                                        <small
                                            class="absolute top-1/2 pt-32 left-1/2 -translate-x-1/2 -translate-y-1/2">{{ $check->srating3 }}%</small>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    @endif
                </div>


        </main>
    </section>

    <x-filament-actions::modals />



</div>
