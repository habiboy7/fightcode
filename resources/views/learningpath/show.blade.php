@extends('layouts.layout')

@section('content')
    <div class="min-h-screen py-12 px-4">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Checkout Kelas</h2>
            <p class="text-lg text-gray-600">Bergabung dengan kami di kelas Premium dan membangun sebuah real-world project
            </p>
        </div>

        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Course Preview -->
            <div class="bg-white rounded-lg shadow p-4 min-h-[300px]">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                    class="rounded mb-6 w-full object-cover">
                <h3 class="text-lg text-center font-semibold text-gray-900">{{ $course->title }}</h3>
                <p class="text-sm text-center text-gray-600 mt-2">{{ $course->deskripsi }}</p>
            </div>

            <!-- Payment Detail -->
            <div class="bg-white rounded-lg shadow p-6 flex flex-col justify-between">
                <div>
                    <h4 class="text-xl text-center font-bold mb-6">Detail Pembayaran</h4>

                    {{-- Select Metode Pembayaran --}}
                    <div class="mb-4">
                        <label for="payment_method" class="block text-gray-700 font-semibold mb-2">Metode Pembayaran</label>
                        <select id="payment_method" name="payment_method"
                            class="w-full border rounded p-2 focus:ring focus:ring-teal-500">
                            <option value="">-- Pilih Metode Pembayaran --</option>
                            <option value="bank_transfer">Transfer Bank</option>
                            <option value="e_wallet">E-Wallet</option>
                            <option value="qris">QRIS</option>
                        </select>
                    </div>

                    <div id="bank_options" class="hidden mb-4">
                        <label for="bank" class="block text-gray-700 font-semibold mb-2">Pilih Bank</label>
                        <select id="bank" name="bank" class="w-full border rounded p-2">
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                        </select>
                    </div>

                    <div id="ewallet_options" class="hidden mb-4">
                        <label for="ewallet" class="block text-gray-700 font-semibold mb-2">Pilih E-Wallet</label>
                        <select id="ewallet" name="ewallet" class="w-full border rounded p-2">
                            <option value="DANA">DANA</option>
                            <option value="GoPay">GoPay</option>
                        </select>
                    </div>

                    {{-- Harga dan Diskon --}}
                    <div class="mb-3 font-semibold flex justify-between text-base">
                        <span class="text-gray-700">Harga Normal</span>
                        <span class="text-gray-900 font-medium">Rp {{ number_format($course->price, 0, ',', '.') }}</span>
                    </div>

                    @php
                        $discount = $course->price * 0.167;
                        $finalPrice = $course->price - $discount;
                    @endphp

                    <div class="mb-3 font-semibold flex justify-between text-base">
                        <span class="text-gray-700">Diskon</span>
                        <span class="text-teal-500 font-medium">Rp {{ number_format($discount, 0, ',', '.') }}</span>
                    </div>

                    <div class="mb-6 flex justify-between text-lg font-bold">
                        <span class="text-gray-900">Total Harga</span>
                        <span class="text-gray-900">Rp {{ number_format($finalPrice, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- Status tombol --}}
                @if ($isPurchased)
                    <div class="text-center">
                        <p class="text-green-600 font-semibold mb-4">Anda sudah membeli course ini.</p>
                        <a href="{{ route('my-course') }}"
                            class="w-full inline-block text-center bg-teal-600 hover:bg-teal-700 text-white py-2 rounded transition">
                            Dashboard Saya
                        </a>
                    </div>
                @else
                    <button onclick="bayarSekarang({{ $course->id }})"
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 rounded transition mt-4">
                        Bayar Sekarang
                    </button>
                @endif
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script>
        document.getElementById('payment_method').addEventListener('change', function() {
            const selected = this.value;
            document.getElementById('bank_options').classList.add('hidden');
            document.getElementById('ewallet_options').classList.add('hidden');

            if (selected === 'bank_transfer') {
                document.getElementById('bank_options').classList.remove('hidden');
            } else if (selected === 'e_wallet') {
                document.getElementById('ewallet_options').classList.remove('hidden');
            }
        });

        function bayarSekarang(courseId) {
            @guest
            window.location.href = "{{ route('login') }}";
        @else
            const paymentMethod = document.getElementById('payment_method').value;

            if (!paymentMethod) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Pilih Metode Pembayaran!',
                    text: 'Silakan pilih metode pembayaran terlebih dahulu.',
                });
                return;
            }

            Swal.fire({
                title: 'Mohon Tunggu...',
                text: 'Proses pembayaran sedang diproses',
                icon: 'info',
                showConfirmButton: false,
                timer: 2000,
                didOpen: () => {
                    Swal.showLoading();
                }
            }).then(() => {
                // Setelah loading selesai, tampilkan alert sukses dulu
                Swal.fire({
                    icon: 'success',
                    title: 'Pembayaran Berhasil!',
                    text: 'Anda akan diarahkan ke Dashboard My Course',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    // Baru submit form
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/checkout/' + courseId;

                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    form.appendChild(csrfToken);

                    if (!paymentMethod || paymentMethod.trim() === '') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Metode Pembayaran Kosong',
                            text: 'Silakan pilih metode pembayaran terlebih dahulu.',
                        });
                        return;
                    }
                    const inputMethod = document.createElement('input');
                    inputMethod.type = 'hidden';
                    inputMethod.name = 'payment_method';
                    inputMethod.value = paymentMethod.trim();
                    form.appendChild(inputMethod);


                    const inputPrice = document.createElement('input');
                    inputPrice.type = 'hidden';
                    inputPrice.name = 'price_paid';
                    inputPrice.value = '{{ $finalPrice }}';
                    form.appendChild(inputPrice);

                    document.body.appendChild(form);
                    form.submit();
                });
            });
        @endguest
        }
    </script>
@endsection
