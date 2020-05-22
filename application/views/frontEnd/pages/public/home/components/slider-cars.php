<?php foreach ($cars as $car) : ?>
    <div class="swiper-slide  shadow-sm">
        <div class="card swiper--card">
            <div class="d-flex flex-column">
                <div class=" px-2 "><img class="img-fluid" src="<?= base_url('assets/uploads/cars/') . $car['car_photo'] ?>" alt="">
                </div>
                <div class="card-body d-flex flex-column justify-content-center align-content-end">
                    <h6 class="card__brand"><?= $car['car_brand']; ?></h6>
                    <h5 class="card__type font-md-20px text-uppercase "><?= $car['type_name']  ?></h5>
                    <h5 class="card__price">Rp <?= number_format($car['car_price'], 2, ',', '.') ?></h5><a href="detail.html" class="btn card__btn mt-2">Detail</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>