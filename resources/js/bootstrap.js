import $ from 'jquery';
window.$ = $;


import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Swal from 'sweetalert2';
window.Swal = Swal;


import toastr from 'toastr';
window.toastr = toastr;


import flatpickr from 'flatpickr';
window.flatpickr = flatpickr;

import 'flatpickr/dist/flatpickr.min.css';


import Chart from 'chart.js/auto';
window.Chart = Chart;


/* start = bootstrap */
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
/* end = bootstrap */












