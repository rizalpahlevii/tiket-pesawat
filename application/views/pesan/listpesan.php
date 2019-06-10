<div class="col-sm-12">
                        <ul class="list-unstyled list-unstyled-border">
                          <?php foreach($pesan as $p): ?>
                          <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="50" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png">
                            <div class="media-body">
                                  <div class="mt-0 mb-1 font-weight-bold"><a href="#" id="buka-pesan" data-id="<?php echo $p['id'] ?>" class="font-weight-bold" style="text-decoration: none; <?= ($p['is_read']!= "1") ?'color: #34395E;':'color: #868E96;';  ?>"><?php echo $p['nama'] ?></a></div>
                                  <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>    
                              
                            </div>
                          </li>
                          <?php endforeach; ?>
                      
                        </ul>


                      </div>