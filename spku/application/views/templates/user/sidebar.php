   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
           <div class="sidebar-brand-icon rotate-n-15">

           </div>
           <div class="sidebar-brand-text mx-3">Sistem Penunjang Keputusan </div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider ">

       <!-- Query  Menu -->

       <?php
        $id_role = $this->session->userdata('id_role');

        $queryMenu = "SELECT `id`,`menu`
                     FROM   `user_menu`  JOIN `user_access_menu`
                     ON    `user_menu`.`id` = `user_access_menu`.`menu_id`
                     WHERE `user_access_menu`.`id_role` = $id_role
                    ORDER BY `user_access_menu`.`menu_id` ASC ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>

       <!-- Looping Menu -->

       <?php foreach ($menu as $m) : ?>
           <div class="sidebar-heading">
               <?= $m['menu']; ?>
           </div>

           <?php
            $menu_Id = $m['id'];
            $querySubMenu = " SELECT *
        FROM `user_sub_menu` where `menu_id` =$menu_Id
        AND `is_active` = 1";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

           <?php foreach ($subMenu as $sm) : ?>
               <?php if ($title == $sm['title']) : ?>
                   <li class="nav-item active">
                   <?php else : ?>

                   <li class="nav-item">
                   <?php endif; ?>
                   <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                       <i class="<?= ($sm['icon']); ?>"></i>
                       <span><?= ($sm['title']); ?></span></a>
                   </li>


               <?php endforeach; ?>

               <hr class="sidebar-divider">
           <?php endforeach; ?>











           <!-- Sidebar Toggler (Sidebar) -->
           <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
           </div>

   </ul>