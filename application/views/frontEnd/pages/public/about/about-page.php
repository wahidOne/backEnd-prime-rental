<div class="about-content">
    <?php
    $this->load->view($componentPath . "about-banner");
    ?>
    <section class="about-main bg-white">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <h1 class="text-secondary">Tentang Kami</h1><br>
                    <p>PrimeRent adalah perusahaan penyedia jasa rental mobil terbaik di Jabodetabek. perusahaan ini
                        telah berdiri sejak tahun 2008 dan melayani perorangan maupun perusahaan dengan komitmen
                        untuk memberikan pelayanan terbaik, berkualitas, dan berpengalaman di bidangnya.</p><br>
                    <p>Dengan harga murah yang bersaing dan terjangkau, kami tak hanya menawarkan berbagai jenis
                        kendaraan yang lengkap dan terbaru untuk disewa, namun juga menyediakan jasa sewa mobil plus
                        driver ataupun tanpa driver (bersyarat). Dengan dipandu oleh driver yang ramah dan
                        berpengalaman, ke manapun tujuan Anda akan terasa lebih mudah dan menyenangkan.</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    $this->load->view($componentPath . "about-our-values");
    $this->load->view($componentPath . "about-team");
    ?>
</div>