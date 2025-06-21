@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <style>
        /* Gaya kustom untuk latar belakang gambar */
        .hero-section {
            background: url('https://placehold.co/1920x1080/000000/FFFFFF?text=Background+Image') no-repeat center center;
            background-size: cover;
            color: #fff; /* Warna teks agar kontras dengan latar belakang gelap */
            padding: 100px 0; /* Padding atas dan bawah */
            min-height: 100vh; /* Pastikan hero section setidaknya setinggi viewport */
            display: flex;
            align-items: center; /* Pusatkan konten secara vertikal */
            justify-content: center; /* Pusatkan konten secara horizontal */
            position: relative; /* Diperlukan untuk overlay */
        }

        /* Overlay gelap untuk membuat teks lebih mudah dibaca */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Warna overlay hitam dengan opasitas 50% */
        }

        /* Pastikan konten berada di atas overlay */
        .hero-section > .container {
            position: relative;
            z-index: 1;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang kartu sedikit transparan */
            border-radius: 15px; /* Sudut membulat */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Efek bayangan */
            color: #333; /* Warna teks kartu */
        }

        .card-title {
            font-size: 2.5rem; /* Ukuran judul lebih besar */
            font-weight: bold;
            color: #007bff; /* Warna judul */
            margin-bottom: 20px;
        }

        .card-text {
            font-size: 1.1rem; /* Ukuran teks paragraf */
            line-height: 1.8;
        }

        /* Responsif untuk ukuran font dan padding */
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0;
            }
            .card-title {
                font-size: 2rem;
            }
            .card-text {
                font-size: 1rem;
            }
        }
    </style>

    <div class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="card text-center p-4">
                        <div class="card-body">
                            <h3 class="card-title">Tentang Kami</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea laudantium dolorum placeat officia. Perferendis delectus nesciunt molestias iste quis eveniet odit recusandae saepe! Provident ut dolor tempora earum incidunt fugit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, iste!
                            </p>
                            <p class="card-text">
                                Kami berkomitmen untuk memberikan layanan terbaik kepada Anda. Dengan pengalaman bertahun-tahun di bidang ini, kami selalu berusaha untuk inovasi dan kepuasan pelanggan adalah prioritas utama kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
