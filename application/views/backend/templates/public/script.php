<script>
    const $window = $(window);

    $window.on('load', function() {
        customRadioColor = $('.cus-radio.color');
        customRadioColor.on('click', function(e) {
            e.preventDefault();
            var $this = $(this),
                $color = $this.data('color');
            customRadioColor.removeClass('active');
            $this.addClass('active');
            $('#cus-style').attr('href', '<?= base_url('assets/admin/'); ?>assets/css/style-' + $color + '.css');
        });
    })



    if ($('#chart-populer-kota').length) {
        var MTC = document.getElementById('chart-populer-kota').getContext('2d');
        var MTCconfig = {
            type: 'doughnut',
            data: {
                labels: ['Jakarta', 'Bekasi', 'Bogor', 'Bekasi'],
                datasets: [{
                    data: [300, 200, 200, 400],
                    backgroundColor: [
                        '#fb7da4',
                        '#7dfb9b',
                        '#ff9666',
                        '#428bfa',
                    ],
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        boxWidth: 30,
                        padding: 20,
                        fontColor: '#aaaaaa',
                    }
                },
                tooltips: {
                    mode: 'point',
                    intersect: false,
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                    cornerRadius: 4,
                    titleFontSize: 0,
                    titleMarginBottom: 2,
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
            }
        };
        var MTCchartjs = new Chart(MTC, MTCconfig);
    }
</script>