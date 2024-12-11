@php
use App\Helpers\MeasureHelper;
@endphp
@section('title','Dashboard')


<div class="">
    <input type="hidden" id="device_uuid" value="{{ Auth::user()->current_device_id }}">

    <div class="p-12">
        <div class="grid grid-cols-3 bg-white">
            <div class="col-span-3 p-8">
                <h3 class="text-3xl font-semibold">
                    Analiticas en tiempo real
                </h3>
            </div>
            <div class="col-span-2 flex flex-col justify-center items-center">
                <div class="w-full text-center">
                    {{-- <h5 class="text-2xl">Consumo</h5> --}}
                </div>
                {{--LINK IN DASBHOARD.JS--}}
                <div id="areaMeasure" class="w-3/5 h-3/5"></div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <div class="w-full text-center">
                    <h5 class="text-2xl">Consumo actual </h5>
                </div>
                {{--LINK IN DASBHOARD.JS--}}
                <div id="realtimeBar" class="w-3/5 h-3/5"></div>
            </div>
            <div class="col-span-3 py-12 flex justify-center">
                <div class="stats shadow">
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-figure text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="inline-block h-8 w-8 stroke-current"
                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path
                                        d="M5.996 9c1.413 0 2.16-.747 2.705-1.293.49-.49.731-.707 1.292-.707s.802.217 1.292.707C11.83 8.253 12.577 9 13.991 9c1.415 0 2.163-.747 2.71-1.293.491-.49.732-.707 1.295-.707s.804.217 1.295.707C19.837 8.253 20.585 9 22 9V7c-.563 0-.804-.217-1.295-.707C20.159 5.747 19.411 5 17.996 5s-2.162.747-2.709 1.292c-.491.491-.731.708-1.296.708-.562 0-.802-.217-1.292-.707C12.154 5.747 11.407 5 9.993 5s-2.161.747-2.706 1.293c-.49.49-.73.707-1.291.707s-.801-.217-1.291-.707C4.16 5.747 3.413 5 2 5v2c.561 0 .801.217 1.291.707C3.836 8.253 4.583 9 5.996 9zm0 5c1.413 0 2.16-.747 2.705-1.293.49-.49.731-.707 1.292-.707s.802.217 1.292.707c.545.546 1.292 1.293 2.706 1.293 1.415 0 2.163-.747 2.71-1.293.491-.49.732-.707 1.295-.707s.804.217 1.295.707C19.837 13.253 20.585 14 22 14v-2c-.563 0-.804-.217-1.295-.707-.546-.546-1.294-1.293-2.709-1.293s-2.162.747-2.709 1.292c-.491.491-.731.708-1.296.708-.562 0-.802-.217-1.292-.707C12.154 10.747 11.407 10 9.993 10s-2.161.747-2.706 1.293c-.49.49-.73.707-1.291.707s-.801-.217-1.291-.707C4.16 10.747 3.413 10 2 10v2c.561 0 .801.217 1.291.707C3.836 13.253 4.583 14 5.996 14zm0 5c1.413 0 2.16-.747 2.705-1.293.49-.49.731-.707 1.292-.707s.802.217 1.292.707c.545.546 1.292 1.293 2.706 1.293 1.415 0 2.163-.747 2.71-1.293.491-.49.732-.707 1.295-.707s.804.217 1.295.707C19.837 18.253 20.585 19 22 19v-2c-.563 0-.804-.217-1.295-.707-.546-.546-1.294-1.293-2.709-1.293s-2.162.747-2.709 1.292c-.491.491-.731.708-1.296.708-.562 0-.802-.217-1.292-.707C12.154 15.747 11.407 15 9.993 15s-2.161.747-2.706 1.293c-.49.49-.73.707-1.291.707s-.801-.217-1.291-.707C4.16 15.747 3.413 15 2 15v2c.561 0 .801.217 1.291.707C3.836 18.253 4.583 19 5.996 19z">
                                    </path>
                                </svg>
                            </div>
                            <div class="stat-title">Uso promedio diariamente</div>
                            <div class="stat-value">
                                {{MeasureHelper::avarageConsumption(Auth::user()->current_device_id)}} Lt</div>
                            {{-- <div class="stat-desc"></div> mas adelante --}}
                        </div>

                        <div class="stat">
                            <div class="stat-figure text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"
                                    class="inline-block h-8 w-8 stroke-current">
                                    <path
                                        d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z">
                                    </path>
                                </svg>
                            </div>
                            <div class="stat-title">Hora con mas uso</div>
                            <div class="stat-value">
                                {{MeasureHelper::avarageTimeConsum(Auth::user()->current_device_id)}}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-figure text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="inline-block h-8 w-8 stroke-current"
                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path
                                        d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z">
                                    </path>
                                    <path d="M7 10v2h10V9H7z"></path>
                                </svg>
                            </div>
                            <div class="stat-title">Día de la semana con mas uso</div>
                            <div class="stat-value">{{MeasureHelper::averageDayConsum(Auth::user()->current_device_id)}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
</div>