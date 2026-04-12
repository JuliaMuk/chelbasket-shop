import './bootstrap';
import 'flowbite';

import './filter-panel';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask'
 
Alpine.plugin(mask)

window.Alpine = Alpine;

Alpine.start();


