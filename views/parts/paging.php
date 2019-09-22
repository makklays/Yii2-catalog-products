
<!-- pages -->
<?php if(isset($all_pages) && $all_pages > 1): ?>

    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="pagination">

                <!-- previous page -->
                <?php if (isset($page) && ($page-1) > 0): ?>
                    <li class="prev"><a href="/<?=$page_link?>/<?=($page-1)?>" data-page="<?=($page-1)?>">«</a></li>
                <?php else: ?>
                    <li class="prev disabled"><span>«</span></li>
                <?php endif; ?>

                <?php if (isset($page) && ($page - 3) > 0): ?>
                    <li><a href="/<?=$page_link?>/<?=($page-3)?>" data-page="<?=($page-3)?>"><?=($page-3)?></a></li>
                <?php endif; ?>

                <?php if (isset($page) && ($page - 2) > 0): ?>
                    <li><a href="/<?=$page_link?>/<?=($page-2)?>" data-page="<?=($page-2)?>"><?=($page-2)?></a></li>
                <?php endif; ?>

                <?php if (isset($page) && ($page - 1) > 0): ?>
                    <li><a href="/<?=$page_link?>/<?=($page-1)?>" data-page="<?=($page-1)?>"><?=($page-1)?></a></li>
                <?php endif; ?>

                <!-- active page-->
                <?php if (isset($page) && !empty($page) ): ?>
                    <li class="active"><a href="/<?=$page_link?>/<?=$page?>" data-page="<?=$page?>"><?=$page?></a></li>
                <?php endif; ?>

                <?php if (isset($page) && ($page+1) > 0 && ($page+1) <= $all_pages): ?>
                    <li><a href="/<?=$page_link?>/<?=($page+1)?>" data-page="<?=($page+1)?>"><?=($page+1)?></a></li>
                <?php endif; ?>

                <?php if (isset($page) && ($page+2) > 0 && ($page+2) <= $all_pages): ?>
                    <li><a href="/<?=$page_link?>/<?=($page+2)?>" data-page="<?=($page+2)?>"><?=($page+2)?></a></li>
                <?php endif; ?>

                <?php if (isset($page) && ($page+3) > 0 && ($page+3) <= $all_pages): ?>
                    <li><a href="/<?=$page_link?>/<?=($page+3)?>" data-page="<?=($page+3)?>"><?=($page+3)?></a></li>
                <?php endif; ?>

                <!-- next page -->
                <?php if (isset($page) && ($page+1) > 0 && ($page+1) <= $all_pages): ?>
                    <li class="next"><a href="/<?=$page_link?>/<?=($page+1)?>" data-page="<?=($page+1)?>">»</a></li>
                <?php else: ?>
                    <li class="next disabled"><span>»</span></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

<?php endif; ?>