<section class="about-banner px-3">
    <?php $this->load->view($templatesPath . "navbar_top"); ?>
    <div class="col-12 pl-0 mt-4 pl-md-2">
        <h4 class="mb-n4 text-primary font-25px">Tentang Kami</h4>
        <nav aria-label="breadcrumb px-0">
            <ol class="breadcrumb bg-transparent pl-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 about-banner-content pl-0 pl-md-2">
        <div class="row h-100">
            <div class="col-md-6 d-flex align-content-center flex-column justify-content-center">
                <p class="font-25px text-white mb-n1 ml-0 pl-0">Mengenal</p>
                <h1 class="text-primary font-md-72px font-weight-bold ml-0 pl-0">PrimeRental</h1>
                <p class="text-white-50">Di primeRental.com, semua yang kami lakukan adalah memberi Anda
                    kebebasan untuk menemukan lebih banyak. Kami akan menyediakan Anda mobil sewaan yang tepat,
                    dan memberikan Anda pengalaman yang lancar dan tanpa kerumitan dari awal hingga selesai. Di
                    sini Anda dapat mengetahui lebih lanjut tentang cara kami bekerja.</p>
            </div>
            <div class="col-md-6"><img class="img-fluid" src="<?= base_url('assets/frontEnd/') ?>dist/static/svg/about-main.svg" alt=""></div>
        </div>
    </div>
</section>