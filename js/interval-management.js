//digunakan untuk membersihkan interval yang tidak digunakan lagi
//karena interval yang diaktifkan di proses ajax yang tidak dipakai lagi dan interval masih ada
//karena halaman tidak direfresh
var intervalArray = [];

function clearAllIntervals() {
    for (var i in intervalArray) {
        
    }
}

var chatInterval = [];
var chatIntervalLimit = 5;
function clearOldChatIntervals() {
    var chatIntervalLength = chatInterval.length;
    if (chatIntervalLength > chatIntervalLimit) {
        for (var i = chatIntervalLength; i > chatIntervalLimit; i--) {
            removeInterval(chatInterval[i-1]);
        }
    }
}