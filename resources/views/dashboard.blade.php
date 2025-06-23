<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-5 flex-wrap">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://www.nickdaoquan.vn/assets/images/homepage-bg-1.jpg" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">nickdaoquan.vn</div>
                    <p class="text-gray-700 text-base">
                    Tạo tài khoản có email ở nickdaoquan.vn khớp với tài khoản ở master.nickdaoquan.vn sau đó đăng nhập vào nickdaoquan.vn bằng nút truy cập bên dưới
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <form method="POST" action="{{ route('sso.redirect') }}">
                        @csrf
                        <input type="hidden" name="client" value="nickdaoquan">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Truy cập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
