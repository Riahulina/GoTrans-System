<x-app-layout>

    <div class="min-h-screen bg-[#0b1220] flex items-center justify-center px-4">

        <div
            class="w-full max-w-sm h-[90vh] bg-[#0b1220] text-white rounded-3xl shadow-2xl p-5 border border-white/10 flex flex-col">

            <!-- TITLE -->
            <h1 class="text-xl font-semibold mb-6 text-center">
                Detail Ulasan
            </h1>

            <!-- PROFILE -->
            <div class="flex items-center gap-3 mb-6">

                <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center text-sm font-bold">
                    {{ strtoupper(substr($rating->driver->name ?? 'DR', 0, 2)) }}
                </div>

                <div class="flex-1">
                    <h2 class="font-bold text-lg">
                        {{ $rating->driver->name ?? 'Driver Tidak Diketahui' }}
                    </h2>

                    <p class="text-gray-400 text-xs">
                        {{ $rating->created_at ? $rating->created_at->format('d M Y, H:i') : '-' }}
                    </p>
                </div>

            </div>

            <!-- STARS -->
            <div class="flex justify-center gap-1 text-2xl mb-6">

                @for ($i = 1; $i <= 5; $i++)
                    <span class="{{ $i <= $rating->nilai ? 'text-yellow-300' : 'text-gray-600' }}">
                        ⭐
                    </span>
                @endfor

            </div>

            <!-- COMMENT CARD -->
            <div class="relative bg-white/10 rounded-2xl p-4 text-center mb-8 backdrop-blur-md">

                <p class="text-gray-200 font-medium leading-relaxed">
                    "{{ $rating->komentar ?? 'Tidak ada komentar dari user' }}"
                </p>

                <!-- triangle -->
                <div
                    class="absolute left-6 -bottom-3 w-0 h-0 border-l-[10px] border-l-transparent border-r-[10px] border-r-transparent border-t-[12px] border-t-white/10">
                </div>

            </div>

            <!-- INFO LABEL -->
            <div class="flex-1 flex items-end justify-center">

                <div class="relative bg-white/10 rounded-2xl px-4 py-5 text-center text-xs text-gray-300">

                    <p class="tracking-wide">
                        ⭐ Rating diberikan oleh user setelah perjalanan selesai
                    </p>

                </div>

            </div>

            <!-- BUTTON -->
            <button onclick="goBack()"
                class="mt-6 w-full py-3 rounded-xl bg-white/10 hover:bg-white/20 active:scale-95 transition text-sm">

                ← Kembali
            </button>

            <button>
                <a href="{{ route('driver.home') }}"
                    class="mt-6 w-full py-3 rounded-xl bg-white/10 hover:bg-white/20 active:scale-95 transition text-sm text-center block">

                    Home
                </a>
            </button>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</x-app-layout>
