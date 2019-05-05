<?php if(!empty($pagename) && isset($pagename)) { $pageInfo = get_page_info($pagename); }?>
<div class="row cmsHeading">
    <?php
        if(isset($pageInfo) && !empty($pageInfo))
        {
            echo "<h3>" . $pageInfo['title'] ."</h3>";
        $hasCreator     = $pageInfo['has_creator'];
        $singleName     = $pageInfo['single'];
        if($hasCreator == 1 && isset($singleName))
        {
            $newPage_title  = "new" . $singleName;

            if( Route::has($newPage_title) )
            {?>
                    <a href="{{ route($newPage_title) }}">
                        <button class="addComponent_item">
                            <i class="fas fa-plus"></i>
                        </button>
                    </a>
        <?php
            }
        };
    };?>
</div>