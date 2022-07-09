<?php $__env->startSection('title'); ?>
    <?php echo __('label.home'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="content-layout">
        <div class="container clearfix">
            <!-- CONTENT BLOCK HERE -->

            <div class="home-page">
                <article class="slider">
                    <div class="row">


                        <div class="col-md-12">
                            <div id="home-carousel" class="carousel slide carousel-fade bs-0" data-ride="carousel"
                                 data-interval="7000">
                                <div class="carousel-inner">
                                    <?php if(count($slideshow)): ?>
                                        <?php $num = 1; ?>
                                        <?php $__currentLoopData = $slideshow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="carousel-item <?php if ($num == 1) {
                                                echo 'active';
                                            } ?>">
                                                <img class="d-block w-100" alt="First slide [1125x400]"
                                                     src="<?php echo e(asset($photo->path.'large_' . $photo->filename)); ?>">
                                                <a class="carousel-caption d-none d-md-block" href="#">
                                                    <?php echo e(__($photo->content, [], $currentLanguage->locale)); ?></a>
                                            </div>
                                            <?php $num++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </div>
                                <a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only"><?php echo __('label.prev', [], $currentLanguage->locale); ?></span>
                                </a>
                                <a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only"><?php echo __('label.next', [], $currentLanguage->locale); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="">
                    <div class="highlights bs-0 bg-light d-flex align-items-center">
                        <h5 class="skew py-1 px-3 m-0 mr-5">Highlights</h5>
                        <div class="py-1">
                            <!-- Note: limit number of words -->

                            <?php if($highlights): ?>
                                <marquee behavior="scroll" direction="left" onmouseover="this.stop();"
                                         onmouseout="this.start();">
                                    <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="mr-5" href="<?php echo e(url('highlights', $highlight->id)); ?>">
                                            <span class="text-black">
                                                <?php echo $highlight->title; ?>:
                                            </span>
                                            <?php echo e($highlight->content); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    <?php endif; ?>

                                </marquee>
                        </div>
                    </div>
                </article>
                <article class="mt-4">
                    <div class="row mb-0">
                        <div class="col-md-4">
                            <div class="d-flex flex-column bg-light bs-0 jsHeight">
                                <h4 class="title-text py-3 bs-1 text-center">Welcome to <?php echo e(__('label.site_subtitle')); ?></h4>
                                <div class="announcements pl-3 pr-2 mt-3">
                                    <div class="media border-bottom">
                                        <div class="media-body">
                                                
                                            <div class="mt-2"></div>
                                                
                                                   
                                            <div class="profile-body clearfix">
                                                <div class="card-profile float-md-left mr-3 mb-1 text-center">
                                                    <img class="card-img-top img-thumbnail" src="<?php echo e(asset($biography->photo_url)); ?>" alt="Card image cap">
                                                    <div class="card-body p-1">
                                                        <span class="" ><h6 class="card-title mb-1"><?php echo e(__($biography->title_translation)); ?></h6></span> 
                                                        <h6 class="card-title mb-1"><?php echo e(__($biography->salutation_translation)); ?> <?php echo e($biography->name); ?></h6>
                                                        <!-- <a class="" href="biography.html">Biography </a> -->
                                                    </div>
                                                </div>
                                                <div class="d-md-inline text-justify">
                                                    <p> 
                                                        <?php echo str_limit(strip_tags(__($biography->content_translation)),210); ?>

                                                    </p>
                                                    
                                                </div>
                                            </div>
                                                
                                        </div>

									</div>
                                    
								</div>
                                <div class="text-center mt-auto mb-2">
                                    <a class="btn btn-custom btn-sm" href="<?php echo e(url('biography',$biography->slug)); ?>"><?php echo e(__('label.readmore')); ?></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="d-flex flex-column bg-light bs-0 jsHeight">

                                <h4 class="title-text py-3 bs-1 text-center"><i class="far fa-newspaper"></i> <strong><?php echo e(__('label.news')); ?></strong></h4>
                                <div class="pl-3 pr-2 mt-3">
                                    <div class="news mb-3">
                                        <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $newss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="media border-bottom">
                                                <img class="mr-2 img-fluid" alt="[150x90]"
                                                     src="<?php echo e(asset("uploads/news/thumb-".$newss->photo_url)); ?>">
                                                <div class="media-body">
                                                    <div class="d-flex">
                                                        <div class="news-date">
                                                            <div class="date-dec"><?php echo e(date('d', strtotime($newss->created_at))); ?></div>
                                                            <div class="month-dec"><?php echo e(date('M', strtotime($newss->created_at))); ?></div>
                                                        </div>
                                                        <div>
                                                            <h6> <?php echo e(__($newss->title_translation)); ?></h6>
                                                            <p> <?php echo str_limit( __($newss->summary_translation), 100); ?>

                                                                <a class="text-nowrap read-more" 
                                                                   href="<?php echo e(url('news/'.$newss->slug)); ?>"><?php echo e(__('label.readmore')); ?></a>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php echo e(__('label.no_information')); ?>

                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="text-center mt-auto mb-2">
                                    <a class="btn btn-custom btn-sm"
                                       href="<?php echo e(url('news')); ?>"><?php echo e(__('label.view_more')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="my-4">
                    <div class="row mb-0">
                        <div class="col-md-4">
                            <div class="d-flex flex-column bg-light bs-0 jsHeight">
                                <h4 class="title-text py-3 bs-1 text-center"><i class="fas fa-bullhorn"></i> <strong>
                                <?php echo e(__('label.announcements')); ?></strong></h4>
                                <div class="howdoi pl-3 pr-2 mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-unstyled">
                                                <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <li class="mb-4 border-bottom">
                                                        <div class="pb-2 border-bottom">
                                                            <h6 class="mb-1">Title: <?php echo e(__($announcement->name_translation)); ?></h6>
                                                                <p class="mb-2"><?php echo strip_tags(str_limit( __($announcement->content_translation), 50)); ?>

                                                                <a href="<?php echo e(url('announcements',$announcement->slug)); ?>"><?php echo e(__('label.readmore')); ?> <i
                                                        class="fa fa-arrow-circle-right"></i></a></p> 
                                                            <p class="date mb-1"><?php echo e(__('label.posted')); ?>: <i class="fas fa-calendar-alt"></i>
                                                            <?php echo e(date('F d, Y', strtotime($announcement->created_at))); ?> </p>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php echo e(__('label.no_information')); ?>

                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-auto mb-2">
                                    <a class="btn btn-custom btn-sm" href="<?php echo e(url('announcements')); ?>"><?php echo e(__('label.view_more')); ?></a>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-8">
							<div class="d-flex flex-column bg-light bs-0 jsHeight">
								<h4 class="title-text py-3 bs-1 text-center"> <i class="fas fa-clipboard-list"></i><strong>
										Programmes
									</strong></h4>
                                    <?php $for_new_row = 1; //not used so far
                                        $level_id = 55;
                                        $classrow = 0;
                                        $new_col = true;
										$row_level_name = "";
										$col_closer = 1;
										$row_open = 0;
                                        $classrownew = 99;
                                        $classrowold = 98;?>
                                    <?php $__empty_1 = true; $__currentLoopData = $programmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $programme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

										

                                        <?php if($level_id != $programme->level_id): ?>
										
                                            <?php if(($classrow)%2 == 0): ?>
                                            
                                                <?php if($classrow != $classrowold): ?>

                                                    <?php if($index != 0): ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php
                                                        $classrowold = $classrow;
                                                    ?>

                                                    <div class="row">
                                                <?php endif; ?>

                                            <?php endif; ?>

                                            <?php
                                                $level_id = $programme->level_id;
                                                    $classrow++;
                                            ?>
                                        <?php endif; ?>

                                        <?php $programme_name = App\Models\Programmes::level_name($programme->level_id); ?> 
                                        <?php if($row_level_name != $programme_name): ?>
											
											<?php if($index != 0): ?>
												    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="col-md-6">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item text-center tit "> <?php echo e($programme_name); ?> </a>
                                                    <?php $row_level_name = $programme_name; ?>
                                        <?php endif; ?>
                                                <a href="<?php echo e(url('programmes',$programme->slugy)); ?>" class="list-group-item"><i class="fas fa-chevron-circle-right"></i>
                                                <?php echo e(__($programme->name_translation)); ?></a>
                                        
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php echo e(__('label.no_information')); ?>

										<?php endif; ?>
										
                                       
                                        
										
								
									<!-- 2 divs are special -->
												</div>
												</div>
							</div>
						</div>
                    </div>
                </article>

                <footer class="mdl-mega-footer">

                    <div class="container">
                        <div class="footer-middle">
                            <div class="row">
                                <h4 class="text-center footer-heading"><i class="fas fa-university"></i> ACADEMIC CAMPUS </h4>

                                <div class="mt-2"></div>
								<?php $__empty_1 = true; $__currentLoopData = $campuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-4">
                                    <h4 class="footer-heading"><?php echo e(__($campus->name_translation)); ?></h4>
                                    <p><?php echo e(__($campus->summary_translation)); ?></p>
                                    <div class="text-center mt-auto mb-2">
                                        <a class="btn btn-custom btn-sm" href="<?php echo e(url('campuses', $campus->slugy)); ?>"><?php echo e(__('label.view_more')); ?></a>
                                    </div>
                                </div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<?php echo e(__('label.no_information')); ?>

								<?php endif; ?>
                                

                            </div>

                        </div>
                    </div>
                </footer>
                <footer class="mdl-mega-footer">

                    <div class="container">
                        <div class="footer-middle">
                            <div class="row ">
                                <h4 class="text-center footer-heading"><i class="fas fa-graduation-cap"></i> <strong> Alumni
                                    </strong> </h4>


                                <div class="mt-2"></div>


								<?php $__empty_1 = true; $__currentLoopData = $alumnis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-3 border ">
                                    <div class="mx-2 mt-3 d-flex pl-2">

                                        <!-- <img class="mr-2 img-fluid" alt="[150x150]" src="images/profile.jpg"> -->
                                        <img src="<?php echo e(asset('/uploads/alumni/thumb-'.$alumni->photo_url)); ?>" class="img-alumn" alt="">
                                    </div>
                                    
                                    <div class="p-2">
                                        <span class="badge badge-info text-center"><?php echo e($alumni->fullname); ?></span>
                                        <p> <?php echo str_limit(strip_tags(__($alumni->alumni)),60); ?> <a class="text-nowrap btn btn-warning btn-sm read-more"
                                                href="<?php echo e(url('alumni',$alumni->slugy)); ?>"> <?php echo e(__('label.readmore')); ?> </a></p>
                                    </div>
                                </div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<?php echo e(__('label.no_information')); ?>

								<?php endif; ?>


                            </div>
                            <div class="text-center mt-auto mb-2">
                                <a class="btn btn-custom btn-sm" href="<?php echo e(url('alumni')); ?>">View More</a>
                            </div>

                        </div>
                    </div>
                </footer>

            </div>


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>