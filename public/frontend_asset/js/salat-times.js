
/*========= Salat Times Js =========*/
//--------------------- Copyright Block ----------------------
/* 

PrayTimes.js: Prayer Times Calculator (ver 2.3)
Copyright (C) 2007-2011 PrayTimes.org

Developer: Hamid Zarrabi-Zadeh
License: GNU LGPL v3.0

TERMS OF USE:
	Permission is granted to use this code, with or 
	without modification, in any website or application 
	provided that credit is given to the original work 
	with a link back to PrayTimes.org.

This program is distributed in the hope that it will 
be useful, but WITHOUT ANY WARRANTY. 

PLEASE DO NOT REMOVE THIS COPYRIGHT BLOCK.
 
*/ 


//--------------------- Help and Manual ----------------------
/*

User's Manual: 
http://praytimes.org/manual

Calculation Formulas: 
http://praytimes.org/calculation



//------------------------ User Interface -------------------------


	getTimes (date, coordinates [, timeZone [, dst [, timeFormat]]]) 
	
	setMethod (method)       // set calculation method 
	adjust (parameters)      // adjust calculation parameters	
	tune (offsets)           // tune times by given offsets 

	getMethod ()             // get calculation method 
	getSetting ()            // get current calculation parameters
	getOffsets ()            // get current time offsets


//------------------------- Sample Usage --------------------------


	var PT = new PrayTimes('ISNA');
	var times = PT.getTimes(new Date(), [43, -80], -5);
	document.write('Sunrise = '+ times.sunrise)


*/
	

//----------------------- PrayTimes Class ------------------------


function PrayTimes(method) {


	//------------------------ Constants --------------------------
	var
	
	// Time Names
	timeNames = {
		imsak    : 'Imsak',
		fajr     : 'Fajr',
		sunrise  : 'Sunrise',
		dhuhr    : 'Dhuhr',
		asr      : 'Asr',
		sunset   : 'Sunset',
		maghrib  : 'Maghrib',
		isha     : 'Isha',
		midnight : 'Midnight'
	},


	// Calculation Methods
	methods = {
		MWL: {
			name: 'Muslim World League',
			params: { fajr: 18, isha: 17 } },
		ISNA: {
			name: 'Islamic Society of North America (ISNA)',
			params: { fajr: 15, isha: 15 } },
		Egypt: {
			name: 'Egyptian General Authority of Survey',
			params: { fajr: 19.5, isha: 17.5 } },
		Makkah: {
			name: 'Umm Al-Qura University, Makkah',
			params: { fajr: 18.5, isha: '90 min' } },  // fajr was 19 degrees before 1430 hijri
		Karachi: {
			name: 'University of Islamic Sciences, Karachi',
			params: { fajr: 18, isha: 18 } },
		Tehran: {
			name: 'Institute of Geophysics, University of Tehran',
			params: { fajr: 17.7, isha: 14, maghrib: 4.5, midnight: 'Jafari' } },  // isha is not explicitly specified in this method
		Jafari: {
			name: 'Shia Ithna-Ashari, Leva Institute, Qum',
			params: { fajr: 16, isha: 14, maghrib: 4, midnight: 'Jafari' } }
	},


	// Default Parameters in Calculation Methods
	defaultParams = {
		maghrib: '0 min', midnight: 'Standard'

	},
 
 
	//----------------------- Parameter Values ----------------------
	/*
	
	// Asr Juristic Methods
	asrJuristics = [ 
		'Standard',    // Shafi`i, Maliki, Ja`fari, Hanbali
		'Hanafi'       // Hanafi
	],


	// Midnight Mode
	midnightMethods = [ 
		'Standard',    // Mid Sunset to Sunrise
		'Jafari'       // Mid Sunset to Fajr
	],


	// Adjust Methods for Higher Latitudes
	highLatMethods = [
		'NightMiddle', // middle of night
		'AngleBased',  // angle/60th of night
		'OneSeventh',  // 1/7th of night
		'None'         // No adjustment
	],


	// Time Formats
	timeFormats = [
		'24h',         // 24-hour format
		'12h',         // 12-hour format
		'12hNS',       // 12-hour format with no suffix
		'Float'        // floating point number 
	],
	*/	


	//---------------------- Default Settings --------------------
	
	calcMethod = 'MWL',

	// do not change anything here; use adjust method instead
	setting = {  
		imsak    : '10 min',
		dhuhr    : '0 min',  
		asr      : 'Standard',
		highLats : 'NightMiddle'
	},

	timeFormat = '12h',
	timeSuffixes = ['am', 'pm'],
	invalidTime =  '-----',

	numIterations = 1,
	offset = {},


	//----------------------- Local Variables ---------------------

	lat, lng, elv,       // coordinates
	timeZone, jDate;     // time variables
	

	//---------------------- Initialization -----------------------
	
	
	// set methods defaults
	var defParams = defaultParams;
	for (var i in methods) {
		var params = methods[i].params;
		for (var j in defParams)
			if ((typeof(params[j]) == 'undefined'))
				params[j] = defParams[j];
	};

	// initialize settings
	calcMethod = methods[method] ? method : calcMethod;
	var params = methods[calcMethod].params;
	for (var id in params)
		setting[id] = params[id];

	// init time offsets
	for (var i in timeNames)
		offset[i] = 0;

		
	
	//----------------------- Public Functions ------------------------
	return {

	
	// set calculation method 
	setMethod: function(method) {
		if (methods[method]) {
			this.adjust(methods[method].params);
			calcMethod = method;
		}
	},


	// set calculating parameters
	adjust: function(params) {
		for (var id in params)
			setting[id] = params[id];
	},


	// set time offsets
	tune: function(timeOffsets) {
		for (var i in timeOffsets)
			offset[i] = timeOffsets[i];
	},


	// get current calculation method
	getMethod: function() { return calcMethod; },

	// get current setting
	getSetting: function() { return setting; },

	// get current time offsets
	getOffsets: function() { return offset; },

	// get default calc parametrs
	getDefaults: function() { return methods; },


	// return prayer times for a given date
	getTimes: function(date, coords, timezone, dst, format) {
		lat = 1* coords[0];
		lng = 1* coords[1]; 
		elv = coords[2] ? 1* coords[2] : 0;
		timeFormat = format || timeFormat;
		if (date.constructor === Date)
			date = [date.getFullYear(), date.getMonth()+ 1, date.getDate()];
		if (typeof(timezone) == 'undefined' || timezone == 'auto')
			timezone = this.getTimeZone(date);
		if (typeof(dst) == 'undefined' || dst == 'auto') 
			dst = this.getDst(date);
		timeZone = 1* timezone+ (1* dst ? 1 : 0);
		jDate = this.julian(date[0], date[1], date[2])- lng/ (15* 24);
		
		return this.computeTimes();
	},


	// convert float time to the given format (see timeFormats)
	getFormattedTime: function(time, format, suffixes) {
		if (isNaN(time))
			return invalidTime;
		if (format == 'Float') return time;
		suffixes = suffixes || timeSuffixes;

		time = DMath.fixHour(time+ 0.5/ 60);  // add 0.5 minutes to round
		var hours = Math.floor(time); 
		var minutes = Math.floor((time- hours)* 60);


		var suffix = (format == '12h') ? suffixes[hours < 12 ? 0 : 1] : '';


		var hour = (format == '24h') ? this.twoDigitsFormat(hours) : ((hours+ 12 -1)% 12+ 1);
		return hour+ ':'+ this.twoDigitsFormat(minutes)+ (suffix ? ' '+ suffix : '');
	},


	//---------------------- Calculation Functions -----------------------


	// compute mid-day time
	midDay: function(time) {
		var eqt = this.sunPosition(jDate+ time).equation;
		var noon = DMath.fixHour(12- eqt);
		return noon;
	},


	// compute the time at which sun reaches a specific angle below horizon
	sunAngleTime: function(angle, time, direction) {
		var decl = this.sunPosition(jDate+ time).declination;
		var noon = this.midDay(time);
		var t = 1/15* DMath.arccos((-DMath.sin(angle)- DMath.sin(decl)* DMath.sin(lat))/ 
				(DMath.cos(decl)* DMath.cos(lat)));
		return noon+ (direction == 'ccw' ? -t : t);
	},


	// compute asr time 
	asrTime: function(factor, time) { 
		var decl = this.sunPosition(jDate+ time).declination;
		var angle = -DMath.arccot(factor+ DMath.tan(Math.abs(lat- decl)));
		return this.sunAngleTime(angle, time);
	},


	// compute declination angle of sun and equation of time
	// Ref: http://aa.usno.navy.mil/faq/docs/SunApprox.php
	sunPosition: function(jd) {
		var D = jd - 2451545.0;
		var g = DMath.fixAngle(357.529 + 0.98560028* D);
		var q = DMath.fixAngle(280.459 + 0.98564736* D);
		var L = DMath.fixAngle(q + 1.915* DMath.sin(g) + 0.020* DMath.sin(2*g));

		var R = 1.00014 - 0.01671* DMath.cos(g) - 0.00014* DMath.cos(2*g);
		var e = 23.439 - 0.00000036* D;

		var RA = DMath.arctan2(DMath.cos(e)* DMath.sin(L), DMath.cos(L))/ 15;
		var eqt = q/15 - DMath.fixHour(RA);
		var decl = DMath.arcsin(DMath.sin(e)* DMath.sin(L));

		return {declination: decl, equation: eqt};
	},


	// convert Gregorian date to Julian day
	// Ref: Astronomical Algorithms by Jean Meeus
	julian: function(year, month, day) {
		if (month <= 2) {
			year -= 1;
			month += 12;
		};
		var A = Math.floor(year/ 100);
		var B = 2- A+ Math.floor(A/ 4);

		var JD = Math.floor(365.25* (year+ 4716))+ Math.floor(30.6001* (month+ 1))+ day+ B- 1524.5;
		return JD;
	},

	
	//---------------------- Compute Prayer Times -----------------------


	// compute prayer times at given julian date
	computePrayerTimes: function(times) {
		times = this.dayPortion(times);
		var params  = setting;
		
		var imsak   = this.sunAngleTime(this.eval(params.imsak), times.imsak, 'ccw');
		var fajr    = this.sunAngleTime(this.eval(params.fajr), times.fajr, 'ccw');
		var sunrise = this.sunAngleTime(this.riseSetAngle(), times.sunrise, 'ccw');  
		var dhuhr   = this.midDay(times.dhuhr);
		var asr     = this.asrTime(this.asrFactor(params.asr), times.asr);
		var sunset  = this.sunAngleTime(this.riseSetAngle(), times.sunset);;
		var maghrib = this.sunAngleTime(this.eval(params.maghrib), times.maghrib);
		var isha    = this.sunAngleTime(this.eval(params.isha), times.isha);

		return {
			imsak: imsak, fajr: fajr, sunrise: sunrise, dhuhr: dhuhr, 
			asr: asr, sunset: sunset, maghrib: maghrib, isha: isha
		};
	},


	// compute prayer times 
	computeTimes: function() {
		// default times
		var times = { 
			imsak: 5, fajr: 5, sunrise: 6, dhuhr: 12, 
			asr: 13, sunset: 18, maghrib: 18, isha: 18
		};

		// main iterations
		for (var i=1 ; i<=numIterations ; i++) 
			times = this.computePrayerTimes(times);

		times = this.adjustTimes(times);
		
		// add midnight time
		times.midnight = (setting.midnight == 'Jafari') ? 
				times.sunset+ this.timeDiff(times.sunset, times.fajr)/ 2 :
				times.sunset+ this.timeDiff(times.sunset, times.sunrise)/ 2;

		times = this.tuneTimes(times);
		return this.modifyFormats(times);
	},


	// adjust times 
	adjustTimes: function(times) {
		var params = setting;
		for (var i in times)
			times[i] += timeZone- lng/ 15;
			
		if (params.highLats != 'None')
			times = this.adjustHighLats(times);
			
		if (this.isMin(params.imsak))
			times.imsak = times.fajr- this.eval(params.imsak)/ 60;
		if (this.isMin(params.maghrib))
			times.maghrib = times.sunset+ this.eval(params.maghrib)/ 60;
		if (this.isMin(params.isha))
			times.isha = times.maghrib+ this.eval(params.isha)/ 60;
		times.dhuhr += this.eval(params.dhuhr)/ 60; 

		return times;
	},


	// get asr shadow factor
	asrFactor: function(asrParam) {
		var factor = {Standard: 1, Hanafi: 2}[asrParam];
		return factor || this.eval(asrParam);
	},


	// return sun angle for sunset/sunrise
	riseSetAngle: function() {
		//var earthRad = 6371009; // in meters
		//var angle = DMath.arccos(earthRad/(earthRad+ elv));
		var angle = 0.0347* Math.sqrt(elv); // an approximation
		return 0.833+ angle;
	},


	// apply offsets to the times
	tuneTimes: function(times) {
		for (var i in times)
			times[i] += offset[i]/ 60; 
		return times;
	},


	// convert times to given time format
	modifyFormats: function(times) {
		for (var i in times)
			times[i] = this.getFormattedTime(times[i], timeFormat); 
		return times;
	},


	// adjust times for locations in higher latitudes
	adjustHighLats: function(times) {
		var params = setting;
		var nightTime = this.timeDiff(times.sunset, times.sunrise); 

		times.imsak = this.adjustHLTime(times.imsak, times.sunrise, this.eval(params.imsak), nightTime, 'ccw');
		times.fajr  = this.adjustHLTime(times.fajr, times.sunrise, this.eval(params.fajr), nightTime, 'ccw');
		times.isha  = this.adjustHLTime(times.isha, times.sunset, this.eval(params.isha), nightTime);
		times.maghrib = this.adjustHLTime(times.maghrib, times.sunset, this.eval(params.maghrib), nightTime);
		
		return times;
	},

	
	// adjust a time for higher latitudes
	adjustHLTime: function(time, base, angle, night, direction) {
		var portion = this.nightPortion(angle, night);
		var timeDiff = (direction == 'ccw') ? 
			this.timeDiff(time, base):
			this.timeDiff(base, time);
		if (isNaN(time) || timeDiff > portion) 
			time = base+ (direction == 'ccw' ? -portion : portion);
		return time;
	},

	
	// the night portion used for adjusting times in higher latitudes
	nightPortion: function(angle, night) {
		var method = setting.highLats;
		var portion = 1/2 // MidNight
		if (method == 'AngleBased')
			portion = 1/60* angle;
		if (method == 'OneSeventh')
			portion = 1/7;
		return portion* night;
	},


	// convert hours to day portions 
	dayPortion: function(times) {
		for (var i in times)
			times[i] /= 24;
		return times;
	},


	//---------------------- Time Zone Functions -----------------------


	// get local time zone
	getTimeZone: function(date) {
		var year = date[0];
		var t1 = this.gmtOffset([year, 0, 1]);
		var t2 = this.gmtOffset([year, 6, 1]);
		return Math.min(t1, t2);
	},

	
	// get daylight saving for a given date
	getDst: function(date) {
		return 1* (this.gmtOffset(date) != this.getTimeZone(date));
	},


	// GMT offset for a given date
	gmtOffset: function(date) {
		var localDate = new Date(date[0], date[1]- 1, date[2], 12, 0, 0, 0);
		var GMTString = localDate.toGMTString();
		var GMTDate = new Date(GMTString.substring(0, GMTString.lastIndexOf(' ')- 1));
		var hoursDiff = (localDate- GMTDate) / (1000* 60* 60);
		return hoursDiff;
	},

	
	//---------------------- Misc Functions -----------------------

	// convert given string into a number
	eval: function(str) {
		return 1* (str+ '').split(/[^0-9.+-]/)[0];
	},


	// detect if input contains 'min'
	isMin: function(arg) {
		return (arg+ '').indexOf('min') != -1;
	},


	// compute the difference between two times 
	timeDiff: function(time1, time2) {
		return DMath.fixHour(time2- time1);
	},


	// add a leading 0 if necessary
	twoDigitsFormat: function(num) {
		return (num <10) ? '0'+ num : num;
	}
	
}}



//---------------------- Degree-Based Math Class -----------------------


var DMath = {

	dtr: function(d) { return (d * Math.PI) / 180.0; },
	rtd: function(r) { return (r * 180.0) / Math.PI; },

	sin: function(d) { return Math.sin(this.dtr(d)); },
	cos: function(d) { return Math.cos(this.dtr(d)); },
	tan: function(d) { return Math.tan(this.dtr(d)); },

	arcsin: function(d) { return this.rtd(Math.asin(d)); },
	arccos: function(d) { return this.rtd(Math.acos(d)); },
	arctan: function(d) { return this.rtd(Math.atan(d)); },

	arccot: function(x) { return this.rtd(Math.atan(1/x)); },
	arctan2: function(y, x) { return this.rtd(Math.atan2(y, x)); },

	fixAngle: function(a) { return this.fix(a, 360); },
	fixHour:  function(a) { return this.fix(a, 24 ); },

	fix: function(a, b) { 
		a = a- b* (Math.floor(a/ b));
		return (a < 0) ? a+ b : a;
	}
}


//---------------------- Init Object -----------------------


var prayTimes = new PrayTimes();







/*========= Time Calc Js =========*/
(function () {
    "use strict";
    angular.module('timeCalc', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[{');
        $interpolateProvider.endSymbol('}]');
    })
        .controller('CtrlTimeCalc', ['$http', function ($http) {
            var timeCalc = this;
        
            timeCalc.dateAdd = function dateAdd(date, interval, units) {
                var ret = new Date(date); //don't change original date
                switch (interval.toLowerCase()) {
                    case 'year'   :  ret.setFullYear(ret.getFullYear() + units);  break;
                    case 'quarter':  ret.setMonth(ret.getMonth() + 3*units);  break;
                    case 'month'  :  ret.setMonth(ret.getMonth() + units);  break;
                    case 'week'   :  ret.setDate(ret.getDate() + 7*units);  break;
                    case 'day'    :  ret.setDate(ret.getDate() + units);  break;
                    case 'hour'   :  ret.setTime(ret.getTime() + units*3600000);  break;
                    case 'minute' :  ret.setTime(ret.getTime() + units*60000);  break;
                    case 'second' :  ret.setTime(ret.getTime() + units*1000);  break;
                    default       :  ret = undefined;  break;
                }
                
                return ret;
            };
            //this same method can be used for multiplication
            timeCalc.timeDivision = function timeDivision(days, hours, minutes, seconds, divisor) {
                var c1 = days/divisor;
                var c2 = hours/divisor;
                var c3 = minutes/divisor;
                var c4 = seconds/divisor;
                
                if (c1 != Math.round(c1)) {
                    c2 += (c1 - Math.floor(c1)) * 24;
                    c1 = Math.floor(c1);
                }
                if (c2 != Math.round(c2)) {
                    c3 += (c2 - Math.floor(c2)) * 60;
                    c2 = Math.floor(c2);
                }
                if (c3 != Math.round(c3)) {
                    c4 += (c3 - Math.floor(c3)) * 60;
                    c3 = Math.floor(c3);
                }
                while (c4 > 59) {
                    c3 += 1;
                    c4 -= 60;
                }
                while (c3 > 59) {
                    c2 += 1;
                    c3 -= 60;
                }
                while (c2 > 23) {
                    c1 += 1;
                    c2 -= 24;
                }

                while (c4 < 0 && (c3 > 0 || c2 > 0 || c1 > 0)) {
                    c3 -= 1;
                    c4 += 60;
                }
                while (c3 < 0 && (c2 > 0 || c1 > 0)) {
                    c2 -= 1;
                    c3 += 60;
                }
                while (c2 < 0 && c1 > 0) {
                    c1 -= 1;
                    c2 += 24;
                }
                if (c1 < 0) {
                    c1 += 1;
                    c2 = -(23 - c2);
                    c3 = -(59 - c3);
                    c4 = -(60 - c4);
                    while (c4 <= -60) {
                        c4 += 60;
                        c3 -= 1;
                    }
                    while (c3 <= -60) {
                        c3 += 60;
                        c2 -= 1;
                    }
                    while (c2 <= -24) {
                        c2 += 24;
                        c1 -= 1;
                    }
                }

                while (c1 < 0 && c2 > 0) {
                    c2 -= 24;
                    c1 += 1;
                }
                while (c2 < 0 && c3 > 0) {
                    c3 -= 60;
                    c2 += 1;
                }
                while (c3 < 0 && c4 > 0) {
                    c4 -= 60;
                    c3 += 1;
                }
                c4 *= 100;
                c4 = Math.round(c4);
                c4 /= 100;
                
                return {days: c1, hours: c2, minutes: c3, seconds: c4};
            };
            // Convert a time in hh:mm format to minutes
            timeCalc.timeToMins = function timeToMins(time) {
                var b = time.split(':');
                return b[0] * 60 + +b[1];
            }

            // Convert minutes to a time in format hh:mm
            // Returned value is in range 00  to 24 hrs
            timeCalc.timeFromMins = function timeFromMins(mins) {
                function z(n) {
                    return (n < 10 ? '0' : '') + n;
                }
                var h = (mins / 60 | 0) % 24;
                var m = mins % 60;
                return z(h) + ':' + z(m);
            }
            // Add two times in hh:mm format
            timeCalc.addTimes = function addTimes(t0, t1) {
              return timeCalc.timeFromMins(timeCalc.timeToMins(t0) + timeCalc.timeToMins(t1));
            }
            timeCalc.parseTime = function (tmpTime) {
                var time = tmpTime.match(/(\d+)(?::(\d\d))?\s*(p?)/);
                var d = new Date();
                d.setHours(parseInt(time[1]) + (time[3] ? 12 : 0));
                d.setMinutes(parseInt(time[2]) || 0);
                d.setSeconds(0, 0);
                return d;
            };
            timeCalc.getTime = function (tmpTime) {
                var msec = tmpTime;
                var hh = Math.floor(msec / 1000 / 60 / 60);
                msec -= hh * 1000 * 60 * 60;
                var mm = Math.floor(msec / 1000 / 60);
                msec -= mm * 1000 * 60;
                var ss = Math.floor(msec / 1000);
                msec -= ss * 1000;
                return hh + ":" + mm + ":" + ss;
            };
            timeCalc.formatTime = function formatTime(n) {
                return (n < 10 ? '0' : '') + n;
            }
            timeCalc.location = "dhaka, bangladesh";
            timeCalc.timeZone = "+6";
            timeCalc.method = "Karachi";
            timeCalc.fiqh = "Hanafi";
            
            timeCalc.change = function () {
                $http.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + timeCalc.location + '&key=AIzaSyCeYHbsA8mz5ll_2za73-nrvqAd2VaHvXU')
                .then(function(response) {
                    timeCalc.geoData = response.data;
                    
                    prayTimes.setMethod(timeCalc.method);
                    prayTimes.adjust({asr: timeCalc.fiqh});
                    timeCalc.lat = timeCalc.geoData.results[0].geometry.location.lat;
                    timeCalc.lng = timeCalc.geoData.results[0].geometry.location.lng;
                    timeCalc.prayerTimes = prayTimes.getTimes(new Date(), [timeCalc.lat, timeCalc.lng], timeCalc.timeZone);
                    
                    timeCalc.timeImsak = timeCalc.prayerTimes.imsak;
                    timeCalc.timeDawn = timeCalc.prayerTimes.fajr;
                    timeCalc.timeSunrise = timeCalc.prayerTimes.sunrise;
                    var ishraq = timeCalc.dateAdd(timeCalc.parseTime(timeCalc.timeSunrise), "minute", 20);
                    timeCalc.timeIshraq = timeCalc.formatTime(ishraq.getHours()) + ":" + timeCalc.formatTime(ishraq.getMinutes());
                    timeCalc.timeZawal = timeCalc.prayerTimes.dhuhr;
                    var zuhr = timeCalc.dateAdd(timeCalc.parseTime(timeCalc.timeZawal), "minute", 10);
                    timeCalc.timeZuhr = timeCalc.formatTime(zuhr.getHours()) + ":" + timeCalc.formatTime(zuhr.getMinutes());
                    timeCalc.timeAsr = timeCalc.prayerTimes.asr;
                    var preSunset = timeCalc.dateAdd(timeCalc.parseTime(timeCalc.prayerTimes.sunset), "minute", -20);
                    timeCalc.timePreSunset = timeCalc.formatTime(preSunset.getHours()) + ":" + timeCalc.formatTime(preSunset.getMinutes());
                    timeCalc.timeSunset = timeCalc.prayerTimes.sunset;
                    timeCalc.timeMaghrib = timeCalc.prayerTimes.maghrib;
                    timeCalc.timeIsha = timeCalc.prayerTimes.isha;

                    var dateSunrise = new Date(0, 0, 0, timeCalc.timeSunrise.split(":")[0], timeCalc.timeSunrise.split(":")[1], 0);
                    var dateSunset = new Date(0, 0, 0, timeCalc.timeSunset.split(":")[0], timeCalc.timeSunset.split(":")[1], 0);
                    var timeDiff = dateSunset.getTime() - dateSunrise.getTime();
                    var msec = timeDiff;
                    var hh = Math.floor(msec / 1000 / 60 / 60);
                    msec -= hh * 1000 * 60 * 60;
                    var mm = Math.floor(msec / 1000 / 60);
                    msec -= mm * 1000 * 60;
                    var ss = Math.floor(msec / 1000);
                    msec -= ss * 1000;
                    timeCalc.dayLength = timeCalc.formatTime(hh) + ":" + timeCalc.formatTime(mm);
                    
                    var timeDivision = timeCalc.timeDivision(0, hh, mm, ss, 4);
                    timeCalc.timeDuha = timeCalc.addTimes(timeCalc.timeSunrise, timeDivision.hours + ":" + timeDivision.minutes)
                    
                }, function(response) {
                    console.log(response.status);
                    console.log("Error occured");
                    return;
                });
            
                /*timeCalc.dayLength = "00:00:00";
                if (!timeCalc.timeDawn || !timeCalc.timeSunset) {
                    return;
                }*/               
                            
            };
            
            timeCalc.change();
        }]);
}());