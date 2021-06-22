<footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                                    <h3 class="footer-heading mb-4">Páginas</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="./acerca.php">Acerca</a></li>
                                        <li><a href="./desarrolladores.php">Desarrolladores</a></li>
                                        <li><a href="./terminos.php">Terminos  &amp; condiciones</a></li>
                                        <li><a href="./celular.php">Contacto</a></li>
                                        <li><a href="./soporte.php">Soporte</a></li>
                                        <li>
                                          <a href="https://facebook.com" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i>
                                            &nbsp;&nbsp;|&nbsp;&nbsp;
                                          </a>
                                          <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i>
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h3 class="footer-heading mb-4">Contacto</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <span class="d-block text-white">Dirección</span>
                                     Blvd. Gral. Marcelino García Barragán 1421, Olímpica, 44430 Guadalajara, Jal.
                                </li>
                                <li>
                                    <span class="d-block text-white">Télefono</span>
                                    33 1378 5900
                                </li>
                                <li>
                                    <span class="d-block text-white">Correo</span>
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="472e292128073e28323523282a262e296924282a">jazmin.rreveles@alumnos.udg.mx</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row pt-5 mt-5 text-center">
                        <div class="col-md-12">
                            <p>
                                Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> Todos los derechos reservados <strong>my-proyect</strong>
                            </p>
                            <p>v. 1.0.0</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/aos.js"></script>
        <script>
            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.
            
            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
            
            var placeSearch, autocomplete;
            var componentForm = {
              street_number: 'short_name',
              route: 'long_name',
              locality: 'long_name',
              administrative_area_level_1: 'short_name',
              country: 'long_name',
              postal_code: 'short_name'
            };
            
            function initAutocomplete() {
              // Create the autocomplete object, restricting the search to geographical
              // location types.
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                  {types: ['geocode']});
            
              // When the user selects an address from the dropdown, populate the address
              // fields in the form.
              autocomplete.addListener('place_changed', fillInAddress);
            }
            
            function fillInAddress() {
              // Get the place details from the autocomplete object.
              var place = autocomplete.getPlace();
            
              for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
              }
            
              // Get each component of the address from the place details
              // and fill the corresponding field on the form.
              for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                  var val = place.address_components[i][componentForm[addressType]];
                  document.getElementById(addressType).value = val;
                }
              }
            }
            
            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                  var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                  };
                  var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                  });
                  autocomplete.setBounds(circle.getBounds());
                });
              }
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete" async defer></script>
        <script src="js/main.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', 'UA-23581568-13');
        </script>