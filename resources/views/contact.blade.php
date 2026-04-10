@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Contact Us</h1>
            <p class="text-xl text-gray-600">Get in touch with our billing experts</p>
        </div>

        <div class="max-w-4xl mx-auto">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-8">
                <form method="POST" action="{{ route('contact.submit') }}" class="bg-white p-6 rounded-lg shadow-sm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                        <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-gray-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                        <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-gray-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Phone (Optional)</label>
                        <input type="text" name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-gray-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Message *</label>
                        <textarea name="message" required rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-gray-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gray-800 text-white font-semibold py-3 rounded-lg hover:bg-gray-900 transition">Send Message</button>
                </form>

                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-4">Our Information</h3>
                    <div class="space-y-4 text-gray-600">
                        @php
                            $phone = setting('company_phone');
                            $email = setting('company_email');
                            $address = setting('company_address');
                        @endphp
                        
                        @if($phone)
                        <p><strong>Phone:</strong> {{ $phone }}</p>
                        @endif
                        
                        @if($email)
                        <p><strong>Email:</strong> {{ $email }}</p>
                        @endif
                        
                        @if($address)
                        <p><strong>Address:</strong> {{ $address }}</p>
                        @endif
                        
                        <p><strong>Business Hours:</strong><br>Monday - Friday: 9AM - 6PM EST</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
