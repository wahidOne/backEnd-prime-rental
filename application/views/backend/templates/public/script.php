<!-- inject:js -->
<script src="<?= base_url('assets/');  ?>backend/vendors/feather-icons/feather.min.js"></script>
<script src="<?= base_url('assets/');  ?>backend/js/template.js"></script>
<script src="<?= base_url('assets/backend/') ?>js/sweetalert2.js"></script>
<script src="<?= base_url('assets/global-plugins/') ?>axios/axios.min.js"></script>
<!-- endinject -->
<!-- custom js for this page -->
<script src="<?= base_url('assets/');  ?>backend/js/dashboard.js"></script>
<script src="<?= base_url('assets/');  ?>backend/js/datepicker.js"></script>
<script src="<?= base_url('assets/');  ?>backend/js/costum.js"></script>
<!-- end custom js for this page -->

<script>
    document.onreadystatechange = function() {
        if (document.readyState === "complete") {
            console.log(document.readyState);
            setTimeout(() => {
                    document.getElementById("PreLoaderBar").style.display = "none";
                },
                500);
        }
    }


    const signOutLinks = [...document.querySelectorAll(".sign--out--link")];
    signOutLinks.map((link) => {
        link.addEventListener("click", (e) => {
            Swal.fire({
                title: 'Anda yakin ingin keluar?',
                // text: "Anda akan Keluar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, saya ingin keluar'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?= base_url('administrator/sign-out')  ?>';
                }
            })
        });
    });

    if ($("#kotaChart").length) {
        new Chart($("#kotaChart"), {
            type: "doughnut",
            data: {
                labels: ["Jakarta", "Bekasi", "Depok", "Bogor", "Tanggerang"],
                datasets: [{
                    backgroundColor: [
                        "#3955f7",
                        "#0cfaa7",
                        "#f2ee07",
                        "#FF3366",
                        "#12e7ff",


                    ],
                    data: [30, 20, 9, 18, 15],
                }, ],
            },
            options: {
                responsive: true,
                defaultFontSize: 13,
                legend: {
                    fontSize: 17,
                    position: 'left',
                    labels: {
                        fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                        fontColor: '#fff',
                    }
                }

            },
        });
    }



    $("#dataTablesMenu").DataTable({
        // "search": {
        //     "search": ""
        // },
        // "columnDefs": [{
        //     "searchable": false,
        //     "targets": 1
        // }, {
        //     "orderable": false,
        //     "targets": 1
        // }],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "All"],
        ],
        iDisplayLength: 10,
        language: {
            search: "",
        },
    });
    $("#dataTablesMenu").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Search");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });
</script>