// import 'react-calendar/dist/Calendar.css';
// import React, { useState } from 'react';
// import Calendar from 'react-calendar';
// import 'react-calendar/dist/Calendar.css';

// const EventPage = () => {
//   const [date, setDate] = useState(new Date());
//   const [events, setEvents] = useState([
//     { date: new Date(2024, 3, 15), title: 'Event 1', club: 'Club A', poster: 'poster1.jpg', description: 'Description of Event 1' },
//     { date: new Date(2024, 3, 20), title: 'Event 2', club: 'Club B', poster: 'poster2.jpg', description: 'Description of Event 2' },
//     // Add more events here...
//   ]);

//   const onChange = (newDate) => {
//     setDate(newDate);
//   };

//   const onEventClick = (event) => {
//     // Handle event click
//     console.log('Clicked event:', event);
//   };

//   return (
//     <div>
//       <h1>Event Calendar</h1>
//       <Calendar
//         onChange={onChange}
//         value={date}
//       />
//       <div className="events">
//         {events.map(event => (
//           <div key={event.title}>
//             <div>Date: {event.date.toLocaleDateString()}</div>
//             <div>Title: {event.title}</div>
//             <div>Club: {event.club}</div>
//             <button onClick={() => onEventClick(event)}>View Details</button>
//           </div>
//         ))}
//       </div>
//     </div>
//   );
// };

// export default EventPage;
