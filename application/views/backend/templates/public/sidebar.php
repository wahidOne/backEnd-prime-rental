<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            <!-- Query Data -->
            <?php

            $user_level_id = $user['user_level'];

            $user_menu = $this->M_menu->showMenuToSidebar();
            foreach ($user_menu as $m) :
                $menuId = $m['menu_id'];
                $querySubMenu = "SELECT *
                            FROM `user_submenu` 
                            JOIN `user_access_submenu`
                            ON `user_submenu`.`submenu_id` = `user_access_submenu`.`access_submenu_id`
                            WHERE `submenu_menu_id` = $menuId
                            AND `user_access_submenu`.`access_user_level_id` = $user_level_id
                            AND `submenu_active` = 1
                            ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                $noSpace =  preg_replace('/\s+/', '', $m['menu_uri_segment']);
                $toLower = strtolower($noSpace);
            ?>

                <!-- End Query Data -->
                <?php if ($this->db->query($querySubMenu)->num_rows() > 0) :  ?>

                    <?php if ($this->uri->segment(2) === $m['menu_uri_segment']) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="collapse" href="#<?php echo $toLower; ?>" role="button" aria-expanded="true" aria-controls="<?php echo $toLower; ?>">
                            <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#<?php echo $toLower; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $toLower; ?>">
                            <?php endif; ?>
                            <i class="link-icon <?= $m['menu_icon'] ?> "></i>
                            <span class="link-title"><?= $m['menu_name']; ?></span>
                            <i class="link-arrow" data-feather="chevron-down"> </i>
                            </a>
                            <?php if ($this->uri->segment(2) === $m['menu_uri_segment']) : ?>
                                <div class="collapse show" id="<?php echo $toLower; ?>">
                                <?php else :  ?>
                                    <div class="collapse" id="<?php echo $toLower; ?>">
                                    <?php endif; ?>
                                    <ul class="nav sub-menu ml-2">
                                        <?php foreach ($subMenu as $sm) : ?>
                                            <li class="nav-item ">
                                                <?php if ($this->uri->segment(3) ===  $sm['submenu_method']) : ?>
                                                    <a href="<?= base_url($m['menu_url'] . '/' . $sm['submenu_method']) ?>" class="nav-link active"><?= $sm['submenu_name']; ?></a>
                                                <?php else : ?>
                                                    <a href="<?= base_url($m['menu_url'] . '/' . $sm['submenu_method']) ?>" class="nav-link "><?= $sm['submenu_name']; ?></a>

                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    </div>
                        </li>
                    <?php else : ?>
                        <!-- menu active-->
                        <?php if ($this->uri->segment(2) === $m['menu_uri_segment']) : ?>
                            <li class="nav-item active ">
                            <?php else : ?>
                            <li class="nav-item ">
                            <?php endif; ?>
                            <a href="<?= base_url($m['menu_url']); ?>" class="nav-link">
                                <i class="link-icon <?= $m['menu_icon'] ?> "></i>
                                <span class="link-title"><?= $m['menu_name']; ?></span>
                            </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <li class=" nav-item">
                        <a href="#as" class="nav-link sign--out--link">
                            <i class="link-icon" data-feather="log-out"></i>
                            <span class="link-title">Log Out</span>
                        </a>

                    </li>
        </ul>
    </div>
</nav>