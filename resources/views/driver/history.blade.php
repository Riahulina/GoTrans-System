<x-app-layout>

    <div class="min-h-screen bg-[#0b1220] flex items-center justify-center p-4">

        <!-- FRAME -->
        <div
            class="w-full max-w-sm h-[90vh]
            bg-[#0b1220] text-white
            rounded-3xl shadow-2xl
            flex flex-col
            border border-white/10
            overflow-hidden">

            <!-- HEADER -->
            <div class="p-5 text-center border-b border-white/10">

                <h1 class="text-2xl font-bold tracking-wide">
                    Riwayat Pengantaran
                </h1>

                <p class="text-gray-400 text-sm mt-1">
                    Riwayat perjalanan driver
                </p>

            </div>

            <!-- TABLE HEADER -->
            <div
                class="grid grid-cols-3 px-4 py-3
                text-gray-400 text-sm
                border-b border-white/10">

                <span>Jam</span>

                <span class="text-center">
                    Penumpang
                </span>

                <span class="text-right">
                    Tarif
                </span>

            </div>

            <!-- LIST -->
            <div class="flex-1 overflow-y-auto px-3 py-3 space-y-3">

                @php
                    $total = 0;
                @endphp

                @forelse ($orders as $order)
                    @php
                        $total += $order->harga;
                    @endphp

                    <div class="history-item">

                        <!-- JAM -->
                        <span>
                            {{ $order->created_at->format('H:i') }}
                        </span>

                        <!-- USER -->
                        <span class="text-center">

                            {{ $order->user->nama }}

                        </span>

                        <!-- HARGA -->
                        <span class="text-right text-green-400 font-semibold">

                            Rp{{ number_format($order->harga) }}

                        </span>

                    </div>

                @empty

                    <div
                        class="bg-white/5 border border-white/10
                        rounded-2xl p-5 text-center text-gray-400">

                        Belum ada riwayat perjalanan

                    </div>
                @endforelse

            </div>

            <!-- FOOTER -->
            <div class="p-4 border-t border-white/10 bg-white/5">

                <!-- TOTAL -->
                <div class="flex justify-between items-center mb-4">

                    <span class="text-gray-400">
                        Total Pendapatan
                    </span>

                    <span class="text-lg font-bold text-green-400">

                        Rp{{ number_format($total) }}

                    </span>

                </div>

                <!-- BUTTON HOME -->
                <a href="{{ url('/driver/') }}"
                    class="block w-full text-center
                    bg-green-500 hover:bg-green-600
                    transition-all duration-300
                    py-4 rounded-2xl
                    font-bold">

                    Home

                </a>

            </div>

        </div>

    </div>

    <!-- STYLE -->
    <style>
        .history-item {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;

            align-items: center;

            padding: 14px;

            border-radius: 18px;

            background: rgba(255, 255, 255, 0.05);

            border: 1px solid rgba(255, 255, 255, 0.08);

            transition: 0.3s;
        }

        .history-item:hover {
            background: rgba(255, 255, 255, 0.08);
        }
    </style>

</x-app-layout>
