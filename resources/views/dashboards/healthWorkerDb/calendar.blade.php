@include('layouts.headHealthWorkers')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<style>
    #calendar {
        max-width: 100%;
        margin: 0 auto;
    }

    /* Optional: Style to highlight today */
    .fc-day-today {
        background-color: #F959F7 !important; /* Yellow highlight */
        color: black !important;
    }

    /* Optional: Adjust the appearance of days */
    .fc-daygrid-day {
        text-align: center;
        vertical-align: middle;
        font-size: 16px;
        padding: 10px;
    }

    /* Optional: Adjust the size of the calendar cells */
    .fc-daygrid-day-number {
        font-size: 18px;
        font-weight: bold;
    }


        .fc-event-title, 
        .fc-event-time {
            white-space: normal; /* Allow wrapping of text */
            word-wrap: break-word; /* Break long words if needed */
            overflow-wrap: break-word; /* Ensure long words break and wrap */
            cursor: pointer;
        }

        .fc-event .fc-content {
            display: block;
            white-space: normal;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .fc-event {
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .fc-event {
            height: auto;
        }

    .btnArea {
        display: flex;
        width: 30%;
        height: 40px;
        gap: 10px;
        justify-content: flex-end
    }

    .card-body {
        overflow: auto;
        padding: 15px
    }
    
    .pagetitle {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #f2f2f2;
    }
    .mainTitle {
        display: flex;
        justify-content: center;
    }

</style>
<body>

  <!-- ======= Header ======= -->
    @include('layouts.headerHealthWorkers')

  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebarHealthWorkers')
  <!-- End Sidebar -->

  <main id="main" class="main">
    <div class="pagetitle">
        <h1>Schedule (FP, ANTE-PARTUM, POST-PARTUM, IMMUNIZATION)</h1>
        <div class="btnArea">
            <button type="button" class="btn btn-primary" style="width: 40%;"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div><!-- End Page Title -->
  
    <div class="card">
        <div class="card-body">
            <!-- Calendar container -->
            <div id="calendar"></div>
        </div>
    </div>
</main><!-- End #main -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
// Get the events from the server-side
const events = @json($events);

// Initialize the calendar
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        events: events.map(event => {
            // Create the event title with Name, Description, and Date
            // const eventDate = new Date(event.date).toLocaleString(); // Format the date as per your preference
            const title = `${event.Name} - ${event.description}`;

            return {
                title: title, // Set the concatenated string as the title
                start: event.date, // Ensure the date is in the correct format (ISO 8601)
                extendedProps: {
                    type: event.type, // Event type (vt, ap, pp, db)
                    id: event.id,     // Event ID
                    name: event.Name  // Add Name to extendedProps
                }
            };
        }),
        eventClick: function(info) {
            // Get the event type and ID
            const eventType = info.event.extendedProps.type;
            const eventId = info.event.extendedProps.id;

            let url = '';

            // Determine the URL based on the event type
            switch (eventType) {
                case 'vt':
                    url = `{{ route('epiForm', ['epi_id' => '__ID__']) }}`.replace('__ID__', eventId);
                    break;
                case 'ap':
                    url = `{{ route('matAnte', ['mat_id' => '__ID__']) }}`.replace('__ID__', eventId);
                    break;
                case 'pp':
                    url = `{{ route('matPost', ['mat_id' => '__ID__']) }}`.replace('__ID__', eventId);
                    break;
                case 'db':
                    url = `{{ route('fpForm', ['fp_id' => '__ID__']) }}`.replace('__ID__', eventId);
                    break;
                default:
                    return; // No URL if type is unrecognized
            }

            // Redirect to the corresponding URL
            window.location.href = url;
        },
        initialView: 'dayGridMonth',
        eventRender: function(info) {
            // You can display the Name in the tooltip or modify it further here
            info.el.title = info.event.extendedProps.name; // Tooltip with Name
        },
    });

    calendar.render();
});



</script>
@include('layouts.footerHealthWorkers')

</body>
</html>