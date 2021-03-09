<aside class="main-sidebar sidebar-dark-primary elevation-5">
  <a href="<?= base_url('User') ?>" class="brand-link" style=" background:#61B15A;">
    <center><span class="logo-lg"><b><font color="F8F1F1">DINAS KESEHATAN</font></b></span></center>
  </a>
  <div class="sidebar" style="background: #00303F">
    <div class="image">
      <center><img src="<?php echo base_url('assets/dist/img/kwb.png') ?>" width="130" height="160" style="margin-top: 20px; margin-bottom: 10px" class="img-fluid"></center>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link" style="background: #00293F">
            <center><p>MAIN NAVIGATION</p></center>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('User') ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Beranda
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <?php foreach ($menu as $m) : ?>
          <?php if ($judul1 == $m->menu) { ?>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon <?= $m->icon ?>"></i>
                <p>
                  <?= $m->menu; ?>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php  
              $query_submenu = "SELECT mr_sub_menu.id_sub_menu, mr_sub_menu.title, mr_sub_menu.url, mr_sub_menu.is_active FROM mr_sub_menu WHERE mr_sub_menu.id_menu = $m->id_menu AND mr_sub_menu.is_active = 1  AND mr_sub_menu.is_delete = 0";
              $sub_menu = $this->db->query($query_submenu)->result();
              ?>
              <?php foreach ($sub_menu as $sm) : ?>
                <?php if ($judul2 == $sm->title) { ?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url($sm->url) ?>" class="nav-link active">
                        <i class="fas fa-fw fa-caret-right"></i>
                        <p><?= $sm->title; ?></p>
                      </a>
                    </li>
                  </ul>
                <?php }else{ ?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url($sm->url) ?>" class="nav-link" style="background: #00303F">
                        <i class="fas fa-fw fa-caret-right"></i>
                        <p><?= $sm->title; ?></p>
                      </a>
                    </li>
                  </ul>
                <?php } ?>
              <?php endforeach; ?>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon <?= $m->icon ?>"></i>
                <p>
                  <?= $m->menu; ?>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php  
              $query_submenu = "SELECT mr_sub_menu.id_sub_menu, mr_sub_menu.title, mr_sub_menu.url, mr_sub_menu.is_active FROM mr_sub_menu WHERE mr_sub_menu.id_menu = $m->id_menu AND mr_sub_menu.is_active = 1  AND mr_sub_menu.is_delete = 0";
              $sub_menu = $this->db->query($query_submenu)->result();
              ?>
              <?php foreach ($sub_menu as $sm) : ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url($sm->url) ?>" class="nav-link" style="background: #00303F">
                      <i class="fas fa-fw fa-caret-right"></i>
                      <p><?= $sm->title; ?></p>
                    </a>
                  </li>
                </ul>
              <?php endforeach; ?>
            </li>
          <?php } ?>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</aside>