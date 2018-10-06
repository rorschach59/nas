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
            <?php
            foreach ($sidebarContent as $key => $value) {
                $get = '?directory='.$value[0]; ?>
            <li>
                <a href="<?php echo $get; ?>">
                <i class="fa fa-life-ring fa-lg fa-fw sidebar-icon"></i> <?php echo $value[0]; ?>
                </a>
            <?php if (count($value) > 1) { ?>
                <i data-toggle="collapse" data-target="#<?php echo $value[0]; ?>" class="collapsed fas fa-arrow-down"></i>
            <?php } ?>
            </li>
            <ul class="sub-menu collapse" id="<?php echo $value[0]; ?>">
                <?php for ($i = 1; $i < count($value); $i++) { 
                    $get .= '&directory_'.$i.'='.$value[$i]; 
                ?>
                <li>
                    <a href="<?php echo $get; ?>"><i class="fa fa-angle-double-right"></i> <?php echo $value[$i]; ?></a>
                </li>
            <?php } echo '</ul>'; } ?>
        </ul>
    </div>
</div>