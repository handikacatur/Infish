@extends('layouts.main-page')

@section('content')
        <!-- Slider #1
============================================= -->
        <section id="hero" class="section hero">
            <div class="container px-28">
                <div class="row row-content pt-0">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="hero-headline">Bantu bisnis perikanan, dan dapatkan keuntungan!</div>
                        <div class="hero-bio">Program investasi berjangka untuk membantu pengusaha di sektor perikanan. Dana investasi akan dikembalikan oleh mitra perikanan setiap periode yang ditentukan kepada investor.</div>
                        <div class="hero-action">
                            <a href="{{ url('/register') }}" class="btn btn--gradient" data-scroll="scrollTo">Daftar sekarang</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="hero-img">
                            <img class="img-fluid" src="{{ asset('assets/images/hero/hero.svg') }}" alt="background">
                        </div>
                    </div>
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #slider end -->
        <!-- Feature #1
============================================= -->
        <section id="feature1" class="section feature feature-center bg-white">
            <div class="container px-20">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading heading-1 text--center mb-80">
                            <h2 class="heading-title">
                                Apa yang kami tawarkan?
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Panel #1 -->
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="feature-panel">
                            <div class="feature-img bg-blue">
                                <i class="fas fa-dollar-sign" style="font-size: 30px; padding: 20px; color: white;"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Bantuan Dana Investasi Usaha</h3>
                                <p>Memberi layanan penyaluran dana investasi pada mitra perikanan untuk mengembangkan usaha.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->

                    <!-- Panel #2 -->
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="feature-panel">
                            <div class="feature-img bg-green">
                                <i class="fas fa-chart-line" style="font-size: 30px; padding: 20px; color: white;"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Peningkatan Produksi</h3>
                                <p>Dana bantuan yang diperoleh mitra dapat dimanfaatkan untuk pengembangan bisnis yang dikelola.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->

                    <!-- Panel #3 -->
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="feature-panel">
                            <div class="feature-img bg-orange">
                                <i class="fas fa-search" style="font-size: 30px; padding: 20px; color: white;"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Pemantauan Perkebangan Bisnis</h3>
                                <p>Melacak perkembangan bisnis yang sudah dilakukan oleh mitra, meliputi catatan transaksi secara periodik untuk mengetahui kelangsungan</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #feature1 end -->
        <!-- Feature #2
============================================= -->
        <section id="feature2" class="section feature feature-2 bg-shape">
            <div class="container px-20">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                        <img class="img-fluid" src="assets/images/features/service-1.svg" alt="device">
                    </div>
                    <!-- .col-md-6 end -->
                    <div class="col-12 col-md-12 col-lg-5 offset-lg-1">
                        <div class="feature-panel mt-80">
                            <div class="feature-img bg-blue">
                                <i class="fas fa-bookmark" style="font-size: 30px; padding: 20px; color: white;"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Investasi lebih aman</h3>
                                <p>Mitra memperoleh pelatihan dalam pengelolahan usaha untuk meminimalisir dana tidak tepat sasaran. Investor dapat melakukan tracking perkebangan usaha secara realtime.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-6 end -->
                </div>
                <div class="clearfix mt-100 pt-150"></div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="feature-panel px-20">
                            <div class="feature-img bg-yellow">
                                <i class="fas fa-bookmark" style="font-size: 30px; padding: 20px; color: white;"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Bekerjasama dengan Dinas Perikanan Provinsi Jawa Timur</h3>
                                <p>Setiap mitra perikanan wajib terdaftar sehingga terbukti dengan dukungan bukti resmi dari Dinas Perikanan. Dinas Perikanan juga terbantu dalam peningkatan produksi perikanan.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-6 end -->
                    <div class="col-12 col-md-12 col-lg-6 offset-lg-1">
                        <img class="img-fluid pull-right" src="assets/images/features/service-2.svg" alt="device" />
                    </div>
                    <!-- .col-md-6 end -->

                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #feature2 end -->
        <!-- Clients Section
============================================= -->
        <section id="clients" class="section clients clients-carousel bg-white">
            <div class="container px-20">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="heading heading-1 text--center mb-80">
                            <h2 class="heading-title">
                                Kabupaten/Kota yang telah menjadi Mitra
                            </h2>
                        </div>
                        <div class="carousel carousel-dots owl-carousel" data-slide="5" data-slide-res="2"
                            data-autoplay="true" data-nav="false" data-dots="false" data-space="30" data-loop="true"
                            data-speed="800">
                            <!-- Client #1 -->
                            <div class="client">
                                <img class="center-block" src="assets/images/clients/1.png" alt="client">
                            </div>

                            <!-- Client #2 -->
                            <div class="client">
                                <img class="center-block" src="assets/images/clients/2.png" alt="client">
                            </div>

                            <!-- Client #3 -->
                            <div class="client">
                                <img class="center-block" src="assets/images/clients/3.png" alt="client">
                            </div>

                            <!-- Client #4 -->
                            <div class="client">
                                <img class="center-block" src="assets/images/clients/4.png" alt="client">
                            </div>

                            <!-- Client #5 -->
                            <div class="client">
                                <img class="center-block" src="assets/images/clients/5.png" alt="client">
                            </div>
                            <!-- Client #3 -->
                            <div class="client">
                                <img class="center-block" src="assets/images/clients/3.png" alt="client">
                            </div>

                            <!-- Client #4 -->
                            <div class="client">
                                <img class="center-block" src="assets/images/clients/4.png" alt="client">
                            </div>
                        </div>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #clients end -->
@endsection