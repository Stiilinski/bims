/**
* Template Name: NiceAdmin
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Updated: Apr 20 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Sidebar toggle
   */
  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function(e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }

  /**
   * Search bar toggle
   */
  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function(e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  /**
   * Initiate quill editors
   */
  if (select('.quill-editor-default')) {
    new Quill('.quill-editor-default', {
      theme: 'snow'
    });
  }

  if (select('.quill-editor-bubble')) {
    new Quill('.quill-editor-bubble', {
      theme: 'bubble'
    });
  }

  if (select('.quill-editor-full')) {
    new Quill(".quill-editor-full", {
      modules: {
        toolbar: [
          [{
            font: []
          }, {
            size: []
          }],
          ["bold", "italic", "underline", "strike"],
          [{
              color: []
            },
            {
              background: []
            }
          ],
          [{
              script: "super"
            },
            {
              script: "sub"
            }
          ],
          [{
              list: "ordered"
            },
            {
              list: "bullet"
            },
            {
              indent: "-1"
            },
            {
              indent: "+1"
            }
          ],
          ["direction", {
            align: []
          }],
          ["link", "image", "video"],
          ["clean"]
        ]
      },
      theme: "snow"
    });
  }

  /**
   * Initiate TinyMCE Editor
   */

  const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
  const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

  tinymce.init({
    selector: 'textarea.tinymce-editor',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
    editimage_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [{
        title: 'My page 1',
        value: 'https://www.tiny.cloud'
      },
      {
        title: 'My page 2',
        value: 'http://www.moxiecode.com'
      }
    ],
    image_list: [{
        title: 'My page 1',
        value: 'https://www.tiny.cloud'
      },
      {
        title: 'My page 2',
        value: 'http://www.moxiecode.com'
      }
    ],
    image_class_list: [{
        title: 'None',
        value: ''
      },
      {
        title: 'Some class',
        value: 'class-name'
      }
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', {
          text: 'My text'
        });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', {
          alt: 'My alt text'
        });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', {
          source2: 'alt.ogg',
          poster: 'https://www.google.com/logos/google.jpg'
        });
      }
    },
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });

  /**
   * Initiate Bootstrap validation check
   */
  var needsValidation = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(needsValidation)
    .forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })

  /**
   * Initiate Datatables
   */
  const datatables = select('.datatable', true)
  datatables.forEach(datatable => {
    new simpleDatatables.DataTable(datatable, {
      perPageSelect: [5, 10, 15, ["All", -1]],
      columns: [{
          select: 2,
          sortSequence: ["desc", "asc"]
        },
        {
          select: 3,
          sortSequence: ["desc"]
        },
        {
          select: 4,
          cellClass: "green",
          headerClass: "red"
        }
      ]
    });
  })

  /**
   * Autoresize echart charts
   */
  const mainContainer = select('#main');
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function() {
        select('.echart', true).forEach(getEchart => {
          echarts.getInstanceByDom(getEchart).resize();
        })
      }).observe(mainContainer);
    }, 200);
  }











   /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
   function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Animate the skills items on reveal
   */
  let skillsAnimation = document.querySelectorAll('.skills-animation');
  skillsAnimation.forEach((item) => {
    new Waypoint({
      element: item,
      offset: '80%',
      handler: function(direction) {
        let progress = item.querySelectorAll('.progress .progress-bar');
        progress.forEach(el => {
          el.style.width = el.getAttribute('aria-valuenow') + '%';
        });
      }
    });
  });

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);



//FOR CERTIFICATE TABLE
// $(function(){      
//   $("#certificate").on('submit', function(e){
//       e.preventDefault();

//       $.ajax({
//           url:$(this).attr('action'),
//           method:$(this).attr('method'),
//           data:new FormData(this),
//           processData:false,
//           dataType:'json',
//           contentType:false,
//           beforeSend:function(){
//               $(document).find('span.error-text').text('');
//           },
//           success:function(data){
//               if(data.status == 0){
//                   $.each(data.error, function(prefix, val){
//                       $('span.'+prefix+'_error').text(val[0]);
//                   });
//               }else{
//                   $('#certificate')[0].reset();
//                   alert(data.msg);
//               }
//           }
//       });
//   });
// });
$(function(){      
  $("#certificate").on('submit', function(e){
      e.preventDefault();

      // Get CSRF token from meta tag
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function(){
              // Clear any previous error messages
              $(document).find('span.error-text').text('');
          },
          headers: {
              'X-CSRF-TOKEN': csrfToken // Add CSRF token in headers
          },
          success: function(data){
              if (data.status == 0) {
                  // Loop through the returned errors
                  $.each(data.error, function(prefix, val){
                      // Find the corresponding span for each field and display the error message
                      $('span.' + prefix + '_error').text(val[0]);
                  });
              } else {
                  // Clear the form after successful submission
                  $('#certificate')[0].reset();

                  // Success alert
                  const alertHtml = `
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <i class="bi bi-check-circle me-1"></i>
                          ${data.msg} 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>`;

                  $('#alert-container3').append(alertHtml);

                  // Remove alert after 1 second
                  setTimeout(() => {
                      $('.alert').alert('close');
                      location.reload();
                  }, 1000);
              }
          },
          error: function(xhr) {
              // Handle server errors
              const alertHtml = `
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-circle me-1"></i>
                      Failed to submit request. Please try again. 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`;

              $('#alert-container3').append(alertHtml);

              setTimeout(() => {
                  $('.alert').alert('close');
              }, 3000);
          }
      });
  });
});

//FOR BUSINESS BARANGAY CLEARANCE TABLE
// $(function(){      
//   $("#brgy_clearance").on('submit', function(e){
//       e.preventDefault();

//       $.ajax({
//           url:$(this).attr('action'),
//           method:$(this).attr('method'),
//           data:new FormData(this),
//           processData:false,
//           dataType:'json',
//           contentType:false,
//           beforeSend:function(){
//               $(document).find('span.error-text').text('');
//           },
//           success:function(data){
//               if(data.status == 0){
//                   $.each(data.error, function(prefix, val){
//                       $('span.'+prefix+'_error').text(val[0]);
//                   });
//               }else{
//                   $('#brgy_clearance')[0].reset();
//                   alert(data.msg);
//               }
//           }
//       });
//   });
// });

$(function(){      
  $("#brgy_clearance").on('submit', function(e){
      e.preventDefault();

      $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function(){
              // Clear any previous error messages
              $(document).find('span.error-text').text('');
          },
          success: function(data){
              if (data.status == 0) {
                  // Loop through the returned errors
                  $.each(data.error, function(prefix, val){
                      // Find the corresponding span for each field and display the error message
                      $('span.' + prefix + '_error').text(val[0]);
                  });
              } else {
                  // Clear the form after successful submission
                  $('#brgy_clearance')[0].reset();

                  // Success alert
                  const alertHtml = `
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <i class="bi bi-check-circle me-1"></i>
                          ${data.msg} 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>`;
                  
                  $('#alert-container1').append(alertHtml);

                  // Remove alert after 1 second
                  setTimeout(() => {
                      $('.alert').alert('close');
                      location.reload();
                  }, 1000);
              }
          },
          error: function(xhr) {
              // Handle server errors
              const alertHtml = `
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-circle me-1"></i>
                      Failed to submit request. Please try again. 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`;
              
              $('#alert-container1').append(alertHtml);

              setTimeout(() => {
                  $('.alert').alert('close');
              }, 3000);
          }
      });
  });
});


//FOR MULTIPURPOSE BARANGAY CLEARANCE TABLE
$(function(){      
  $("#brgy_clearanceMult").on('submit', function(e){
      e.preventDefault();

      $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function(){
              // Clear any previous error messages
              $(document).find('span.error-text').text('');
          },
          success: function(data){
              if (data.status == 0) {
                  // Loop through the returned errors
                  $.each(data.error, function(prefix, val){
                      // Find the corresponding span for each field and display the error message
                      $('span.' + prefix + '_error').text(val[0]);
                  });
              } else {
                  // Clear the form after successful submission
                  $('#brgy_clearanceMult')[0].reset();

                  // Success alert
                  const alertHtml = `
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <i class="bi bi-check-circle me-1"></i>
                          ${data.msg} 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>`;
                  
                  $('#alert-container').append(alertHtml);

                  // Remove alert after 1 second
                  setTimeout(() => {
                      $('.alert').alert('close');
                      location.reload();
                  }, 1000);
              }
          },
          error: function(xhr) {
              // Handle server errors
              const alertHtml = `
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-circle me-1"></i>
                      Failed to submit request. Please try again. 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`;
              
              $('#alert-container').append(alertHtml);

              setTimeout(() => {
                  $('.alert').alert('close');
              }, 3000);
          }
      });
  });
});

//FOR COMPLAINT TABLE
// $(function(){      
//   $("#complaint").on('submit', function(e){
//       e.preventDefault();

//       $.ajax({
//           url:$(this).attr('action'),
//           method:$(this).attr('method'),
//           data:new FormData(this),
//           processData:false,
//           dataType:'json',
//           contentType:false,
//           beforeSend:function(){
//               $(document).find('span.error-text').text('');
//           },
//           success:function(data){
//               if(data.status == 0){
//                   $.each(data.error, function(prefix, val){
//                       $('span.'+prefix+'_error').text(val[0]);
//                   });
//               }else{
//                   $('#complaint')[0].reset();
//                   alert(data.msg);
//               }
//           }
//       });
//   });
// });

$(function(){      
  $("#complaint").on('submit', function(e){
      e.preventDefault();

      $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend: function(){
              // Clear any previous error messages
              $(document).find('span.error-text').text('');
          },
          success: function(data){
              if (data.status == 0) {
                  // Loop through the returned errors
                  $.each(data.error, function(prefix, val){
                      // Find the corresponding span for each field and display the error message
                      $('span.' + prefix + '_error').text(val[0]);
                  });
              } else {
                  // Clear the form after successful submission
                  $('#complaint')[0].reset();

                  // Success alert
                  const alertHtml = `
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <i class="bi bi-check-circle me-1"></i>
                          ${data.msg} 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>`;
                  
                  $('#alert-container2').append(alertHtml);

                  // Remove alert after 1 second
                  setTimeout(() => {
                      $('.alert').alert('close');
                      location.reload();
                  }, 1000);
              }
          },
          error: function(xhr) {
              // Handle server errors
              const alertHtml = `
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-circle me-1"></i>
                      Failed to submit request. Please try again. 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`;
              
              $('#alert-container2').append(alertHtml);

              setTimeout(() => {
                  $('.alert').alert('close');
              }, 3000);
          }
      });
  });
});

})();


