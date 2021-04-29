class Myscript {
    constructor() {
     this.init();
    }
   
    init() {
      console.info( 'App Initialized' );

      // Sidebar Toggle
      $('#btn-tog').click( function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
        $('#btn-tog').toggleClass('active');
      });

      // DASHBOARD CLOCK
      jQuery(function($){
        if (!$('#clock').length) return;
          // Analog Clock
        var d, h, m, s, hdeg, ampm;
        function adjustClock(){
          d = new Date();
          h = d.getHours() > 12 ? d.getHours() - 12 : d.getHours()
          m = d.getMinutes();
          s = d.getSeconds();
          
          hdeg = h*30 + m/2;
          if(h > 12){ampm = "AM";} else { ampm = "PM";}
          hh.style.transform = "rotate("+hdeg+"deg)";
          mh.style.transform = "rotate("+m*6+"deg)";
          sh.style.transform = "rotate("+s*6+"deg)";
          meridiem.innerHTML = h+":"+m+":"+s+" "+ampm;

        }

        window.addEventListener("load", function(){
          this.setInterval(adjustClock, 1000);
        });
      });// DASHBOARD CLOCK


      // READY FUNCTION
      $(document).ready(function(){
        
          // SHOW/HIDE MENU IF ACTIVE SIDEBAR LIST ITEMS
          if($(".user-profile-settings").hasClass('active')) {
            $(".user-profile-settings").show();
          }
          else {
            $(".user-profile-settings").hide(); 
          }

          if($(".inventory-menu-settings").hasClass('active')) {
            $(".inventory-menu-settings").show();
          }
          else {
            $(".inventory-menu-settings").hide(); 
          }

          if($(".employee-menu-settings").hasClass('active')) {
            $(".employee-menu-settings").show();
          }
          else {
            $(".employee-menu-settings").hide(); 
          }
          
          if($(".software-menu-settings").hasClass('active')) {
            $(".software-menu-settings").show();
          }
          else {
            $(".software-menu-settings").hide(); 
          }

          // ARROW TOGGLE SIDEBAR MENU

          $("#btn-profile").click(function(){
              $(".user-profile-settings").slideToggle();
              $(".user-profile-settings").toggleClass('active');
              $('#myprofile').toggleClass('arrow-rotated');
          });
      
          $(".toggle-btn-menu").click(function(){
              $(".inventory-menu-settings").slideToggle();
              $(".inventory-menu-settings").toggleClass('active');
              $('#inv-tog-icon').toggleClass('arrow-rotated');
          });

          $(".toggle-btn-menu-emp").click(function(){
              $(".employee-menu-settings").slideToggle();
              $(".employee-menu-settings").toggleClass('active');
              $('#emp-tog-icon').toggleClass('arrow-rotated');
          });

          $(".toggle-btn-menu-soft").click(function(){
            $(".software-menu-settings").slideToggle();
            $(".software-menu-settings").toggleClass('active');
            $('#soft-tog-icon').toggleClass('arrow-rotated');
        });
          


          // DYNAMIC ON CHANGE CATEGORY STOCK
            $(document).ready(function() {
                $('select[name="devcat"]').on('change', function() {
                    var devcatID = $(this).val();
                    if(devcatID) {
                        $.ajax({
                            url: '/stock/ajax/'+devcatID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {

                                
                                $('select[name="device_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="device_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });


                            }
                        });
                    }else{
                        $('select[name="device_id"]').empty();
                    }
                });
            });


             // DYNAMIC ON CHANGE CATEGORY Device
             $(document).ready(function() {
                $('select[name="pcats"]').on('change', function() {
                    var pcatID = $(this).val();
                    if(pcatID) {
                        $.ajax({
                            url: '/device/ajax/'+pcatID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {

                                
                                $('select[name="category_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="category_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });


                            }
                        });
                    }else{
                        $('select[name="category_id"]').empty();
                    }
                });
            });
          // $('#deviceCat').on('change',function(){
          //     // console.log("123");
          //     var cat_id = $(this).val();
          //     // console.log(cat_id);
          //     $.ajax({
          //       type: 'get',
          //       url:'stock',
          //       data:{'id':cat_id},
          //       success:function(data){
          //           console.log('success');
          //       },
          //       error:function(data){

          //       }
          //     });
          // });

         


      }); // READY FUNCTION

                // SELECT OPTION

                /*
          Reference: http://jsfiddle.net/BB3JK/47/
          */

          // $('select').each(function(){
          //       var $this = $(this), numberOfOptions = $(this).children('option').length;

          //       $this.addClass('select-hidden'); 
          //       $this.wrap('<div class="select"></div>');
          //       $this.after('<div class="select-styled"></div>');

          //       var $styledSelect = $this.next('div.select-styled');
          //       $styledSelect.text($this.children('option').eq(0).text());

          //       var $list = $('<ul />', {
          //           'class': 'select-options'
          //       }).insertAfter($styledSelect);

          //       for (var i = 0; i < numberOfOptions; i++) {
          //           $('<li />', {
          //               text: $this.children('option').eq(i).text(),
          //               rel: $this.children('option').eq(i).val()
          //           }).appendTo($list);
          //       }

          //       var $listItems = $list.children('li');

          //       $styledSelect.click(function(e) {
          //           e.stopPropagation();
          //           $('div.select-styled.active').not(this).each(function(){
          //               $(this).removeClass('active').next('ul.select-options').hide();
          //           });
          //           $(this).toggleClass('active').next('ul.select-options').toggle();
          //       });

          //       $listItems.click(function(e) {
          //           e.stopPropagation();
          //           $styledSelect.text($(this).text()).removeClass('active');
          //           $this.val($(this).attr('rel'));
          //           $list.hide();
          //           //console.log($this.val());
          //       });

          //       $(document).click(function() {
          //           $styledSelect.removeClass('active');
          //           $list.hide();
          //       });

          //     });
          
          // document.getElementById('pagination').onchange = function() {
          //   window.location = "{{URL::route('stock')}}?items=" + this.value;
          // };



          // PRINTTHIS

        //   $(document).ready(function() {
        //     $('#print').on('click', function(e) {
            
        //       $('.printThis').printThis({
        //         importStyle: $(this).hasClass('importStyle')
        //       });
        //     });
        //   });
          
          
          /*
           * printThis v1.12.2
           * @desc Printing plug-in for jQuery
           * @author Jason Day
           *
           * Resources (based on) :
           *              jPrintArea: http://plugins.jquery.com/project/jPrintArea
           *              jqPrint: https://github.com/permanenttourist/jquery.jqprint
           *              Ben Nadal: http://www.bennadel.com/blog/1591-Ask-Ben-Print-Part-Of-A-Web-Page-With-jQuery.htm
           *
           * Licensed under the MIT licence:
           *              http://www.opensource.org/licenses/mit-license.php
           *
           * (c) Jason Day 2015
           *
           * Usage:
           *
           *  $("#mySelector").printThis({
           *      debug: false,               // show the iframe for debugging
           *      importCSS: true,            // import page CSS
           *      importStyle: true,         // import style tags
           *      printContainer: true,       // grab outer container as well as the contents of the selector
           *      loadCSS: "path/to/my.css",  // path to additional css file - us an array [] for multiple
           *      pageTitle: "",              // add title to print page
           *      removeInline: false,        // remove all inline styles from print elements
           *      printDelay: 333,            // variable print delay
           *      header: null,               // prefix to html
           *      footer: null,               // postfix to html
           *      base: false,                // preserve the BASE tag, or accept a string for the URL
           *      formValues: true,           // preserve input/form values
           *      canvas: false,              // copy canvas elements (experimental)
           *      doctypeString: '...',       // enter a different doctype for older markup
           *      removeScripts: false,       // remove script tags from print content
           *      copyTagClasses: false       // copy classes from the html & body tag
           *  });
           *
           * Notes:
           *  - the loadCSS will load additional css (with or without @media print) into the iframe, adjusting layout
           */
          ;
          (function($) {
          
              function appendContent($el, content) {
                  if (!content) return;
          
                  // Simple test for a jQuery element
                  $el.append(content.jquery ? content.clone() : content);
              }
          
              function appendBody($body, $element, opt) {
                  // Clone for safety and convenience
                  // Calls clone(withDataAndEvents = true) to copy form values.
                  var $content = $element.clone(opt.formValues);
          
                  if (opt.formValues) {
                      // Copy original select and textarea values to their cloned counterpart
                      // Makes up for inability to clone select and textarea values with clone(true)
                      copyValues($element, $content, 'select, textarea');
                  }
          
                  if (opt.removeScripts) {
                      $content.find('script').remove();
                  }
          
                  if (opt.printContainer) {
                      // grab $.selector as container
                      $content.appendTo($body);
                  } else {
                      // otherwise just print interior elements of container
                      $content.each(function() {
                          $(this).children().appendTo($body)
                      });
                  }
              }
          
              // Copies values from origin to clone for passed in elementSelector
              function copyValues(origin, clone, elementSelector) {
                  var $originalElements = origin.find(elementSelector);
          
                  clone.find(elementSelector).each(function(index, item) {
                      $(item).val($originalElements.eq(index).val());
                  });
              }
          
              var opt;
              $.fn.printThis = function(options) {
                  opt = $.extend({}, $.fn.printThis.defaults, options);
                  var $element = this instanceof jQuery ? this : $(this);
          
                  var strFrameName = "printThis-" + (new Date()).getTime();
          
                  if (window.location.hostname !== document.domain && navigator.userAgent.match(/msie/i)) {
                      // Ugly IE hacks due to IE not inheriting document.domain from parent
                      // checks if document.domain is set by comparing the host name against document.domain
                      var iframeSrc = "javascript:document.write(\"<head><script>document.domain=\\\"" + document.domain + "\\\";</s" + "cript></head><body></body>\")";
                      var printI = document.createElement('iframe');
                      printI.name = "printIframe";
                      printI.id = strFrameName;
                      printI.className = "MSIE";
                      document.body.appendChild(printI);
                      printI.src = iframeSrc;
          
                  } else {
                      // other browsers inherit document.domain, and IE works if document.domain is not explicitly set
                      var $frame = $("<iframe id='" + strFrameName + "' name='printIframe' />");
                      $frame.appendTo("body");
                  }
          
                  var $iframe = $("#" + strFrameName);
          
                  // show frame if in debug mode
                  if (!opt.debug) $iframe.css({
                      position: "absolute",
                      width: "0px",
                      height: "0px",
                      left: "-600px",
                      top: "-600px"
                  });
          
                  // $iframe.ready() and $iframe.load were inconsistent between browsers
                  setTimeout(function() {
          
                      // Add doctype to fix the style difference between printing and render
                      function setDocType($iframe, doctype){
                          var win, doc;
                          win = $iframe.get(0);
                          win = win.contentWindow || win.contentDocument || win;
                          doc = win.document || win.contentDocument || win;
                          doc.open();
                          doc.write(doctype);
                          doc.close();
                      }
          
                      if (opt.doctypeString){
                          setDocType($iframe, opt.doctypeString);
                      }
          
                      var $doc = $iframe.contents(),
                          $head = $doc.find("head"),
                          $body = $doc.find("body"),
                          $base = $('base'),
                          baseURL;
          
                      // add base tag to ensure elements use the parent domain
                      if (opt.base === true && $base.length > 0) {
                          // take the base tag from the original page
                          baseURL = $base.attr('href');
                      } else if (typeof opt.base === 'string') {
                          // An exact base string is provided
                          baseURL = opt.base;
                      } else {
                          // Use the page URL as the base
                          baseURL = document.location.protocol + '//' + document.location.host;
                      }
          
                      $head.append('<base href="' + baseURL + '">');
          
                      // import page stylesheets
                      if (opt.importCSS) $("link[rel=stylesheet]").each(function() {
                          var href = $(this).attr("href");
                          if (href) {
                              var media = $(this).attr("media") || "all";
                              $head.append("<link type='text/css' rel='stylesheet' href='" + href + "' media='" + media + "'>");
                          }
                      });
          
                      // import style tags
                      if (opt.importStyle) $("style").each(function() {
                          $head.append(this.outerHTML);
                      });
          
                      // add title of the page
                      if (opt.pageTitle) $head.append("<title>" + opt.pageTitle + "</title>");
          
                      // import additional stylesheet(s)
                      if (opt.loadCSS) {
                          if ($.isArray(opt.loadCSS)) {
                              jQuery.each(opt.loadCSS, function(index, value) {
                                  $head.append("<link type='text/css' rel='stylesheet' href='" + this + "'>");
                              });
                          } else {
                              $head.append("<link type='text/css' rel='stylesheet' href='" + opt.loadCSS + "'>");
                          }
                      }
          
                      // copy 'root' tag classes
                      var tag = opt.copyTagClasses;
                      if (tag) {
                          tag = tag === true ? 'bh' : tag;
                          if (tag.indexOf('b') !== -1) {
                              $body.addClass($('body')[0].className);
                          }
                          if (tag.indexOf('h') !== -1) {
                              $doc.find('html').addClass($('html')[0].className);
                          }
                      }
          
                      // print header
                      appendContent($body, opt.header);
          
                      if (opt.canvas) {
                          // add canvas data-ids for easy access after cloning.
                          var canvasId = 0;
                          // .addBack('canvas') adds the top-level element if it is a canvas.
                          $element.find('canvas').addBack('canvas').each(function(){
                              $(this).attr('data-printthis', canvasId++);
                          });
                      }
          
                      appendBody($body, $element, opt);
          
                      if (opt.canvas) {
                          // Re-draw new canvases by referencing the originals
                          $body.find('canvas').each(function(){
                              var cid = $(this).data('printthis'),
                                  $src = $('[data-printthis="' + cid + '"]');
          
                              this.getContext('2d').drawImage($src[0], 0, 0);
          
                              // Remove the markup from the original
                              $src.removeData('printthis');
                          });
                      }
          
                      // remove inline styles
                      if (opt.removeInline) {
                          // $.removeAttr available jQuery 1.7+
                          if ($.isFunction($.removeAttr)) {
                              $doc.find("body *").removeAttr("style");
                          } else {
                              $doc.find("body *").attr("style", "");
                          }
                      }
          
                      // print "footer"
                      appendContent($body, opt.footer);
          
                      setTimeout(function() {
                          if ($iframe.hasClass("MSIE")) {
                              // check if the iframe was created with the ugly hack
                              // and perform another ugly hack out of neccessity
                              window.frames["printIframe"].focus();
                              $head.append("<script>  window.print(); </s" + "cript>");
                          } else {
                              // proper method
                              if (document.queryCommandSupported("print")) {
                                  $iframe[0].contentWindow.document.execCommand("print", false, null);
                              } else {
                                  $iframe[0].contentWindow.focus();
                                  $iframe[0].contentWindow.print();
                              }
                          }
          
                          // remove iframe after print
                          if (!opt.debug) {
                              setTimeout(function() {
                                  $iframe.remove();
                              }, 1000);
                          }
          
                      }, opt.printDelay);
          
                  }, 333);
          
              };
          
              // defaults
              $.fn.printThis.defaults = {
                  debug: false,           // show the iframe for debugging
                  importCSS: true,        // import parent page css
                  importStyle: true,     // import style tags
                  printContainer: true,   // print outer container/$.selector
                  loadCSS: "",            // load an additional css file - load multiple stylesheets with an array []
                  pageTitle: "",          // add title to print page
                  removeInline: false,    // remove all inline styles
                  printDelay: 333,        // variable print delay
                  header: null,           // prefix to html
                  footer: null,           // postfix to html
                  formValues: true,       // preserve input/form values
                  canvas: false,          // copy canvas content (experimental)
                  base: false,            // preserve the BASE tag, or accept a string for the URL
                  doctypeString: '<!DOCTYPE html>', // html doctype
                  removeScripts: false,   // remove script tags before appending
                  copyTagClasses: false   // copy classes from the html & body tag
              };
          })(jQuery);

          // Print With Check
          $(function () { 
            $("#print").click(function () {
                  $('input[type="checkbox"]').each(function() {
                      if($(this).is (':checked')) {
                        $(this).attr('checked', 'true') 
                      }
                  });
                  $(".printThis").printThis({'importStyle': true, formValues: true});
              });

              // Print Only Check
          $(".checkbox").change(function() {
            var $self       = $(this),
                checkboxVal = $self.val(),
                selector    = checkboxVal === "all" ? ".item" : ".item." + checkboxVal;
          
            // Show or hide divs based on selector, for example:
            // $(".item").show() will show all items while
            // $(".item.industry").show() will only show the industry div
            if ($self.is(":checked")) {
              $(selector).show();
            } else {
              $(selector).hide();
            }
          
            // This part is optional but it feels awkward without.
            // If the changed checkbox is the "all" checkbox, we want all checkboxes
            // to be checked. Vice versa if we click a single checkbox we want
            // the "all" checkbox to react accordingly
            if (checkboxVal === "all") {
              $(".checkbox.single").prop("checked", $self.is(":checked"));
            } else {
              if ($(".checkbox.single:checked").length === $(".checkbox.single").length) {
                $(".checkbox.all").prop("checked", true);
              } else {
                $(".checkbox.all").prop("checked", false);
              }
            }
          });
          });


          // ONCLICK GET VALUE

          $(function(){
            $(".asdbutton").click(function() {
                var fired_button = $(this).val();
                alert(fired_button);
            });
        });
          

        //   Checked if Class Exist
        

        // DROPZONE - Drag and Drop Upload
    //     var dropzone = new Dropzone('#demo-upload', {
    //     previewTemplate: document.querySelector('#preview-template').innerHTML,
    //     parallelUploads: 2,
    //     thumbnailHeight: 120,
    //     thumbnailWidth: 120,
    //     maxFilesize: 3,
    //     filesizeBase: 1000,
    //     thumbnail: function(file, dataUrl) {
    //         if (file.previewElement) {
    //         file.previewElement.classList.remove("dz-file-preview");
    //         var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
    //         for (var i = 0; i < images.length; i++) {
    //             var thumbnailElement = images[i];
    //             thumbnailElement.alt = file.name;
    //             thumbnailElement.src = dataUrl;
    //         }
    //         setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
    //         }
    //     }

    //     });


    //     // Now fake the file upload, since GitHub does not handle file uploads
    //     // and returns a 404

    //     var minSteps = 6,
    //         maxSteps = 60,
    //         timeBetweenSteps = 100,
    //         bytesPerStep = 100000;

    //     dropzone.uploadFiles = function(files) {
    //     var self = this;

    //     for (var i = 0; i < files.length; i++) {

    //         var file = files[i];
    //         totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

    //         for (var step = 0; step < totalSteps; step++) {
    //         var duration = timeBetweenSteps * (step + 1);
    //         setTimeout(function(file, totalSteps, step) {
    //             return function() {
    //             file.upload = {
    //                 progress: 100 * (step + 1) / totalSteps,
    //                 total: file.size,
    //                 bytesSent: (step + 1) * file.size / totalSteps
    //             };

    //             self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
    //             if (file.upload.progress == 100) {
    //                 file.status = Dropzone.SUCCESS;
    //                 self.emit("success", file, 'success', null);
    //                 self.emit("complete", file);
    //                 self.processQueue();
    //                 //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
    //             }
    //             };
    //         }(file, totalSteps, step), duration);
    //         }
    //     }
    // }



    // DYNAMIC ON CHANGE STOCK / Disable for now bcuz using dataTables
    // $('body').on('keyup', '#livesearch', function() {
    //     var searchQue = this.value
    //     // console.log(searchQue);
    //     $.ajax({
    //         type: "POST",
    //         url: '/stock/index',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: {
    //             _token: $('meta[name="csrf-token"]').attr('content'),
    //             searchQue: searchQue
    //         },
    //         success: function (res) {
    //            console.log(res);
    //             var tableRow = '';

    //             // empty table raw
    //             $('#slsearch').empty();

    //             $.each(JSON.parse(res), function(index, value) {

    //                 tableRow = `
    //                 <tr>
    //                 <td>${value.device}</td>
    //                 <td>${value.brand}</td>
    //                 <td>${value.category}</td>
    //                 <td>${value.description}</td>
    //                 <td>${value.serial}</td>
    //                 <td>${value.item_code}</td>
    //                 <td>${value.user}</td>
    //                 <td><a href="/stock/${value.stockId}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
    //                 `;
    //                 $('#slsearch').append(tableRow);
    //             });

                
    //         },
    //         // error: function (res, textStatus, errorThrown) {
    //         //     console.log(res);
        
    //         // },
    //     });
    // });

    // Confirm Delete
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });

    //

    $('#toggle-tblempv').click( function() {
        $('#grid-view').toggleClass('fa-th-list');
        $('#table_id_wrapper').toggleClass('dt-grid-view');
      });


       $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        // $(document).ready(function()
        // {
        //     $(document).on('click', '.pagination a',function(event)
        //     {
        //         event.preventDefault();

        //         $('li').removeClass('active');
        //         $(this).parent('li').addClass('active');

        //         var myurl = $(this).attr('href');
        //         var page=$(this).attr('href').split('page=')[1];

        //         getData(page);
        //     });

        // });

        // function getData(page){
        //     $.ajax(
        //     {
        //         url: '?page=' + page,
        //         type: "get",
        //         datatype: "html"
        //     }).done(function(data){
        //         $("#tag_container").empty().html(data);
        //         location.hash = page;
        //     }).fail(function(jqXHR, ajaxOptions, thrownError){
        //           alert('No response from server');
        //     });
        // }


        // NEUMORPHIC

        

    //END  
    }
   }
   
   export default Myscript;

