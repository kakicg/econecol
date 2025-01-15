// const api_key = 'AIzaSyC55UqCCqsAhmkhxqBfBo7qqpqPMpxMSz0'
const api_key = 'AIzaSyC55UqCCqsAhmkhxqBfBo7qqpqPMpxMSz0'
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl1 = document.getElementById('calendar1');
  var calendar1 = new FullCalendar.Calendar(calendarEl1, {  
    locale: 'ja',   
    initialView: 'dayGridMonth',
    displayEventTime: false,
    contentHeight: 'auto',
    googleCalendarApiKey: api_key,
    events: '8kken01@gmail.com',
    eventDidMount: function (info) {
      if (info.event._def.title=='休み') {
        info.el.style.background='#d04000' ;
        info.el.style.borderColor='#d04000' ;

      }
      else if (info.event._def.title=='臨時休業日') {
        info.el.style.background='#d04000' ;
        info.el.style.borderColor='#d04000' ;

      }
      else {
        info.el.style.background='#4e7627' ;
      }
    }
  });
  calendar1.render();
});
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl2 = document.getElementById('calendar2');
  var calendar2 = new FullCalendar.Calendar(calendarEl2, {     
    locale: 'ja',
    initialView: 'dayGridMonth',
    displayEventTime: false,
    contentHeight: 'auto',
    googleCalendarApiKey: api_key,
    events: '8kken02@gmail.com',
    eventDidMount: function (info) {
      if (info.event._def.title=='休み') {
        info.el.style.background='#d04000' ;
        info.el.style.borderColor='#d04000' ;
      }
      else {
        info.el.style.background='#4e7627' ;
      }
    }
  });
  calendar2.render();
});