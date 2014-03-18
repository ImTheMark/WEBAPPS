/* Loads the Google data JavaScript client library */
google.load("gdata", "2.x");

var curr = 0;
var array = new Array();
function init() {
  // init the Google data JS client library with an error handler
  google.gdata.client.init(handleGDError);
  // load the code.google.com developer calendar
  loadDeveloperCalendar();
}

/**
 * Loads the Google Developers Event Calendar
 */
 
function sleep(delay) {
    var start = new Date().getTime();
    while (new Date().getTime() < start + delay);
  }
 
function loadDeveloperCalendar() {
  $.ajax({
      type: "POST",
      data: {
	  },
      url: "php/fetchcalendarlinks.php",
      success: function(data){
		 array = data.split("-");
		 array.pop();
		 
		 for (var i = 0; i < array.length; i++){
			elem = array[i];
			loadCalendarByAddress(elem);
		  }
		}
	});
	
}

/**
 * Adds a leading zero to a single-digit number.  Used for displaying dates.
 */
function padNumber(num) {
  if (num <= 9) {
    return "0" + num;
  }
  return num;
}

/**
 * Determines the full calendarUrl based upon the calendarAddress
 * argument and calls loadCalendar with the calendarUrl value.
 *
 * @param {string} calendarAddress is the email-style address for the calendar
 */ 
function loadCalendarByAddress(elem) {
  var calendarAddress = elem.split(" ")[1];
  var calendarUrl = 'https://www.google.com/calendar/feeds/' +
                    calendarAddress + 
                    '/public/full';
  var companyID = elem.split(" ")[0];
  loadCalendar(calendarUrl, companyID);
}

/**
 * Uses Google data JS client library to retrieve a calendar feed from the specified
 * URL.  The feed is controlled by several query parameters and a callback 
 * function is called to process the feed results.
 *
 * @param {string} calendarUrl is the URL for a public calendar feed
 */  
function loadCalendar(calendarUrl,companyID) {
  var service = new 
      google.gdata.calendar.CalendarService('gdata-js-client-samples-simple');
  var query = new google.gdata.calendar.CalendarEventQuery(calendarUrl);
  query.setOrderBy('starttime');
  query.setSortOrder('ascending');
  query.setFutureEvents(true);
  query.setSingleEvents(true);
  query.setMaxResults(1000);
  service.getEventsFeed(query, listEvents, handleGDError);
}

/**
 * Callback function for the Google data JS client library to call when an error
 * occurs during the retrieval of the feed.  Details available depend partly
 * on the web browser, but this shows a few basic examples. In the case of
 * a privileged environment using ClientLogin authentication, there may also
 * be an e.type attribute in some cases.
 *
 * @param {Error} e is an instance of an Error 
 */
function handleGDError(e) {
  document.getElementById('jsSourceFinal').setAttribute('style', 
      'display:none');
  if (e instanceof Error) {
    /* alert with the error line number, file and message */
    alert('Error at line ' + e.lineNumber +
          ' in ' + e.fileName + '\n' +
          'Message: ' + e.message);
    /* if available, output HTTP error code and status text */
    if (e.cause) {
      var status = e.cause.status;
      var statusText = e.cause.statusText;
      alert('Root cause: HTTP error ' + status + ' with status text of: ' + 
            statusText);
    }
  } else {
    alert(e.toString());
  }
}

/**
 * Callback function for the Google data JS client library to call with a feed 
 * of events retrieved.
 * @param {json} feedRoot is the root of the feed, containing all entries 
 */ 
function listEvents(feedRoot) {
  elem = array[curr].split(" ");
  var companyID = elem[0];
  var calendarlink = elem[1];
  curr = curr + 1;
  
  var entries = feedRoot.feed.getEntries();
  var len = entries.length;
  for (var i = 0; i < len; i++) {
    var entry = entries[i];
    var title = entry.getTitle().getText();
	var des = entry.getContent().getText();
	var where = entry.getLocations()[0].getValueString();
    var startDateTime = null;
    var startJSDate = null;
    var times = entry.getTimes();
    if (times.length > 0) {
      startDateTime = times[0].getStartTime();
      startJSDate = startDateTime.getDate();
	  endDateTime = times[0].getEndTime();
	  endJSDate = endDateTime.getDate();
    }
    var dateString = (startJSDate.getYear()+1900) + "-" + (startJSDate.getMonth() + 1) + "-" + startJSDate.getDate();
    if (!startDateTime.isDateOnly()) {
      dateString += " " + startJSDate.getHours() + ":" + 
          padNumber(startJSDate.getMinutes()) + ":00";
    }
	
	var edateString = (startJSDate.getYear()+1900) + "-" +(endJSDate.getMonth() + 1) + "-" + endJSDate.getDate();
    if (!endDateTime.isDateOnly()) {
      edateString += " " + endJSDate.getHours() + ":" + 
          padNumber(endJSDate.getMinutes())+ ":00";
    }
	
	var eventTitle = title;
	var location = where;
	var startDateTime = dateString;
	var endDateTime = edateString;
	var photoURL = des.substr(0,des.indexOf('\n'));
	var description = des.substr(des.indexOf('\n'), des.length);
	$.ajax({
		  type: "POST",
		  data: {
			 'eventname' : eventTitle,
			 'location' : location,
			 'startdatetime' : startDateTime , 
			 'enddatetime' : endDateTime, 
			 'photoURL' : photoURL,
			 'description' : description,
			 'companyID' : companyID,
		  },
		  url: "php/insertevent.php",
		  success: function(data){
				alert(data);
			}
		});
	
	
  }
}

google.setOnLoadCallback(init);
//-->