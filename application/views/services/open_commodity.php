
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h2>OPEN COMMODITY ACCOUNT</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Main Banner Area End ***** -->
  <section>
    <div class="container">
      <div class="about1">
        <h2>Commodity trading account</h2>
        <p>
          To trade in commodities, you need to open a commodity trading account with a broker.
          This type of trading is essentially in futures and options of products like agriculture (wheat, cotton, etc.), minerals 
          (petroleum), and precious metals (gold, silver, etc.).
          <br/>
          <strong>Commodity futures and options</strong>
          Before you open a commodity account, you need to know a little bit about derivatives. There are two main types of products – futures and options. 
          Futures contracts give you the right to purchase or sell a certain amount of a particular commodity at a predetermined date in the future. 
          Options give you the right, but not the obligation, to buy or sell a specific commodity at a predetermined price in the future.
          <br/>
          Futures and options are traded on commodity exchanges like Multi-Commodity Exchange (MCX) and National Commodity and Derivatives Exchange (NCDEX). 
          Only members (brokers) are allowed to trade on these exchange, so you need to open commodity trading account with a broker like Angel One.
        </p>
    </div>
    </div>
  </section>


  <section class="what-we-do">
    <div class="container">
      <div class="row">
        <div class="right-items">
          <div class="row item">
            <div class="col-sm-2">
              <img src="assets/images/client-01.png" class="img-responsive" alt="img" />
               <h4>Why Angel One?</h4>
            </div>
            <div class="col-sm-10">
              <ul>
                <li>Here’s why you might want to open commodity trading account with Angel One.
                  <ul>
                      <li>Angel One products and services have bagged multiple awards and are internationally recognised.</li>
                      <li>We offer up to 40 times leverage – the industry’s highest.</li>
                      <li>We boast of over a million satisfied clients.</li>
                      <li>We have a robust support system, with our dedicated relationship managers and dealers providing services through 12,000 trading terminals.</li>
                      <li>Angel One has an extensive network of 11,000 sub-brokers across the country, so wherever you are, there’s one within easy reach.</li>
                      <li>We have a considerable presence in over 900 cities.</li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
        </div>
       
      </div>
    </div>
  </section>

 

 

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        var interleaveOffset = 0.5;

      var swiperOptions = {
        loop: true,
        speed: 1000,
        grabCursor: true,
        watchSlidesProgress: true,
        mousewheelControl: true,
        keyboardControl: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        on: {
          progress: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              var slideProgress = swiper.slides[i].progress;
              var innerOffset = swiper.width * interleaveOffset;
              var innerTranslate = slideProgress * innerOffset;
              swiper.slides[i].querySelector(".slide-inner").style.transform =
                "translate3d(" + innerTranslate + "px, 0, 0)";
            }      
          },
          touchStart: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = "";
            }
          },
          setTransition: function(speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = speed + "ms";
              swiper.slides[i].querySelector(".slide-inner").style.transition =
                speed + "ms";
            }
          }
        }
      };

      var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>

 