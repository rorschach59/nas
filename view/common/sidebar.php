<?php 

function mkmap($dir)
    {
        echo "<ul class=\"dirSidebar\">";
        $folder = opendir($dir);
        while ($file = readdir($folder)) {
            if ($file != "." && $file != "..") {
                $pathfile = $dir.'/'.$file;
                $pathArray = explode('/',$pathfile);
                // Supprime "" /home et /nas
                unset($pathArray[0], $pathArray[1], $pathArray[2]);
                end($pathArray);
                $last_key = key($pathArray);
                // Récupére l'ordre de chaque dossier
                $order = $last_key - 2;
                
                // si c'est un dossier
                if ($order == 1) {
                    $href = DOMAINE.'file/dir/?dir_'.$order.'='.$pathArray[3];
                } 
                // si ce sont des sous-dossiers
                else {
                    $order = $order - (count($pathArray) - 1);
                    $href = DOMAINE.'file/dir/?dir_'.$order.'='.$pathArray[3];
                    unset($pathArray[3]);
                    foreach ($pathArray as $key => $value) {
                        $order++;
                        $href .= '&dir_'.$order.'='.$value;
                    }
                }
                
                echo "<li data-file=\"$file\"><a href=$href>$file</a></li>";

                if (filetype($pathfile) == 'dir') {
                    mkmap($pathfile);
                }
            }
        }
        closedir($folder);
        echo "</ul>";
    }

?>

<div class="nav-side-menu">
    <div class="brand">
        <a href="/nas"><i class="fas fa-2x fa-sitemap"></i></a>
    </div>
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
            <?php AwsController::getFileToS3(); //mkmap('/home/nas'); ?>
        </ul>
    </div>
</div>

<script>

// window.onload = function() {
    
    
    // for(var i = 0; i < $('.dirSidebar li').length; i++)
    // {
    //     var _content = $('.dirSidebar li').eq(i).next().html()
    
    //     if(_content.length <= 0 && $('.dirSidebar li').eq(i) !== $('.dirSidebar li:first')) {
    //         var _directory = $('.dirSidebar li').eq(i);
    //         var _file = $('.dirSidebar li').eq(i).data('file');
    //         var _next = $('.dirSidebar li').eq(i).next();
    //         _directory.append('<i data-toggle=\"collapse\" data-target=\"#'+_file+'\" class=\"collapsed fas fa-sort-down\"></i>');
    //         _next.addClass('sub-menu collapse');
    //         _next.attr('id', _file);
    //     }
    // }


    $('.fa-sort-down').click(function() {
        var _this = $(this);
        _this.toggleClass('fa-sort-down');
        _this.toggleClass('fa-sort-up');
    });

// };

</script>