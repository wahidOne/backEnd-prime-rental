!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=28)}({28:function(e,t,n){"use strict";n.r(t),n.d(t,"default",(function(){return y}));var r=function(e){$("#table-rent").DataTable({responsive:!0,processing:!0,serverSide:!0,colReorder:{realtime:!0},language:{search:""},ajax:{url:e,type:"POST"},columnDefs:[{targets:[-1,8],orderable:!1}]}),$("#table-rent").each((function(){var e=$(this),t=e.closest(".dataTables_wrapper").find("div[id$=_filter] input");t.attr("placeholder","Search"),t.removeClass("form-control-sm"),e.closest(".dataTables_wrapper").find("div[id$=_length] select").removeClass("form-control-sm")}))};function o(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var i=function(){function e(t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.selector=t,this.dateStart=t.dataset.time,this.expired=new Date(this.dateStart).getTime(),this.remeaningtime={}}var t,n,r;return t=e,(n=[{key:"countRemeaning",value:function(){var e=this;return new Promise((function(t){e.now=(new Date).getTime();var n=e.expired-e.now;e.remeaningtime.days=Math.floor(n/864e5),e.remeaningtime.hours=Math.floor(n%864e5/36e5),e.remeaningtime.minutes=Math.floor(n%36e5/6e4),e.remeaningtime.seconds=Math.floor(n%6e4/1e3),e.remeaningtime.distance=n,t(e.remeaningtime)}))}},{key:"stop",value:function(e){clearInterval(e)}}])&&o(t.prototype,n),r&&o(t,r),e}(),a=function(){$("#summernote").summernote({placeholder:"Masukan pesan",tabsize:2,height:400}),$("#summernotePaymentDecline").summernote({placeholder:"Masukan pesan",tabsize:2,height:400})};function s(e){return function(e){if(Array.isArray(e))return c(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return c(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return c(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function l(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var u=function(){function e(t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.selector=t,this.element,this.config={position:"center",timer:1e3,showConfirmButton:!0}}var t,n,r;return t=e,(n=[{key:"init",value:function(e){var t=this,n=e.position,r=void 0===n?"center":n,o=e.timer,i=void 0===o?1e3:o,a=e.showConfirmButton,c=void 0===a||a;this.element=s(this.getSelector),this.element.length>0&&this.element.map((function(e){var n=e.dataset.status,o=e.dataset.title,a=e.dataset.text;t.showAlert(n,o,a,r,i,c)}))}},{key:"showAlert",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]&&arguments[1],n=arguments.length>2?arguments[2]:void 0,r=arguments.length>3?arguments[3]:void 0,o=arguments.length>4?arguments[4]:void 0,i=arguments.length>5?arguments[5]:void 0;return Swal.fire({position:r,icon:e,title:t,text:n,showConfirmButton:i,timer:o})}},{key:"getSelector",get:function(){var e,t=this.selector;if("string"==typeof t){var n=t.charAt(0);if("."==n){var r=t.substr(1);e=document.getElementsByClassName(r)}else if("#"==n){var o=t.substr(1);e=document.getElementById(o)}return e}}}])&&l(t.prototype,n),r&&l(t,r),e}();function f(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var m=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.alertSuccess=document.querySelector(".flash-success"),this.alertInfo=document.querySelector(".flash-info"),this.alerterror=document.querySelector(".flash-error")}var t,n,r;return t=e,(n=[{key:"render",value:function(){this.alertSuccess&&this.showAlertSuccess(),this.alertInfo&&this.showAlertInfo(),this.alerterror&&this.showAlertError()}},{key:"showAlertSuccess",value:function(){return new u(".flash-success").init({position:"center",timer:5e3,showConfirmButton:!0})}},{key:"showAlertInfo",value:function(){return new AlertService(".flash-info").init({position:"center",timer:!1,showConfirmButton:!0})}},{key:"showAlertError",value:function(){return new AlertService(".flash-error").init({position:"center",timer:5e3,showConfirmButton:!0})}}])&&f(t.prototype,n),r&&f(t,r),e}();function d(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var h=function(){function e(t,n){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.domain=n,this.driverRow=t}var t,n,r;return t=e,(n=[{key:"render",value:function(){console.log("extend",this.driverRow),this.driverRow&&(this.urlGetFreeDriver=this.domain+"administrators/transaction/get-free-driver",this.loadDataFreeDriver())}},{key:"getDataFreeDriver",value:function(){return axios.get(this.urlGetFreeDriver).then((function(e){return e})).catch((function(e){return console.log(e)}))}},{key:"loadDataFreeDriver",value:function(){var e=this,t=this.getDataFreeDriver(),n=this.driverRow;t.then((function(t){var r=t.data.response.drivers,o="",i=e.domain+"assets/uploads/ava/";r.map((function(e){return o+=function(e,t){return console.log(e),'\n    <div class="col-6 col-md-6 mt-2">\n        <div class="card border-0 shadow-none" >\n            <div class="card-img-top px-2 pt-2 pb-0 d-flex justify-content-center mb-0 ">\n                <img src="'.concat(t+e.user_photo,'" class=" img-lg  mx-auto " alt="...">\n            </div>\n            <div class="card-body text-center ">\n               \n                <div class="custom-control custom-radio custom-control-inline">\n                <input type="radio" id="').concat(e.user_id,'" name="driver_id" class="custom-control-input" value="').concat(e.driver_id,'" >\n                <label class="custom-control-label ml-1" for="').concat(e.user_id,'">\n                    <span>').concat(e.driver_name,"</span>\n                </label>\n            </div>\n           \n            </div>\n        </div>\n    </div>\n    ")}(e,i)})),n.innerHTML=o}))}}])&&d(t.prototype,n),r&&d(t,r),e}();function v(e){return function(e){if(Array.isArray(e))return b(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return b(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return b(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function b(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function p(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var y=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.domainName=mainDomain,this.table=document.querySelector("#table-rent"),this.modal=document.querySelector("#container-modal"),this.dateExpired=document.getElementsByClassName("date_exp"),this.timeLeft=document.querySelector("#time_left"),this.formConfirmSuccess=document.querySelector("#form-confirm-success"),this.formConfirmDecline=document.querySelector("#form-confirm-decline"),this.driverRow=document.querySelector(".selectdriver-row")}var t,n,o;return t=e,(n=[{key:"public",value:function(){$('[data-toggle="tooltip"]').tooltip(),$(".konfirmasi-popover").popover({container:"body"}),this.loadData(),this.table,this.checkStatusPayment(),this.confirmPayment(),a(),(new m).render(),new h(this.driverRow,this.domainName).render()}},{key:"loadData",value:function(){var e=this.table;if(e){var t=e.dataset.url;r(t)}}},{key:"checkStatusPayment",value:function(){var e=this.dateExpired,t=this.timeLeft;e&&v(e).map((function(e){var n=new i(e);setInterval((function(){n.countRemeaning().then((function(e){var n=e.distance,r=e.days,o=e.hours,i=e.minutes,a=e.seconds;t&&(t.innerHTML=n>0?'<span class=" text-info mr-2 " >Waktu tersisa </span> <h5 class=" text-info font-weight-light " > '.concat(r,"H  ").concat(o,"j ").concat(i,"m ").concat(a,"d</h5>"):"<span class='text-danger'>Expired</span>")}))}),1e3)}))}},{key:"confirmPayment",value:function(){var e=this.formConfirmSuccess,t=this.formConfirmDecline;e&&$("#form-confirm-success").validate({rules:{inbox_subject:{required:!0}},messages:{inbox_subject:{required:"Masukan Subjek"}},errorPlacement:function(e,t){e.addClass("mt-1 text-danger"),e.insertAfter(t)},submitHandler:function(e){var t=e.querySelector("#form-submit"),n=e.querySelector("[name=inbox_to]"),r=e.querySelector("[name=inbox_from]"),o=e.querySelector("[name=inbox_subject]"),i=e.querySelector("[name=inbox_title]"),a=e.querySelector("[name=inbox_text]"),s=e.querySelector("[name=rent_id]"),c={inbox_subject:o.value,inbox_to:n.value,inbox_from:r.value,inbox_text:a.value,inbox_title:i.value,rent_id:s.value},l=e.action;t.disabled=!0,t.innerHTML='\n            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n            Loading...\n            ',axios.post(l,JSON.stringify(c),{headers:{"Content-Type":"application/json"}}).then((function(e){if(e.data){t.disabled=!1,t.innerHTML="Kirim",$("#confirmPayment").modal("hide");var n=e.data.response;if(1==n.status){var r=n.redirect;setTimeout((function(){Swal.fire({title:"Konfirmasi Berhasil",text:" Konfirmasi pembayaran telah berhasil, selanjutnya anda akan diarahkan kehalaman transaski ",icon:"success",showCancelButton:!1,confirmButtonText:"Ok, Ke halaman transaksi"}).then((function(e){window.location.href=r}))}),1e3)}}})).catch((function(e){return console.log(e)}))}}),t&&$("#form-confirm-decline").validate({rules:{inbox_subject:{required:!0}},messages:{inbox_subject:{required:"Masukan Subjek"}},errorPlacement:function(e,t){e.addClass("mt-1 text-danger"),e.insertAfter(t)},submitHandler:function(e){var t=e.querySelector("#form-submit"),n=e.querySelector("[name=inbox_to]"),r=e.querySelector("[name=inbox_from]"),o=e.querySelector("[name=inbox_subject]"),i=e.querySelector("[name=inbox_title]"),a=e.querySelector("[name=inbox_text]"),s=e.querySelector("[name=rent_id]"),c={inbox_subject:o.value,inbox_to:n.value,inbox_from:r.value,inbox_text:a.value,inbox_title:i.value,rent_id:s.value},l=e.action;t.disabled=!0,t.innerHTML='\n            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n            Loading...\n            ',axios.post(l,JSON.stringify(c),{headers:{"Content-Type":"application/json"}}).then((function(e){if(e.data){t.disabled=!1,t.innerHTML="Kirim",$("#declinePayment").modal("hide");var n=e.data.response;if(1==n.status){var r=n.redirect;setTimeout((function(){Swal.fire({title:"Konfirmasi Berhasil",text:"Penolakan bukti pembayaran telah berhasil, selanjutnya anda akan diarahkan kehalaman transaski ",icon:"success",confirmButtonText:"Ok, Ke Halaman Transaksi",cancelButtonText:"Close",showCancelButton:!0}).then((function(e){1==e.dismiss?window.location.href=r:window.location.reload()}))}),1e3)}}})).catch((function(e){return console.log(e)}))}})}}])&&p(t.prototype,n),o&&p(t,o),e}();(new y).public()}});