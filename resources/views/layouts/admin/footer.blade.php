<div class="extra">
    <div class="extra-inner">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <h4>
                        Peta Sekolah</h4>
                    <ul>
                        <div id="map" style="width: 200px; height: 200px;"></div>

                        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>

                        <script>
                            function initMap() {
                                // Inisialisasi peta dengan koordinat dan opsi yang sesuai
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {
                                        lat: -7.255625605978664,
                                        lng: 112.66487353761738
                                    },
                                    zoom: 12
                                });

                                // Tambahkan marker ke peta
                                var marker = new google.maps.Marker({
                                    position: {
                                        lat: -7.255625605978664,
                                        lng: 112.66487353761738
                                    },
                                    map: map,
                                    title: 'Lokasi'
                                });
                            }
                        </script>
                    </ul>
                </div>
                <!-- /span3 -->
                <div class="span3">
                    <h4>
                        Service </h4>
                    <ul>
                        <li><a href="javascript:;">Pendaftaran Peserta Didik Baru</a></li>
                        <li><a href="javascript:;">Pembayaran SPP</a></li>
                        <li><a href="javascript:;">Admin</a></li>
                    </ul>
                </div>
                <!-- /span3 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /extra-inner -->
</div>
<!-- /extra -->
<div class="footer">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="span12"> &copy; 2013 <a href="#">SMP Darul Ulum Surabaya</a>. </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /footer-inner -->
</div>
<!-- /footer -->