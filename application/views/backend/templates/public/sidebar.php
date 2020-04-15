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
            $user_menu = $this->M_menu->showMenuToSidebar();
            foreach ($user_menu as $m) :
                $menuId = $m['menu_id'];
                $querySubMenu = "SELECT *
                            FROM `user_submenu`
                            WHERE `submenu_menu_id` = $menuId
                            AND `submenu_active` = 1
                            ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                $noSpace =  preg_replace('/\s+/', '', $m['menu_uri_segment']);
                $toLower = strtolower($noSpace);
            ?>

                <!-- End Query Data -->
                <?php if ($this->db->query($querySubMenu)->num_rows() > 0) :  ?>

                    <li class="nav-item">
                        <?php if ($this->uri->segment(2) === $m['menu_uri_segment']) : ?>
                            <a class="nav-link active" data-toggle="collapse" href="#<?php echo $toLower; ?>" role="button" aria-expanded="true" aria-controls="<?php echo $toLower; ?>">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title"><?= $m['menu_name']; ?></span>
                                <i class="link-arrow" data-feather="chevron-down"> </i>
                            <?php else : ?>
                                <a class="nav-link " data-toggle="collapse" href="#<?php echo $toLower; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $toLower; ?>">
                                    <i class="link-icon" data-feather="box"></i>
                                    <span class="link-title"><?= $m['menu_name']; ?></span>
                                    <i class="link-arrow" data-feather="chevron-down"> </i>
                                <?php endif; ?>

                                </a>
                                <div class="collapse" id="<?php echo $toLower; ?>">
                                    <ul class="nav sub-menu">
                                        <?php foreach ($subMenu as $sm) : ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url($m['menu_url'] . '/' . $sm['submenu_method']) ?>" class="nav-link"><?= $sm['submenu_name']; ?></a>
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
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title"><?= $m['menu_name']; ?></span>
                        </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class=" nav-item">
                    <a href="#" class="nav-link sign--out--link">
                        <i class="link-icon" data-feather="log-out"></i>
                        <span class="link-title">Log Out</span>
                    </a>

                </li>
        </ul>
    </div>
</nav>