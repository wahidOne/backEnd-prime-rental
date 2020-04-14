<!-- Side Header Start -->
<div class="side-header show px-2">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
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
                ?>
                    <?php if ($this->db->query($querySubMenu)->num_rows() > 0) :  ?>
                        <li class="<?php if ($this->uri->segment(2) === $m['menu_uri_segment']) {
                                        echo 'active';
                                    } ?> ">
                            <a class="" href="#">
                                <i class="<?= $m['menu_icon']  ?>"></i>
                                <span> <?= $m['menu_name']; ?></span>
                            </a>
                            <?php if ($this->uri->segment(2) === $m['menu_uri_segment']) : ?>
                                <ul class="side-header-sub-menu">
                                <?php else : ?>
                                    <ul class="side-header-sub-menu">
                                    <?php endif; ?>
                                    <!-- submenu -->
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <li class=" active"><a href="<?= base_url($m['menu_url'] . '/' . $sm['submenu_method']) ?>"><span><?= $sm['submenu_name']; ?></span></a></li>
                                    <?php endforeach; ?>
                                    </ul>
                        </li>
                    <?php else : ?>
                        <li class="<?php if ($this->uri->segment(2) === $m['menu_uri_segment']) {
                                        echo 'active';
                                    } ?> ">
                            <a href="<?= base_url($m['menu_url']) ?>"><i class="<?= $m['menu_icon']  ?>"></i> <span>
                                    <?= $m['menu_name']; ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- <li class="has-sub-menu"><a href="#"><i class="ti-layers"></i> <span>Pages</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="blank.html"><span>Blank</span></a></li>
                        <li><a href="timeline.html"><span>Timeline</span></a></li>
                        <li><a href="pricing.html"><span>Pricing</span></a></li>
                        <li><a href="error-1.html"><span>error-1</span></a></li>
                        <li><a href="error-2.html"><span>error-2</span></a></li>
                    </ul>
                </li> -->

            </ul>
        </nav>

    </div><!-- Side Header Inner End -->
</div><!-- Side Header End -->