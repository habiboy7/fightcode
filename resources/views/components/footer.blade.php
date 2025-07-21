<footer class="border-t border-gray-300 pt-6">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <div class="text-2xl font-bold mb-4">FightCode</div>
                <div class="text-gray-800 space-y-2">
                    <p>FightCode Academy Space</p>
                    <p>Jl. Angkasa Raya Java No.7,</p>
                    <p>Kec. SukaSehat, Kab. Banyumas</p>
                    <p>Jawa Tengah 67143</p>
                </div>

                <div class="flex items-center gap-2 space-x-6 mt-4">
                    <a href="https://www.instagram.com/mkhabibii_/" target="_blank" aria-label="Instagram">
                        <iconify-icon icon="mdi:instagram"
                            class="text-gray-600 hover:text-gray-800 transition-colors duration-300" width="30"
                            height="30"></iconify-icon>
                    </a>

                    <a href="https://wa.me/6281227556950" target="_blank" aria-label="Whatsapp">
                        <iconify-icon icon="mdi:whatsapp"
                            class="text-gray-600 hover:text-gray-800 transition-colors duration-300" width="30"
                            height="30"></iconify-icon>
                    </a>

                    <a href="https://www.youtube.com/@MuhammadKhoerulHabibi" target="_blank" aria-label="Youtube">
                        <iconify-icon icon="si:youtube-line"
                            class="text-gray-600 hover:text-gray-800 transition-colors duration-300" width="32"
                            height="32"></iconify-icon>
                    </a>

                    <a href="https://www.linkedin.com/in/muhammadkhoerulhabibi/" target="_blank" aria-label="LinkedIn">
                        <iconify-icon icon="mdi:linkedin"
                            class="text-gray-600 hover:text-gray-800 transition-colors duration-300" width="30"
                            height="30"></iconify-icon>
                    </a>

                </div>

            </div>
            <div class="h-full mx-auto">
                <h3 class="text-lg font-bold text-gray-900 mb-4 mt-1">Connect - Expand - Grow</h3>
                <div class="space-y-2 text-gray-800">
                    <a href="{{ route('dampak') }}" class="hover:underline ">Tentang Kami</a> <br>
                    @if (request()->is('/'))
                        <a href="#testimoni" class="hover:underline">Testimoni</a>
                    @else
                        <a href="{{ url('/#testimoni') }}" class="hover:underline">Testimoni</a>
                    @endif
                </div>
            </div>
            <div class="h-full mx-auto">
                <div class="space-y-2 text-gray-800">
                    <a href="https://wa.me/6281227556950" class="hover:underline ">Hubungi Kami</a> <br>
                    @if (request()->is('/'))
                        <a href="#FAQ" class="hover:underline">FAQ</a>
                    @else
                        <a href="{{ url('/#FAQ') }}" class="hover:underline">FAQ</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="border-t border-gray-300 mt-8 pt-4 text-center text-black">
            <p>© FightCode 2025 | Bersama tumbuh, bersama belajar, untuk masa depan teknologi Indonesia</p>
        </div>
    </div>
</footer>
