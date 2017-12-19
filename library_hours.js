// extend Date object with a new method getDayName()
Date.prototype.getDayName = function() {
    var d = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    return d[this.getDay()];
}

// define library hours for each day name
var hours = {
    'monday': 'open 8:00 a.m. - 5:00 p.m.',
    'tuesday': 'open 8:00 a.m. - 5:00 p.m.',
    'wednesday': 'open 8:00 a.m. - 5:00 p.m.',
    'thursday': 'open 8:00 a.m. - 5:00 p.m.',
    'friday': 'open 8:00 a.m. - 5:00 p.m.',
    'saturday': 'closed today.',
    'sunday': 'closed today.'
};

// instantiate a new Date object and call getDayName() to display current library hours
var today = new Date();
alert("Today is " + today.getDayName() + ". We're " + hours[today.getDayName().toLowerCase()]);
