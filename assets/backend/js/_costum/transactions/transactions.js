!function(t){var e={};function n(a){if(e[a])return e[a].exports;var r=e[a]={i:a,l:!1,exports:{}};return t[a].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=t,n.c=e,n.d=function(t,e,a){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(n.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(a,r,function(e){return t[e]}.bind(null,r));return a},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=27)}({27:function(t,e,n){"use strict";n.r(e);var a=function(t){$("#table-rent").DataTable({responsive:!0,processing:!0,serverSide:!0,colReorder:{realtime:!0},language:{search:""},ajax:{url:t,type:"POST"},columnDefs:[{targets:[-1,8],orderable:!1}]}),$("#table-rent").each((function(){var t=$(this),e=t.closest(".dataTables_wrapper").find("div[id$=_filter] input");e.attr("placeholder","Search"),e.removeClass("form-control-sm"),t.closest(".dataTables_wrapper").find("div[id$=_length] select").removeClass("form-control-sm")}))},r=function(t){t.innerHTML='\n\t<div  style="height: 40vh; " class="d-flex justify-content-center align-items-center flex-column ">\n\t\t\t<div class="spinner-border text-primary " role="status">\n\t\t\t\t\n\t\t\t</div>\n\t\t\t<span class=" text-white-50 mt-3 font-weight-bold ">Prepare data...</span>\n\t</div>\n\t'},i=function(t){var e=t.response;return'\n\t<div class="row flex-grow  ">\n\t\t<div class="col-6 col-md-4 order-1">\n\t\t\t<h5 class="text-muted mb-1">To : </h5>\n\t\t\t<p class="ml-1 text-capitalize ">'.concat(e.user_name,'</p>\n\t\t\t<p class="mb-2 ml-1">Bekasi</p>\n\t\t\t<h5 class="text-muted mb-1">Tgl Transaksi : </h5>\n\t\t\t<p class="mb-2 ml-2">').concat(e.rent_date,'</p>\n\t\t</div>\n\t\t<div class="col-sm-8 col-md-3 d-flex flex-column justify-content-start align-items-start order-3 order-md-2 ">\n\t\t\t<h5 class="text-muted mb-1">Tgl rental : </h5>\n\t\t\t<p class="ml-1"><span class="text-white-50">Mulai : </span>').concat(e.rent_date_start,' </p>\n\t\t\t<p class="mb-2 ml-1"><span class="text-white-50">Berakhir : </span>').concat(e.rent_date_end,' </p>\n\t\t</div>\n\t\t<div class="col-6 col-md-5 text-right order-2 order-md-3 ">\n\t\t\t<h5 class="text-muted">Total Harga</h5>\n\t\t\t<p class="display-4 mt-1">').concat(e.rent_price,'</p>\n\t\t\t<h5 class=" text-primary mt-2 text-uppercase ">').concat(e.rent_type,'</h5>\n\t\t\t<h5 class="text-muted mt-3">Status Sewa</h5>\n\t\t\t<p class=" display-5 text-capitalize ">').concat(e.rent_status,'</p>\n\t\t</div>\n\t</div>\n\t<div class="row mt-5">\n\t\t<div class="col-lg-6 mt-2 order-2">\n\t\t\t<div class="table-responsive">\n\t\t\t\t<table class="table">\n\t\t\t\t\t<tbody>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>Status pengembalian</td>\n\t\t\t\t\t\t\t<td class="text-right">').concat(e.rent_return_status,'</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td class="text-bold-800">Status Pembayaran</td>\n\t\t\t\t\t\t\t<td class="text-bold-800 text-right">').concat(e.rent_pay_status,'</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td class="text-bold-800">Total</td>\n\t\t\t\t\t\t\t<td class="text-bold-800 text-right">').concat(e.rent_price,'</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>Denda</td>\n\t\t\t\t\t\t\t<td class="text-danger text-right">(-)</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr class="bg-dark">\n\t\t\t\t\t\t\t<td class="text-bold-800">Total Pembayaran</td>\n\t\t\t\t\t\t\t<td class="text-bold-800 text-right">$ 12,000.00</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t</tbody>\n\t\t\t\t</table>\n\t\t\t</div>\n\t\t</div>\n\n\t\t<div class="col-lg-6 mt-2">\n\t\t\t<div class="table-responsive">\n\t\t\t\t<table class="table">\n\n\t\t\t\t\t<tbody>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>Mobil</td>\n\t\t\t\t\t\t\t<td class="text-right">').concat(e.car_brand,'</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>Harga Sewa/hari</td>\n\t\t\t\t\t\t\t<td class="text-right">').concat(e.car_price,'/hari</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>Supir</td>\n\t\t\t\t\t\t\t<td class="text-right">').concat("Pakai Supir"==e.rent_type?'<span class="badge badge-primary"> '+e.rent_type+"</span>":'<span class="badge badge-primary-muted"> '+e.rent_type+"</span>",'</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>Tgl. max Pengembalian</td>\n\t\t\t\t\t\t\t<td class="text-right">').concat(e.rent_date_max_return,'</td>\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>Tgl Dikembalikan</td>\n\t\t\t\t\t\t\t<td class="text-right">').concat(e.rent_date_returned,"</td>\n\t\t\t\t\t\t</tr>\n\n\t\t\t\t\t</tbody>\n\t\t\t\t</table>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t")};function o(t,e){for(var n=0;n<e.length;n++){var a=e[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}var s=function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.modal=document.querySelector("#container-modal")}var e,n,a;return e=t,(n=[{key:"fetchData",value:function(t){var e=this.modal;return axios.get(t).then((function(t){$("#detail-modal").modal({backdrop:"static",keyboard:!1},"show");var n=t.data.response.rent_id,a=e.parentElement.parentElement.children[0].children[0];a.innerHTML="Wait a minute....",r(e);var o="";o+=i(t.data),setTimeout((function(){e.innerHTML=o,a.innerHTML="Invoice ".concat(n)}),400)})).catch((function(t){console.log(t)}))}}])&&o(e.prototype,n),a&&o(e,a),t}();function c(t,e){for(var n=0;n<e.length;n++){var a=e[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}var l=function(){function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.selector=e,this.dateStart=e.dataset.time,this.expired=new Date(this.dateStart).getTime(),this.remeaningtime={}}var e,n,a;return e=t,(n=[{key:"countRemeaning",value:function(){var t=this;return new Promise((function(e){t.now=(new Date).getTime();var n=t.expired-t.now;t.remeaningtime.days=Math.floor(n/864e5),t.remeaningtime.hours=Math.floor(n%864e5/36e5),t.remeaningtime.minutes=Math.floor(n%36e5/6e4),t.remeaningtime.seconds=Math.floor(n%6e4/1e3),t.remeaningtime.distance=n,e(t.remeaningtime)}))}},{key:"stop",value:function(t){clearInterval(t)}}])&&c(e.prototype,n),a&&c(e,a),t}(),u=function(){$("#summernote").summernote({placeholder:"Masukan pesan",tabsize:2,height:400}),$("#summernotePaymentDecline").summernote({placeholder:"Masukan pesan",tabsize:2,height:400})};function d(t){return function(t){if(Array.isArray(t))return m(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return m(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return m(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function m(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,a=new Array(e);n<e;n++)a[n]=t[n];return a}function f(t,e){for(var n=0;n<e.length;n++){var a=e[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}(new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),this.table=document.querySelector("#table-rent"),this.modal=document.querySelector("#container-modal"),this.dateExpired=document.getElementsByClassName("date_exp"),this.timeLeft=document.querySelector("#time_left"),this.formConfirmSuccess=document.querySelector("#form-confirm-success"),this.formConfirmDecline=document.querySelector("#form-confirm-decline")}var e,n,r;return e=t,(n=[{key:"public",value:function(){var t=this;$('[data-toggle="tooltip"]').tooltip(),$(".konfirmasi-popover").popover({container:"body"}),this.loadData();var e=this.table;this.table&&e.addEventListener("click",(function(e){return t.tableActions(e)})),this.checkStatusPayment(),this.confirmPayment(),u()}},{key:"loadData",value:function(){var t=this.table;if(t){var e=t.dataset.url;a(e)}}},{key:"tableActions",value:function(t){var e=new s;if("btn-info"==t.target.id||"btn-info"==t.target.parentNode.id){t.preventDefault();var n=t.target.href||t.target.parentNode.href;e.fetchData(n)}}},{key:"checkStatusPayment",value:function(){var t=this.dateExpired,e=this.timeLeft;t&&d(t).map((function(t){var n=new l(t);setInterval((function(){n.countRemeaning().then((function(t){var n=t.distance,a=t.days,r=t.hours,i=t.minutes,o=t.seconds;e&&(e.innerHTML=n>0?'<span class=" text-info mr-2 " >Waktu tersisa </span> <h5 class=" text-info font-weight-light " > '.concat(a,"H  ").concat(r,"j ").concat(i,"m ").concat(o,"d</h5>"):"<span class='text-danger'>Expired</span>")}))}),1e3)}))}},{key:"confirmPayment",value:function(){var t=this.formConfirmSuccess,e=this.formConfirmDecline;t&&(console.log("ok"),$("#form-confirm-success").validate({rules:{inbox_subject:{required:!0}},messages:{inbox_subject:{required:"Masukan Subjek"}},errorPlacement:function(t,e){t.addClass("mt-1 text-danger"),t.insertAfter(e)},submitHandler:function(t){var e=t.querySelector("#form-submit"),n=t.querySelector("[name=inbox_to]"),a=t.querySelector("[name=inbox_from]"),r=t.querySelector("[name=inbox_subject]"),i=t.querySelector("[name=inbox_title]"),o=t.querySelector("[name=inbox_text]"),s=t.querySelector("[name=rent_id]"),c={inbox_subject:r.value,inbox_to:n.value,inbox_from:a.value,inbox_text:o.value,inbox_title:i.value,rent_id:s.value},l=t.action;e.disabled=!0,e.innerHTML='\n            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n            Loading...\n            ',axios.post(l,JSON.stringify(c),{headers:{"Content-Type":"application/json"}}).then((function(t){if(t.data){e.disabled=!1,e.innerHTML="Kirim",$("#confirmPayment").modal("hide");var n=t.data.response;if(1==n.status){var a=n.redirect;setTimeout((function(){Swal.fire({title:"Konfirmasi Berhasil",text:" Konfirmasi pembayaran telah berhasil, selanjutnya anda akan diarahkan kehalaman transaski ",icon:"success",showCancelButton:!1,confirmButtonText:"Ok, Ke halaman transaksi"}).then((function(t){window.location.href=a}))}),1e3)}}})).catch((function(t){return console.log(t)}))}})),e&&$("#form-confirm-decline").validate({rules:{inbox_subject:{required:!0}},messages:{inbox_subject:{required:"Masukan Subjek"}},errorPlacement:function(t,e){t.addClass("mt-1 text-danger"),t.insertAfter(e)},submitHandler:function(t){var e=t.querySelector("#form-submit"),n=t.querySelector("[name=inbox_to]"),a=t.querySelector("[name=inbox_from]"),r=t.querySelector("[name=inbox_subject]"),i=t.querySelector("[name=inbox_title]"),o=t.querySelector("[name=inbox_text]"),s=t.querySelector("[name=rent_id]"),c={inbox_subject:r.value,inbox_to:n.value,inbox_from:a.value,inbox_text:o.value,inbox_title:i.value,rent_id:s.value},l=t.action;e.disabled=!0,e.innerHTML='\n            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n            Loading...\n            ',axios.post(l,JSON.stringify(c),{headers:{"Content-Type":"application/json"}}).then((function(t){if(t.data){e.disabled=!1,e.innerHTML="Kirim",$("#declinePayment").modal("hide");var n=t.data.response;if(1==n.status){var a=n.redirect;setTimeout((function(){Swal.fire({title:"Konfirmasi Berhasil",text:"Penolakan bukti pembayaran telah berhasil, selanjutnya anda akan diarahkan kehalaman transaski ",icon:"success",confirmButtonText:"Ok, Ke Halaman Transaksi",cancelButtonText:"Close",showCancelButton:!0}).then((function(t){1==t.dismiss?window.location.href=a:window.location.reload()}))}),1e3)}}})).catch((function(t){return console.log(t)}))}})}}])&&f(e.prototype,n),r&&f(e,r),t}())).public()}});