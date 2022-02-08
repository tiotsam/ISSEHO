import React from 'react';

function Calendar() {

    var gapi = window.gapi
    var CLIENT_ID = "112455025622-98sbh1g5cd6fuea2h1disut3bvglem71.apps.googleusercontent.com"
    var API_KEY = "AIzaSyAxSNEA2Pp63LUWFOkEGgmVxitPDpqvb0I"
    // var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"]
    var DISCOVERY_DOCS = ["https://www.googleapis.com/auth/calendar"]
    var SCOPES = "https://www.googleapis.com/auth/calendar.events"

    const handleClick = () => {
      gapi.load('client:auth2', () => {
        console.log('loaded client')
  
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES,
        })
  
        gapi.client.load('calendar', 'v3', () => console.log('bam!'))
  
        gapi.auth2.getAuthInstance().signIn()
        .then(() => {
          console.log('création event')
          var event = {
            'summary': 'Awesome Event!',
            'location': '800 Howard St., San Francisco, CA 94103',
            'description': 'Really great refreshments',
            'start': {
              'dateTime': '2020-06-28T09:00:00-07:00',
              'timeZone': 'America/Los_Angeles'
            },
            'end': {
              'dateTime': '2020-06-28T17:00:00-07:00',
              'timeZone': 'America/Los_Angeles'
            },
            'recurrence': [
              'RRULE:FREQ=DAILY;COUNT=2'
            ],
            'attendees': [
              {'email': 'lpage@example.com'},
              {'email': 'sbrin@example.com'}
            ],
            'reminders': {
              'useDefault': false,
              'overrides': [
                {'method': 'email', 'minutes': 24 * 60},
                {'method': 'popup', 'minutes': 10}
              ]
            }
          }
  
          var request = gapi.client.calendar.events.insert({
            'calendarId': 'primary',
            'resource': event,
          })
  
          request.execute(event => {
            console.log(event)
            console.log('afficher event')
            window.open(event.htmlLink)
          })
      
  
        })
      })
    }
  
  
    return (
      <div className="App">
        <header className="App-header">
          <p></p>
          <p style={{fontSize: 18}}></p>
          <p style={{fontSize: 18}}></p>
          <button style={{width: 100, height: 50}} onClick={() => handleClick()}>Add Event</button>
        </header>
      </div>
    );
  }
  

export default Calendar;
