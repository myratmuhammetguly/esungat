    <!-- footer -->
</div>
    <div class="footer ">
        <div class="bottom-container ">
            <div class="product-row">
                <div class="footer-col-1 ">
                    <h3>Mobil programmamyz ýakynda hyzmatyňyzda</h3>
                    <p>Android we iOS mobil telefonlar üçin mobil programmamyzy ýakynda siziň hyzmatyňyzda bolar.</p>
                    <div class="app-logo ">
                        <img src="images/google_market.png ">
                        <img src="images/ios_app_store.png ">
                    </div>
                </div>
                <div class="footer-col-2 ">
                    <img src="images/e-sowda-logo.png">
                    <p>Mary welaýat, Mary şäher, Mollanepes köçe, 49 jaý</p>
                    <p>Mobil: +9961 877465,  +99361 877230,  +99361 877916</p>
                    <p>Tel: 7-11-34, 1-08-13  Faks: 7-15-55</p>
                    <p>e-mail: <a href="mailto:info@esungat.com.tm">info@esungat.com.tm</a></p>
                </div>
                <div class="footer-col-3 ">
                    <ul>
                    <h3>Peýdaly Linkler</h3>
                        <li><a href="about.php">Biz barada</a></li>
                        <li><a href="eltipbermek.php">Eltip bermek</a></li>
                        <li><a href="contacts.php">Aragatnaşyk</a></li>
                        <li><a href="duzgunler.php">Düzgünler we şertler</a></li>
                    </ul>
                </div>
                <div class="footer-col-4 ">
                    <ul>
                    <h3>Biziň saýtlarymyz</h3>
                        <li><i class="fab fa-instagram fa-lg"></i><a href="">Instagram</a></li>
                        <li><i class="fab fa-facebook-square fa-lg"></i><a href="">Facebook</a></li>
                        <li><i class="fab fa-odnoklassniki-square fa-lg"></i><a href="">Odnoklassniki</a></li>
                        <li><i class="fab fa-vk fa-lg "></i><a href="">Vkontakte</a></li>
                    </ul>
                </div>
               
            </div>
            <br>
                <div class="copyright">&copy eSöwda onlaýn dükany. Ähli haklary goralan</div>
        </div>
    </div>
    <!-----/footer   ----->
    <!----JS for sticky menu------->
    <script>
        window.onscroll = function() {
            myFunction()
        };
        var topContainer = document.getElementById("topContainer");
        var sticky = topContainer.offsetTop;
        function myFunction() {
            if (window.pageYOffset >= sticky) {
                topContainer.classList.add("sticky")
            } else {
                topContainer.classList.remove("sticky");
            }
        }
    </script>
    <!-- js for menu -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px ";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 6,
            loop: true,
            margin: 8,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                300: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });
        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })
    </script>
    <!-- js for single product gallery-->
    <script> /*
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function() {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function() {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function() {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function() {
            ProductImg.src = SmallImg[3].src; */
        }
    </script>


</body>

</html>