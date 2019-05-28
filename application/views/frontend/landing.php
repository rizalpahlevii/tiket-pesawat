
    <!-- slider -->
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="<?= base_url('assets/landing/') ?>4.jpg">
          <div class="caption left-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="<?= base_url('assets/landing/') ?>2.jpg">
          <div class="caption right-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="<?= base_url('assets/landing/') ?>1.jpg">
          <div class="caption center-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
      </ul>
    </div>

    <!-- About Us -->
    <section id="about" class="about scrollspy">
      <div class="container">
        <div class="row">
          <h3 class="center light grey-text text-darken-3">About Us</h3>
          <div class="col m6 light">
            <h5>We Are Professionals</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quo accusantium repellat similique ipsa doloribus in aliquam earum eaque, possimus necessitatibus sunt repellendus ullam recusandae voluptas dolore debitis saepe facere.</p>
          </div>
          <div class="col m6 light">
            <p>WEB DEVELOPMENT</p>
            <div class="progress">
                <div class="determinate blue" style="width: 95%"></div>
            </div>
            <p>MOBILE APP DEVELOPMENT</p>
            <div class="progress">
                <div class="determinate blue" style="width: 85%"></div>
            </div>
            <p>GAME DEVELOPMENT</p>
            <div class="progress">
                <div class="determinate blue" style="width: 90%"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="services grey lighten-3 scrollspy">
      <div class="container">
        <div class="row">
          <h3 class="light center grey-text text-darken-3">Cari Penerbangan</h3>
          <form class="col s12">
            <div class="row">
              <div class="input-field col s5 offset-s1">
                <i class="material-icons prefix">airplanemode_active</i>
                <input id="icon_prefix" type="text" class="validate asalPenerbangan">
                <label for="icon_prefix">Asal Penerbangan</label>
                <div class="eras"></div>
              </div>
              <div class="input-field col s5">
                <i class="material-icons prefix">airplanemode_active</i>
                <input id="icon_telephone" type="tel" class="validate tujuanPenerbangan">
                <label for="icon_telephone">Tujuan Penerbangan</label>
                <div class="ertuj"></div>
              </div>
              <div class="input-field col s1">
                <button class="btn waves-effect waves-light tmbCariPnb" type="button" name="action" id="tmbCariPnb">Cari
                  <i class="material-icons right">search</i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="row">
             <table class="responsive-table" id="tblTampilPnb">
              <thead>
                <tr>
                    <th>#</th>
                    <th>ID Penerbangan</th>
                   <th>Nama Pesawat</th>
                    <th>Nama Bandara</th>
                      <th>Tgl Penerbangan</th>
                     <th>Asal Penerbangan</th>
                    <th>Tujuan Penrbangan</th>
                    <th>Jam Berangkat</th>
                   <th>Jam tiba</th>
                   <th>Tarif Bisnis</th>
                   <th>Tarif Ekonomi</th>
                   <th>Booking</th>
                </tr>
              </thead>
              <tbody id="tbodybooking">
                
              </tbody>
            </table>
                  
        </div>
      </div>
    </section>
    

    <!-- Clients -->
    <div id="clients" class="parallax-container scrollspy">
      <div class="parallax"><img src="<?= base_url('assets/landing/') ?>1.jpg"></div>

      <div class="container clients">
        <h3 class="center light white-text">Our Clients</h3>
        <div class="row">
          <div class="col m4 s12 center">
            <img src="<?= base_url('assets/fe/') ?>img/clients/gojek.png">
          </div>
          <div class="col m4 s12 center">
            <img src="<?= base_url('assets/fe/') ?>img/clients/tokopedia.png">
          </div>
          <div class="col m4 s12 center">
            <img src="<?= base_url('assets/fe/') ?>img/clients/traveloka.png">
          </div>
        </div>
      </div>
    </div>


    <!-- services -->
    <section id="services" class="services grey lighten-3 scrollspy">
      <div class="container">
        <div class="row">
          <h3 class="light center grey-text text-darken-3">Our Services</h3>
          <div class="col m4 s12">
            <div class="card-panel center">
              <i class="material-icons medium">info</i>
              <h5>Informasi</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, quibusdam.</p>
            </div>
          </div>
          <div class="col m4 s12">
            <div class="card-panel center">
              <i class="material-icons medium">local_airport</i>
              <h5>Penerbangan</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, quibusdam.</p>
            </div>
          </div>
          <div class="col m4 s12">
            <div class="card-panel center">
              <i class="material-icons medium">check_circle</i>
              <h5>Booking</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, quibusdam.</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- portfolio -->
    <section id="portfolio" class="portfolio scrollspy">
      <div class="container">
        <h3 class="light center grey-text text-darken-3">Portfolio</h3>
        <div class="row">
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/1.png" class="responsive-img materialboxed">
          </div>
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/2.png" class="responsive-img materialboxed">
          </div>
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/3.png" class="responsive-img materialboxed">
          </div>
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/4.png" class="responsive-img materialboxed">
          </div>
        </div>
        <div class="row">
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/5.png" class="responsive-img materialboxed">
          </div>
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/6.png" class="responsive-img materialboxed">
          </div>
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/1.png" class="responsive-img materialboxed">
          </div>
          <div class="col m3 s12">
            <img src="<?= base_url('assets/fe/') ?>img/portfolio/2.png" class="responsive-img materialboxed">
          </div>
        </div>
      </div>
    </section>

