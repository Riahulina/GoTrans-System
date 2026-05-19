<x-app-layout>

    <div class="min-h-screen bg-[#0b1220] flex items-center justify-center px-4">

        <div
            class="w-full max-w-sm h-[90vh]
            bg-[#0b1220]
            text-white rounded-3xl
            shadow-2xl flex flex-col
            border border-white/10 overflow-hidden">

            <!-- HEADER -->
            <div class="p-6 text-center border-b border-white/10">

                <h1 class="text-xl font-semibold">
                    ⭐ Rating & Ulasan
                </h1>

                <p class="text-xs text-gray-400 mt-1">
                    Feedback dari pengguna
                </p>

            </div>

            <!-- BODY -->
            <div class="flex-1 flex flex-col items-center justify-center px-6">

                <!-- STAR -->
                <div class="relative flex items-center justify-center mb-4">

                    <div
                        class="absolute w-40 h-40
                        bg-yellow-300 opacity-10
                        rounded-full blur-2xl animate-pulse">
                    </div>

                    <div class="text-[70px] text-yellow-300 animate-bounce">
                        ⭐
                    </div>

                </div>

                <!-- AVG RATING -->
                <p class="text-gray-300 text-center">

                    Rating kamu

                    <span class="text-yellow-300 font-bold text-lg">
                        {{ number_format($avgRating ?? 0, 1) }}
                    </span>

                    / 5

                </p>

                <p class="text-xs text-gray-500 mt-1 text-center">
                    Berdasarkan ulasan pengguna
                </p>

            </div>

            <!-- REVIEWS -->
            <div class="px-4 pb-3 flex-1 overflow-y-auto space-y-3">

                <h2 class="text-sm font-semibold text-gray-300 mb-2">
                    Ulasan Terbaru
                </h2>

                @forelse($ratings as $rating)
                    <div class="bg-white/10 rounded-xl
                        p-3 hover:bg-white/15 transition">

                        <!-- STAR -->
                        <div class="text-yellow-300 text-sm font-semibold">
                            ⭐ {{ $rating->nilai }}/5
                        </div>

                        <!-- COMMENT -->
                        <p class="text-sm text-gray-300 mt-1 leading-snug">
                            "{{ $rating->komentar ?? 'Tidak ada komentar' }}"
                        </p>

                        <!-- USER -->
                        <p class="text-xs text-gray-500 mt-2">
                            — {{ $rating->user->name ?? 'User' }}
                        </p>

                    </div>

                @empty

                    <div class="text-center text-gray-500 text-sm py-6">
                        Belum ada ulasan
                    </div>
                @endforelse

            </div>

            <!-- FOOTER -->
            <div class="p-4 border-t border-white/10">

                @if ($ratings->count())
                    <a href="{{ route('driver.review.detail', $ratings->first()->id) }}"
                        class="block w-full py-3 rounded-xl
                        bg-white/10 hover:bg-white/20
                        text-center text-sm font-medium
                        transition active:scale-95">

                        🔍 Lihat Detail Ulasan

                    </a>
                @endif

            </div>

        </div>

    </div>

</x-app-layout>
