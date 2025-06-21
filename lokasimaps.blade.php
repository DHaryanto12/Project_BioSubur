@extends('layouts.app')

@section('title', 'Lokasi Kami')

@section('content')
<div class="map-section">
                <div class="container">
                    <h3 class="card-title text-center mb-4">Lokasi Kami</h3>
                    <p class="mb-4">Kunjungi kantor kami di alamat berikut:</p>
                    <p class="lead mb-4">
                        <strong>Jalan Contoh No. 123, Kota Contoh, Provinsi Contoh, 12345</strong>
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="map-container">
                                <!-- Ganti src iframe ini dengan embed kode Google Maps Anda sendiri -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.576856019561!2d106.82717891476882!3d-6.17511099551465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2c20a1163%3A0xc3f1a2e7c1f1b1e!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1678901234567!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4">Kami menantikan kedatangan Anda!</p>
                </div>
            </div>
@endsection
