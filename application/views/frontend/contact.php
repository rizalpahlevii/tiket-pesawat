
    <!-- contact us -->
    <section id="contact" class="contact grey lighten-3 scrollspy">
      <div class="container">
        <h3 class="light grey-text text-darken-3 center">Contact Us</h3>
        <div class="row">
          <div class="col m5 s12">
            <div class="card-panel blue darken-2 center white-text">
              <i class="material-icons">email</i>
              <h5>Contact</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, perspiciatis.</p>
            </div>
            <ul class="collection with-header">
              <li class="collection-header"><h4>Our Office</h4></li>
              <li class="collection-item">Indonesia Raya</li>
              <li class="collection-item">Jl. Soekarno Hatta</li>
              <li class="collection-item">West Java, Indonesia</li>
            </ul>
          </div>

          <div class="col m7 s12">
            <form method="post" action="<?php echo site_url('gigantic/sendmessage '); ?>">
              <div class="card-panel">
                <h5>Please fill out this form</h5>
                <div class="input-field">
                  <?php if(!$this->session->userdata('giganticClientLogin')) : ?>
                    <input type="text" name="name" id="name" required  required="">
                    <label for="name">Name</label>
                  <?php else: ?>
                    <input type="text" name="name" id="name" required  value="<?php echo $this->session->userdata('namaClient') ?>" readonly style="cursor: no-drop;">
                   <label for="name">Name</label>
                  <?php endif; ?>
                </div>
                <div class="input-field">
                  <?php if(!$this->session->userdata('giganticClientLogin')) :  ?>
                    <input type="email" name="email" id="email"  required="">
                    <label for="email">Email</label>
                  <?php else: ?>
                    <input type="email" name="email" id="email"  value="<?php echo $this->session->userdata('emailClient') ?>" readonly style="cursor: no-drop;">
                    <label for="email">Email</label>
                  <?php endif; ?>
                </div>
                <div class="input-field">
                  <input type="text" name="phone" id="phone">
                  <label for="phone">Phone Number</label>
                </div>
                <div class="input-field">
                  <textarea name="message" id="message" class="materialize-textarea"></textarea>
                  <label for="message">Message</label>
                </div>
                <button type="submit" class="btn blue darken-2">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
