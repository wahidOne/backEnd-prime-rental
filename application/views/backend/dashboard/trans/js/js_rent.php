<script type="module">

    import {loadRentalData} from '<?= base_url('assets/backend/js/transactions/rent/load.data.js'); ?>';
    import {detailRental} from '<?= base_url('assets/backend/js/transactions/rent/load-detail.data.js'); ?>';

    loadRentalData();


    const table = document.querySelector("#table-rent");
    // $("#detail-modal").modal(
	// 			{
	// 				backdrop: "static",
	// 				keyboard: false,
	// 			},
	// 			"show"
	// 		);


    table.addEventListener('click', function(e) {
        e.preventDefault();
        if(e.target.id == "btn-info" || e.target.parentNode.id == "btn-info") { 
            // const Id = e.target.dataset.id  || e.target.parentNode.dataset.id 
            // ;
            const urlGet  = e.target.href  || e.target.parentNode.href;

            detailRental(urlGet);

            // detailDriver(urlGet, driverId, pathImg)
        }
    
    })

</script>