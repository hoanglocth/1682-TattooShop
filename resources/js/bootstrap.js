import _ from 'lodash';
import $ from 'jquery';

window._ = _;
window.$ = $;
window.jQuery = $;
try {
    window.$ = window.jQuery = require('jquery');
    
    require('jquery-nice-select');
    // .. load other plugin 
    require('bootstrap-sass');
} catch (e) {}
import 'datatables.net-bs4';
import 'datatables.net-responsive-bs4'