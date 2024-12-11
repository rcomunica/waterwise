<div class="bg-[#00C0DD] h-screen">
    <div class="flex items-center justify-center w-full h-full">
        <div class="w-4/5 h-4/5 bg-white grid grid-rows-6">
            <div class="grid grid-cols-2 items-center">
                <div class="px-5">
                    <h3 class="text-3xl">Escanea el codigo QR y obten el identificador</h3>
                </div>
                <div class="px-5">
                    <ol class="flex w-full items-center gap-2" aria-label="registration progress">
                        <!-- completed step -->
                        <li class="text-sm">
                            <div class="flex items-center gap-2" aria-label="create an account">
                                <span
                                    class="flex size-6 items-center justify-center rounded-full border border-blue-700 bg-blue-700 text-slate-100">
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <span class="sr-only">completed</span>
                                </span>
                            </div>
                        </li>
                        <!-- current step -->
                        <li class="flex w-full items-center text-sm" aria-current="step" aria-label="choose a plan">
                            <span class="h-0.5 w-full bg-blue-700" aria-hidden="true"></span>
                            <div class="flex items-center gap-2 pl-2">
                                <span
                                    class="flex size-6 flex-shrink-0 items-center justify-center rounded-full border border-blue-700 bg-blue-700 font-bold text-slate-100 outline outline-2 outline-offset-2 outline-blue-700 dark:border-blue-600 dark:bg-blue-600 dark:text-slate-100 dark:outline-blue-600">2</span>
                            </div>
                        </li>
                        <li class="flex w-full items-center text-sm" aria-label="checkout">
                            <span class="h-0.5 w-full bg-slate-300 dark:bg-slate-700" aria-hidden="true"></span>
                            <div class="flex items-center gap-2 pl-2">
                                <span
                                    class="flex size-6 flex-shrink-0 items-center justify-center rounded-full border border-slate-300 bg-slate-100 font-medium text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">3</span>
                            </div>
                        </li>
                        <li aria-label="start trial" class="flex w-full items-center text-sm">
                            <span aria-hidden="true" class="h-0.5 w-full bg-slate-300 dark:bg-slate-700"></span>
                            <div class="flex items-center gap-2 pl-2">
                                <span
                                    class="flex size-6 flex-shrink-0 items-center justify-center rounded-full border border-slate-300 bg-slate-100 font-medium text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">4</span>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row-span-4 grid grid-cols-2 items-center justify-items-center">
                <div class=""><img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
                </div>
                <div class="">
                    <ul class="flex gap-5 flex-col">
                        <li>1: Use Water Wise on your computer</li>
                        <li>2: Download in the Google Play</li>
                        <li>3: Open QR menu</li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>