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

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // Fetch private schedules for today
    $.ajax({
        url: '{{ url('/privateSchedules') }}', // Update this to your correct route
        type: 'GET',
        success: function(schedules) {
            let container = $('#schedules-container');
            container.empty(); // Clear any existing content

            schedules.forEach(function(schedule) {
                let truncatedDescription = schedule.sched_description.length > 30 ? schedule.sched_description.substring(0, 30) + '...' : schedule.sched_description;
                let fullDescription = schedule.sched_description; // Full description
                let scheduleItem = `
                    <div class="post-item clearfix">
                        <img src="${schedule.sched_picture.replace('public/', '/')}" alt="" style="height:60px!important;">
                        <h4>${schedule.sched_title}</h4>
                        <p class="sched-description">${truncatedDescription} <a href="#" class="see-more">See more...</a></p>
                        <p class="full-description" style="display:none;">${fullDescription} <a href="#" class="see-less">See less...</a></p>
                    </div>
                `;
                container.append(scheduleItem);
            });

            // Toggle between truncated description and full description
            container.on('click', '.see-more, .see-less', function(e) {
                e.preventDefault();
                let $this = $(this);
                let $postItem = $this.closest('.post-item');
                let $description = $postItem.find('.sched-description');
                let $fullDescription = $postItem.find('.full-description');

                // Check which link was clicked and toggle accordingly
                if ($this.hasClass('see-more')) {
                    $description.hide(); // Hide truncated description
                    $fullDescription.show(); // Show full description
                } else if ($this.hasClass('see-less')) {
                    $fullDescription.hide(); // Hide full description
                    $description.show(); // Show truncated description
                }
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

    // Fetch public schedules
    $.ajax({
        url: '{{ url('/schedule') }}', // Update this to your correct route
        type: 'GET',
        success: function(schedules) {
            let container = $('#publicSchedules-container');
            container.empty(); // Clear any existing content

            schedules.forEach(function(schedule) {
                let truncatedDescription = schedule.sched_description.length > 30 ? schedule.sched_description.substring(0, 30) + '...' : schedule.sched_description;
                let fullDescription = schedule.sched_description; // Full description
                let scheduleItem = `
                    <div class="post-item clearfix">
                        <img src="${schedule.sched_picture.replace('public/', '/')}" alt="" style="height:60px!important;">
                        <h4>${schedule.sched_title}</h4>
                        <p class="sched-description">${truncatedDescription} <a href="#" class="see-more">See more...</a></p>
                        <p class="full-description" style="display:none;">${fullDescription} <a href="#" class="see-less">See less...</a></p>
                    </div>
                `;
                container.append(scheduleItem);
            });

            // Toggle between truncated description and full description
            container.on('click', '.see-more, .see-less', function(e) {
                e.preventDefault();
                let $this = $(this);
                let $postItem = $this.closest('.post-item');
                let $description = $postItem.find('.sched-description');
                let $fullDescription = $postItem.find('.full-description');

                // Check which link was clicked and toggle accordingly
                if ($this.hasClass('see-more')) {
                    $description.hide(); // Hide truncated description
                    $fullDescription.show(); // Show full description
                } else if ($this.hasClass('see-less')) {
                    $fullDescription.hide(); // Hide full description
                    $description.show(); // Show truncated description
                }
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

</script>