<?php 
// var_dump($sidebarContent);
?>

<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list text-center">
            <ul id="menu-content" class="menu-content collapse out">
                <form id="searchForm" action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control inputSearchForm" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary buttonSearchForm" type="button" id="button-addon2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <li>
                  <a href="#">Accueil</a>
                </li>
                
                <li>
                  <a href="#"><i class="fa fa-calendar fa-lg fa-fw sidebar-icon"></i> Dossier 1</a>
                </li>
                
                <li>
                  <a href="#"><i class="fa fa-bar-chart fa-lg fa-fw sidebar-icon"></i> Dossier 2</a>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-puzzle-piece fa-lg fa-fw sidebar-icon"></i> Manage</a>
                    <i data-toggle="collapse" data-target="#manage" class="collapsed fas fa-arrow-down"></i>
                </li>
                <ul class="sub-menu collapse" id="manage">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Devices</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Groups</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> SIM Cards</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Users</a></li>
                </ul>
                
                <li  data-toggle="collapse" data-target="#settings" class="collapsed">
                    <a href="#"><i class="fa fa-sliders fa-lg fa-fw sidebar-icon"></i> Settings <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="settings">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> General</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Security</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Notifications</a></li>
                </ul>
                
                <li  data-toggle="collapse" data-target="#maintenance" class="collapsed">
                    <a href="#"><i class="fa fa-cogs fa-lg fa-fw sidebar-icon"></i> Maintenance <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="maintenance">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Operation Logs</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Events and Alarms</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Backup and Restore</a></li>
                </ul>
                
                <li  data-toggle="collapse" data-target="#tools" class="collapsed">
                    <a href="#"><i class="fa fa-wrench fa-lg fa-fw sidebar-icon"></i> Tools <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="tools">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Manual SMS</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Import</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Export</a></li>
                </ul>
                
                <li  data-toggle="collapse" data-target="#help" class="collapsed">
                    <a href="#"><i class="fa fa-life-ring fa-lg fa-fw sidebar-icon"></i> Help <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="help">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Documentation</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Customer Support <small><i class="fa fa-external-link"></i></small></a></li>
                </ul>
            </ul>
     </div>
</div>

       <div class="main">
            <p><?php 
                
                foreach ($sidebarContent as $key => $value) {
                    // $get = '?';
                    //dump($value);
                    for ($i = 0; $i < count($value); $i++) {
                        if (count($value) <= 1) {
                            $get = '?directory='.$value[$i];
                ?>
                <li>
                    <a href="<?php echo $get; ?>">
                        <i class="fa fa-life-ring fa-lg fa-fw sidebar-icon"></i> <?php echo $value[$i]; ?>
                    </a>
                </li>
                <?php
                        } else {
                            $get = '?directory='.$value[$i];
                            $get .= '&directory_'.$i.'='.$value[$i];
                            // $get .= '?directory='.$value[$i].'&directory_'.$i.'='.$value[$i];
                            ?>

                    <!-- une fois -->
                    <li>
                        <a href="<?php echo $get; ?>">
                            <i class="fa fa-life-ring fa-lg fa-fw sidebar-icon"></i>
                            <?php echo $value[0]; ?>
                            <span class="arrow"></span>
                        </a>
                        <i data-toggle="collapse" data-target="#<?php echo $value[$i-1]; ?>" class="collapsed fas fa-arrow-down"></i>
                    </li>
                    
                    <!-- autant de sous-dossier -->
                    <ul class="sub-menu collapse" id="<?php echo $value[$i-1]; ?>">
                        <li>
                        <a href="<?php echo $get; ?>"><i class="fa fa-angle-double-right"></i> <?php echo $value[$i]; ?></a>
                        </li>
                    </ul>
                    <?php //break; ?>
                            <?php
                        }
                    }
                ?>                        
                        
                        
                        

                        <?php
                        }
                    
                            // $get .= '&directory_'.$i.'='.$value[$i];
                        
                            //echo '<li><a href="'.$get.'"><i class="fa fa-angle-double-right"></i> Documentation</a></li>';
                        //}         
                    // }
                    // $get = '';
                // }
            
            ?></p>
        </div>

