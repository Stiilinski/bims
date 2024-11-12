<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/chart.js/chart.umd.js"></script>
<script src="/assets/vendor/echarts/echarts.min.js"></script>
<script src="/assets/vendor/quill/quill.js"></script>
<script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

<script>
       // EVENTS
        //private schedules
        $(document).ready(function() {
            // Fetch private schedules for today
            $.ajax({
                url: '{{ url('/privateSchedules') }}', // Update this to your correct route
                type: 'GET',
                success: function(schedules) {
                    let container = $('#schedules-container');
                    container.empty(); // Clear any existing content

                    schedules.forEach(function(schedule) {
                        let scheduleItem = `
                            <div class="post-item clearfix">
                                <img src="${schedule.sched_picture.replace('public/', '/')}" alt="" style="height:60px!important;">
                                <h4>${schedule.sched_title}</h4>
                                <p>${schedule.sched_description}</p>
                            </div>
                        `;
                        container.append(scheduleItem);
                    });
                },
                error: function(response) {
                    let container = $('#schedules-container');
                    container.empty(); // Clear any existing content

                    let errorMessage = `
                        <div class="post-item clearfix">
                            <p>${response.responseJSON.message}</p>
                        </div>
                    `;
                    container.append(errorMessage);
                }
            });
        });
 
        //public schedule
        $(document).ready(function() {
            // Fetch private schedules for today
            $.ajax({
                url: '{{ url('/schedule') }}', // Update this to your correct route
                type: 'GET',
                success: function(schedules) {
                    let container = $('#publicSchedules-container');
                    container.empty(); // Clear any existing content

                    schedules.forEach(function(schedule) {
                        let scheduleItem = `
                            <div class="post-item clearfix">
                                <img src="${schedule.sched_picture.replace('public/', '/')}" alt="" style="height:60px!important;">
                                <h4>${schedule.sched_title}</h4>
                                <p>${schedule.sched_description}</p>
                            </div>
                        `;
                        container.append(scheduleItem);
                    });
                },
                error: function(response) {
                    let container = $('#publicSchedules-container');
                    container.empty(); // Clear any existing content

                    let errorMessage = `
                        <div class="post-item clearfix">
                            <p>${response.responseJSON.message}</p>
                        </div>
                    `;
                    container.append(errorMessage);
                }
            });
        });


        // Get the current date MONTHS
        const currentDate = new Date().toLocaleString('en-US', { timeZone: 'Asia/Manila' });
        // Get the month from the current date (returns a number from 0 to 11)
        const currentMonth = new Date(currentDate).getMonth();
        // Array of month names
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                            'July', 'August', 'September', 'October', 'November', 'December'];
        // Get the month name using the currentMonth as an index
        const monthName = monthNames[currentMonth]; 
        // Find the span element by its id
        const spanElement = document.getElementById('currentMonthSpan');
        // Update the content of the span element
        if (spanElement) {
        spanElement.textContent = `| ${monthName}`;
        }
</script>