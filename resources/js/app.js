import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import Datepicker from 'flowbite-datepicker/Datepicker';

import 'flowbite-datepicker';
import 'flowbite/dist/datepicker.turbo.js';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

import toastr from 'toastr';
window.toastr = toastr;

toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 3000, // Waktu notifikasi ditampilkan (dalam milidetik)
    extendedTimeOut: 1000 // Waktu tambahan notifikasi ditampilkan saat mouse mengarah padanya
};

// Initialization for ES Users
import {
    Chart,
    initTE,
  } from "tw-elements";
  
  initTE({ Chart });

const datepickerEl = document.getElementById('datepickerId');
new Datepicker(datepickerEl, {
    // options
}); 