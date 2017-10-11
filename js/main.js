/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2016, Codrops
 * http://www.codrops.com
 */
;(function(window) {

	'use strict';

	var pianoEl = document.querySelector('.content--instrument > .piano'),
		guitarEl = document.querySelector('.content--instrument > .guitar'),
		kalimbaEl = document.querySelector('.content--instrument > .kalimba'),
		chimesEl = document.querySelector('.content--instrument > .chime'),
		timpaniEl = document.querySelector('.content--instrument > .timpani'),
		harpEl = document.querySelector('.content--instrument > .harp'),
		xylophoneEl = document.querySelector('.content--instrument > .xylophone'),
		saxEl = document.querySelector('.content--instrument .tiny-instrument--sax'),
		tubaEl = document.querySelector('.content--instrument .tiny-instrument--tuba'),
		panfluteEl = document.querySelector('.content--instrument .tiny-instrument--flute'),
		micAreaEl = document.querySelector('.content--bg-mic'),
		violinAreaEl = document.querySelector('.content--bg-violin'),
		tinyChimesEl = document.querySelector('.chime--tiny'), 
		tinyChimes,
		isMobile = mobilecheck();

	function init() {
		// The canvas animation for the wave.
		// https://github.com/caffeinalab/siriwavejs
		var siriWave = new SiriWave({
			container: document.getElementById('wavebg'),
			//cover: true,
			speed: 0.01,
			color: '#C796AA',
			frequency: 3,
			amplitude: 0.5,
			autostart: true
		});

		// Preload all sounds and initialize the instruments.
		MIDI.loadPlugin({
			soundfontUrl: './soundfont/',
			instruments: ['acoustic_grand_piano', 'acoustic_guitar_nylon', 'tubular_bells', 'kalimba', 'timpani', 'orchestral_harp', 'xylophone', 'alto_sax', 'tuba', 'pan_flute', 'violin'],
			onsuccess: function() {
				document.body.classList.remove('loading');
				
				tinyChimes = new Chimes(tinyChimesEl, { triggeredOnHover: true });
				initEvents();
			}
		});
	}

	function initEvents() {
		if( isMobile ) {
			tinyChimesEl.addEventListener('touchstart', function() {
				tinyChimes.playSequence();
			});
		}
	}

	init();

})(window);