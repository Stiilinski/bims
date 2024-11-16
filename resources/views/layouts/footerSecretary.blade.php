

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

{{-- SCRIPT FOR BRGY CAPTAIN --}}

<script>
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
                              <img src="/storage/${schedule.sched_picture}" alt="" style="height:60px!important;">
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
                          <img src="/storage/${schedule.sched_picture}" alt="" style="height:60px!important;">
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

//updateEmployee
$(document).ready(function() {
      $('#e_empForm').on('submit', function(event) {
          event.preventDefault();
          var formData = new FormData(this);
          
          $.ajax({
              url: '{{ url("/update-employee/".$LoggedUserInfo["em_id"]) }}',
              method: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response) {
                  if(response.status === 200) {
                      alert(response.msg);
                  } else {
                      alert('Error: ' + response.msg);
                  }
              },
              error: function(response) {
                  alert('Error: ' + response.responseJSON.message);
              }
          });
      });
  });

//updateEmployeePassword
  $(document).ready(function() {
      $('#changePasswordForm').on('submit', function(event) {
          event.preventDefault();
          var formData = new FormData(this);
          
          $.ajax({
              url: '{{ url("/change-password/".$LoggedUserInfo["em_id"]) }}',
              method: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response) {
                  if(response.status === 200) {
                      alert(response.msg);
                  } else {
                      alert('Error: ' + response.msg);
                  }
              },
              error: function(response) {
                  alert('Error: ' + response.responseJSON.message);
              }
          });
      });
  });


//VIEW DOCUMENT DETAILS
  document.addEventListener('DOMContentLoaded', function () {
      var exampleModal = document.getElementById('ExtralargeModal');
      
      exampleModal.addEventListener('show.bs.modal', function (event) {
          var button = event.relatedTarget;
          var type = button.getAttribute('data-type');
          var id = button.getAttribute('data-id');

          if (type === 'certificate') {
              fetchCertificateData(id);
          } else if (type === 'business') {
              fetchBusinessData(id);
          }
          else if (type === 'clearance') {
              fetchClearanceData(id);
          }
          else if (type === 'blotter') {
              fetchBlotterData(id);
          }
      });

      function fetchCertificateData(certId) {
          fetch(`/residentCertificate/${certId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.message) {
                      console.error(data.message);
                      return;
                  }
                  populateCertificateData(data);
              })
              .catch(error => {
                  console.error('Error fetching certificate data:', error);
              });
      }

      function fetchBusinessData(permitId) {
          fetch(`/residentBusiness/${permitId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.message) {
                      console.error(data.message);
                      return;
                  }
                  populateBusinessData(data);
              })
              .catch(error => {
                  console.error('Error fetching business data:', error);
              });
      }

      function fetchClearanceData(clearId) {
          fetch(`/residentClearance/${clearId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.message) {
                      console.error(data.message);
                      return;
                  }
                  populateClearanceData(data);
              })
              .catch(error => {
                  console.error('Error fetching Clearance data:', error);
              });
      }

      function fetchBlotterData(blotterId) {
          fetch(`/residentBlotter/${blotterId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.message) {
                      console.error(data.message);
                      return;
                  }
                  populateBlotterData(data);
              })
              .catch(error => {
                  console.error('Error fetching Clearance data:', error);
              });
      }

      function populateCertificateData(data) {
          document.getElementById('transactionCode').textContent = data.cert_transactionCode || 'N/A';
          document.getElementById('purpose').textContent = data.cert_purpose || 'N/A';
          document.getElementById('dateIssued').textContent = data.cert_dateIssued || 'N/A';
          document.getElementById('pickUpDate').textContent = data.cert_pickUpDate || 'N/A';
          document.getElementById('status').textContent = data.certStatus || 'N/A';
          document.getElementById('reason').textContent = data.certReason || 'N/A';
          document.getElementById('fullName').textContent = `${data.res_fname} ${data.res_mname ? data.res_mname[0] + '.' : ''} ${data.res_lname}` || 'N/A';
          document.getElementById('placeOfBirth').textContent = data.res_bplace || 'N/A';
          document.getElementById('birthDate').textContent = data.res_bdate || 'N/A';
          document.getElementById('age').textContent = calculateAge(data.res_bdate) || 'N/A';
          document.getElementById('civilStatus').textContent = data.res_civil || 'N/A';
          document.getElementById('sex').textContent = data.res_sex || 'N/A';
          document.getElementById('purok').textContent = data.res_purok || 'N/A';
          document.getElementById('votersStatus').textContent = data.res_voters || 'N/A';
          document.getElementById('email').textContent = data.res_email || 'N/A';
          document.getElementById('contactNumber').textContent = data.res_contact || 'N/A';
          document.getElementById('citizenship').textContent = data.res_citizen || 'N/A';
          document.getElementById('address').textContent = data.res_address || 'N/A';
          document.getElementById('houseHoldNumber').textContent = data.res_household || 'N/A';
          document.getElementById('occupation').textContent = data.res_occupation || 'N/A';
      }

      function populateBusinessData(data) {
          document.getElementById('transactionCode').textContent = data.bc_transactionCode || 'N/A';
          document.getElementById('businessName').textContent = data.bc_businessName || 'N/A';
          document.getElementById('businessAddress').textContent = data.bc_businessAddress || 'N/A';
          document.getElementById('businessType').textContent = data.bc_businessType || 'N/A';
          document.getElementById('businessNature').textContent = data.bc_businessNature || 'N/A';
          document.getElementById('dateIssued').textContent = data.bc_dateIssued || 'N/A';
          document.getElementById('pickUpDate').textContent = data.bc_pickUpDate || 'N/A';
          document.getElementById('status').textContent = data.bc_status || 'N/A';
          document.getElementById('reason').textContent = data.bc_reason || 'N/A';
          document.getElementById('fullName').textContent = `${data.res_fname} ${data.res_mname ? data.res_mname[0] + '.' : ''} ${data.res_lname}` || 'N/A';
          document.getElementById('placeOfBirth').textContent = data.res_bplace || 'N/A';
          document.getElementById('birthDate').textContent = data.res_bdate || 'N/A';
          document.getElementById('age').textContent = calculateAge(data.res_bdate) || 'N/A';
          document.getElementById('civilStatus').textContent = data.res_civil || 'N/A';
          document.getElementById('sex').textContent = data.res_sex || 'N/A';
          document.getElementById('purok').textContent = data.res_purok || 'N/A';
          document.getElementById('votersStatus').textContent = data.res_voters || 'N/A';
          document.getElementById('email').textContent = data.res_email || 'N/A';
          document.getElementById('contactNumber').textContent = data.res_contact || 'N/A';
          document.getElementById('citizenship').textContent = data.res_citizen || 'N/A';
          document.getElementById('address').textContent = data.res_address || 'N/A';
          document.getElementById('houseHoldNumber').textContent = data.res_household || 'N/A';
          document.getElementById('occupation').textContent = data.res_occupation || 'N/A';
      }

      function populateClearanceData(data) {
          document.getElementById('transactionCode').textContent = data.bcl_transactionCode || 'N/A';
          document.getElementById('purpose').textContent = data.bcl_purpose || 'N/A';
          document.getElementById('dateIssued').textContent = data.bcl_dateIssued || 'N/A';
          document.getElementById('pickUpDate').textContent = data.bcl_pickUpDate || 'N/A';
          document.getElementById('status').textContent = data.bcl_status || 'N/A';
          document.getElementById('reason').textContent = data.bcl_reason || 'N/A';
          document.getElementById('fullName').textContent = `${data.res_fname} ${data.res_mname ? data.res_mname[0] + '.' : ''} ${data.res_lname}` || 'N/A';
          document.getElementById('placeOfBirth').textContent = data.res_bplace || 'N/A';
          document.getElementById('birthDate').textContent = data.res_bdate || 'N/A';
          document.getElementById('age').textContent = calculateAge(data.res_bdate) || 'N/A';
          document.getElementById('civilStatus').textContent = data.res_civil || 'N/A';
          document.getElementById('sex').textContent = data.res_sex || 'N/A';
          document.getElementById('purok').textContent = data.res_purok || 'N/A';
          document.getElementById('votersStatus').textContent = data.res_voters || 'N/A';
          document.getElementById('email').textContent = data.res_email || 'N/A';
          document.getElementById('contactNumber').textContent = data.res_contact || 'N/A';
          document.getElementById('citizenship').textContent = data.res_citizen || 'N/A';
          document.getElementById('address').textContent = data.res_address || 'N/A';
          document.getElementById('houseHoldNumber').textContent = data.res_household || 'N/A';
          document.getElementById('occupation').textContent = data.res_occupation || 'N/A';
      }

      function populateBlotterData(data) {
          document.getElementById('transactionCode').textContent = data.blotter_transactionCode || 'N/A';
          document.getElementById('repondents').textContent = data.blotter_respondents || 'N/A';
          document.getElementById('brgyFor').textContent = data.blotter_for || 'N/A';
          document.getElementById('brgyCN').textContent = data.blotter_brgyCaseNum || 'N/A';
          document.getElementById('complaint').textContent = data.blotter_complaint || 'N/A';
          document.getElementById('resolution').textContent = data.blotter_resolution || 'N/A';
          document.getElementById('complaintMade').textContent = data.blotter_complaintMade || 'N/A';
          document.getElementById('filedDate').textContent = data.blotter_filedDate || 'N/A';
          document.getElementById('status').textContent = data.blotter_status || 'N/A';
          document.getElementById('reason').textContent = data.blotter_reason || 'N/A';
          document.getElementById('fullName').textContent = `${data.res_fname} ${data.res_mname ? data.res_mname[0] + '.' : ''} ${data.res_lname}` || 'N/A';
          document.getElementById('placeOfBirth').textContent = data.res_bplace || 'N/A';
          document.getElementById('birthDate').textContent = data.res_bdate || 'N/A';
          document.getElementById('age').textContent = calculateAge(data.res_bdate) || 'N/A';
          document.getElementById('civilStatus').textContent = data.res_civil || 'N/A';
          document.getElementById('sex').textContent = data.res_sex || 'N/A';
          document.getElementById('purok').textContent = data.res_purok || 'N/A';
          document.getElementById('votersStatus').textContent = data.res_voters || 'N/A';
          document.getElementById('email').textContent = data.res_email || 'N/A';
          document.getElementById('contactNumber').textContent = data.res_contact || 'N/A';
          document.getElementById('citizenship').textContent = data.res_citizen || 'N/A';
          document.getElementById('address').textContent = data.res_address || 'N/A';
          document.getElementById('houseHoldNumber').textContent = data.res_household || 'N/A';
          document.getElementById('occupation').textContent = data.res_occupation || 'N/A';
      }

      function calculateAge(birthDate) {
          var birth = new Date(birthDate);
          var now = new Date();
          var age = now.getFullYear() - birth.getFullYear();
          var m = now.getMonth() - birth.getMonth();
          if (m < 0 || (m === 0 && now.getDate() < birth.getDate())) {
              age--;
          }
          return age;
      }
  });

//View Purok Residents List
document.querySelectorAll('.purokName').forEach(button => {
          button.addEventListener('click', function() {
              let purokName = this.getAttribute('data-purok');
              fetchPurokResidents(purokName);
          });
      });

      const printBtn = document.getElementById('print');
      printBtn.addEventListener('click', function() {
          window.print();
      });

      function fetchPurokResidents(purok) {
          $.ajax({
              url: '/fetch-purok-residents',
              type: 'GET',
              data: { purok: purok },
              success: function(response) {
                  populateTable(response);
                  document.querySelector('.tablePart').classList.remove('hidden');
              },
              error: function(xhr) {
                  console.error('An error occurred:', xhr.status, xhr.statusText);
              }
          });
      }

      function populateTable(data) {
          let tableBody = document.getElementById('purokResidents');
          tableBody.innerHTML = '';

          data.forEach((resident, index) => {
              let row = `<tr>
                  <td>${index + 1}</td>
                  <td>${resident.fullName}</td>
                  <td>${resident.age}</td>
                  <td>${resident.birthDate}</td>
                  <td>${resident.sex}</td>
                  <td>${resident.voterStatus}</td>
                  <td>${resident.purok}</td>
              </tr>`;
              tableBody.insertAdjacentHTML('beforeend', row);
          });
      }

      
//Count Purok Population
document.addEventListener("DOMContentLoaded", function() {
      fetch('/purok-counts')
          .then(response => response.json())
          .then(data => {
              document.querySelectorAll('.purokName').forEach(function(card) {
                  let purok = card.getAttribute('data-purok');
                  let count = data[purok] || 0;
                  card.querySelector('.card-title').innerText = purok;
                  card.querySelector('h2').innerText = count.toLocaleString();
              });
          });
  });
</script>