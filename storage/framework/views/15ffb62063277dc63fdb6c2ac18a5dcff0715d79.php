
<div class="sidebar jsSubMainHeight pb-3">
    <div class="sidebar-info">
        <h4 class="sidebar-header"><?php echo __('label.latest_news'); ?></h4>
        <div class="info-items">
        <?php $__empty_1 = true; $__currentLoopData = $recent_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border-bottom">
                <div class="date clearfix">
                    <span class="float-right"> 
                        <i class="fas fa-calendar-alt"></i> <?php echo e(date('F, d, Y', strtotime($recent_new->created_at))); ?></span>
                </div>
                <a href="<?php echo e(url('news', $recent_new->slug)); ?>" class="media">
                    <div class="news-image">
                        <img src="<?php echo e(asset('uploads/news/medium-'.$recent_new->photo_url)); ?>" alt="News Image" class="img-fluid">
                    </div>
                    <div class="media-body news-content">
                        <div><?php echo __($recent_new->title_translation); ?></div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php echo __('label.no_information'); ?>

        <?php endif; ?>
        
        </div>
        <div class="text-center more">
            <a href="<?php echo e(url('news')); ?>" class="btn btn-custom"><?php echo __('label.view_all'); ?>

                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>


    <div class="sidebar-info">
        <h4 class="sidebar-header"><?php echo __('label.events'); ?></h4>
        <div class="info-items">

            <ul class="list-unstyled programs p-1">
            <?php $__empty_1 = true; $__currentLoopData = $left_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $left_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="border-bottom">
                    <h6><a class="link-black" href="<?php echo e(url('events', $left_event->slug)); ?>">Event title: <?php echo __($left_event->title_translation); ?></a></h6>
                    <div class="d-flex justify-content-between mt-3"> 
                        <div><i class="far fa-calendar-alt"></i> <?php echo e(date('d',strtotime($left_event->created_at))); ?><sup>th</sup> <?php echo e(date('F Y',strtotime($left_event->created_at))); ?></div> 
                        <div><i class="fas fa-map-marked-alt"></i><?php echo __($left_event->location_translation); ?></div> 
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo __('label.no_information'); ?>

            <?php endif; ?>
                
            </ul>
        </div>
        <div class="text-center more">
            <a href="<?php echo e(url('events')); ?>" class="btn btn-custom">View All
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>
    <div class="sidebar-info mb-2">
        <h4 class="sidebar-header"><?php echo __('label.latest_announcements'); ?></h4>
        <div class="info-items">

            <ul class="list-unstyled programs p-1">
            <?php $__empty_1 = true; $__currentLoopData = $recent_announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="border-bottom">
                        <div class="clearfix">
                                <span class="date float-right"><i class="far fa-calendar-alt"></i> <?php echo e(date('d',strtotime($recent_announcement->created_at))); ?><sup>th</sup> <?php echo e(date('F Y',strtotime($recent_announcement->created_at))); ?></span>
                            </div>
                            <a class="link-black" href="<?php echo e(url('announcements', $recent_announcement->slug)); ?>"><?php echo __($recent_announcement->name_translation); ?></a>
                    
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php echo __('label.no_information'); ?>

            <?php endif; ?>
                
            </ul>
        </div>
        <div class="text-center more">
            <a href="<?php echo e(url('announcements')); ?>" class="btn btn-custom">View All
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </div>

</div>