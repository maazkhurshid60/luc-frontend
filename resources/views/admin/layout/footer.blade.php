 <!-- /.content-wrapper -->
 <footer class="main-footer pb-4">
     <div class="pull-right d-none d-sm-inline-block">
         Copyright &copy; {{ date('Y') }} Afcon Group. Design & Developed by <a href="http://redstartechs.com">Red
             Star Techs</a>. All Rights
         Reserved.
     </div>
 </footer>



 <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>

 </div>
 <!-- ./wrapper -->
 <script src="{{ asset('assets/backend/assets/vendor_components/jquery/dist/jquery-3.3.1.min.js') }}"></script>
 <script src="{{ asset('assets/backend/assets/vendor_components/popper/dist/popper.min.js') }}"></script>
 <script src="{{ asset('assets/backend/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('assets/backend/assets/vendor_components/jquery-ui/jquery-ui.js') }}"></script>
 <script>
     $.widget.bridge('uibutton', $.ui.button);
 </script>
 <script src="{{ asset('assets/backend/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js') }}">
 </script>
 <script src="{{ asset('assets/backend/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}">
 </script>
 <script src="{{ asset('assets/backend/assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>
 <script src="{{ asset('assets/backend/js/template.js') }}"></script>
 <script src="{{ asset('assets/backend/js/demo.js') }}"></script>

 <script src="{{ asset('assets/backend/assets/vendor_components/dropify-master/dist/js/dropify.js') }}"></script>
 <!-- Sweet-Alert  -->
 <script src="{{ asset('assets/backend/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
 <script src="{{ asset('assets/backend/assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js') }}">
 </script>

 {{-- Data Tables Scripts --}}
 <script src="{{ asset('assets/backend/assets/vendor_plugins/DataTables-1.18.8/datatables.min.js') }}"></script>


 <script
     src="{{ asset('assets/backend/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}">
 </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>
 <script src="{{ asset('assets/backend/assets/vendor_plugins/iCheck/icheck.js') }}"></script>
 <script src="{{ asset('assets/backend/assets/custom_function.js') }}"></script>
 <script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>


 <script type="text/javascript">
     function slugify(string) {
         const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
         const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnooooooooprrsssssttuuuuuuuuuwxyyzzz------'
         const p = new RegExp(a.split('').join('|'), 'g')

         return string.toString().toLowerCase()
             .replace(/\s+/g, '-') // Replace spaces with -
             .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
             .replace(/&/g, '-and-') // Replace & with 'and'
             .replace(/[^\w\-]+/g, '') // Remove all non-word characters
             .replace(/\-\-+/g, '-') // Replace multiple - with single -
             .replace(/^-+/, '') // Trim - from start of text
             .replace(/-+$/, '') // Trim - from end of text
     }
     $(document).on('keyup', '#generate-slug', generateSlug);
     $(document).on('change', '#generate-slug', generateSlug);
     $(document).on('change', '#generate-slug', generateSlug);
     $(document).on('keyup', '.char-counter input', charCounter);
     $(document).on('change', '.char-counter input', charCounter);
     // $(document).on('keyup','.char-counter-univ',charCounterUniv);
     function generateSlug(event) {
         var slug = slugify(event.target.value);
         $(event.target.getAttribute('target')).val(slug);
         $(".char-counter span").html('Char Counter :' + slug.length);


     }

     function charCounter(event) {
         $(".char-counter span").html('Char Counter :' + event.target.value.length);
     }
 </script>

 <script>
     // Function to handle character limit and count for input fields
     function handleCharacterLimit(inputId, countId, maxLength) {
         var input = document.getElementById(inputId);
         var charCountLabel = document.getElementById(countId);

         input.addEventListener('input', function() {
             var currentLength = input.value.length;
             charCountLabel.textContent = currentLength;

             if (currentLength > maxLength) {
                 input.value = input.value.slice(0, maxLength);
                 charCountLabel.textContent = maxLength;
             }
         });
     }

     // Call the function for each input field
     handleCharacterLimit('page_title', 'charCount', 80); // Page Title
     handleCharacterLimit('meta_description', 'descriptionCharCount', 180); // Meta Description
 </script>

 @yield('custom-scripts')
