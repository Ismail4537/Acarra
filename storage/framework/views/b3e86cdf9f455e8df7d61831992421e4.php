<?php if (isset($component)) { $__componentOriginale38455d25d857368dcfc8129c7994fbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale38455d25d857368dcfc8129c7994fbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-page.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('front-page.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?>  <?php echo e($title); ?>  <?php $__env->endSlot(); ?>

        
        <div class="flex flex-col md:flex-row md:items-center mb-6 space-y-4 space-x-4 md:space-y-0">
            <h1 class="text-3xl font-bold text-gray-800">
                List Event
            </h1>

            <div class="w-full md:w-1/3">
                <form action="<?php echo e(route('event.index')); ?>" method="GET" class="relative">
                    <input type="text" name="search" placeholder="Cari Event, Lokasi, atau Kategori..." class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo e(request('search')); ?>">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <select name="filter" id="filter" class="absolute right-0 top-0 h-full py-2 pr-3 border-l border-gray-300 bg-gray-100 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option align="center" value="title">Title</option>
                        <option align="center" value="location">Location</option>
                        <option align="center" value="price">Price</option>
                    </select>
                </form>
            </div>

            <select name="filter" id="filter" class="right-0 top-0 h-full py-2 pr-3 border-l border-gray-300 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option align="center" value="">Kategori</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option align="center" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

    <div class="p-4 grid grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-4">  
        <?php $__currentLoopData = $listevent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('event.show', ['slug' => $event['slug']])); ?>">
        <div class="border border-gray-300 w-full max-w-xs bg-white rounded-xl shadow-lg overflow-hidden h-full flex flex-col">    

            
            <div class="relative h-32 sm:h-42"> 
                <?php if($event['image_path'] != null): ?>
                    <img src="<?php echo e($event['image_path']); ?>" alt="<?php echo e($event['title']); ?>" class="w-full h-full object-cover rounded-t-xl">
                <?php else: ?>
                    <img src="<?php echo e(asset('Image/Preview.jpg')); ?>" alt="<?php echo e($event['title']); ?>" class="w-full h-full object-cover rounded-t-xl">
                <?php endif; ?>
            </div>

            
            <div class="px-4 py-5 pt-3 grow flex flex-col">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">
                    <?php echo e($event['title']); ?>

                </h2>
                <div class="space-y-2 text-gray-600 text-sm">
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.008v.008H6V6z"></path></svg>
                        <span><?php echo e($event->category->name); ?></span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span><?php echo e($event['start_date_time']); ?> / <?php echo e($event['end_date_time']); ?></span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span><?php echo e($event['location']); ?></span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        <span>
                            <?php if($event['price'] == 0): ?>
                                FREE
                            <?php else: ?>
                                Rp,<?php echo e(number_format($event['price'], 0, ',', '.')); ?>,-
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
<?php if($listevent->hasPages()): ?>
    <div class="px-6 py-4 border-t border-gray-208">
        <nav aria-label="Page navigation">
            <ul class="flex-space-x-px text-sm">
                
                <?php if($listevent->onFirstPage()): ?>
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-s-base text-sm px-3 h-18">Previous</span>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e($listevent->previousPageUrl()); ?>" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-s-base text-sm px-3 h-18 focus:outline-none">Previous</a>
                    </li>
                <?php endif; ?>
                
                <?php $__currentLoopData = $listevent->getUrlRange (1, $listevent->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $listevent->currentPage()): ?>
                        <li>
                            <a href="<?php echo e($url); ?>" aria-current="page" class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover: text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none"><?php echo e($page); ?></a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e($url); ?>" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium text-sm w-18 h-18 focus: outline-none"> <?php echo e($page); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($listevent->hasMorePages()): ?>
                    <li>
                        <a href="<?php echo e($listevent->nextPageUrl()); ?>" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover: text-heading font-medium rounded-e-base text-sm px-3 h-18 focus:outline-none">Next</a>
                    </li>
                <?php else: ?>
                    <li>
                        <span class="flex items-center justify-center text-gray-400 bg-gray-108 box-border border border-gray-300 cursor-not-allowed font-medium rounded-e-base text-sm px-3 h-16">Next</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale38455d25d857368dcfc8129c7994fbe)): ?>
<?php $attributes = $__attributesOriginale38455d25d857368dcfc8129c7994fbe; ?>
<?php unset($__attributesOriginale38455d25d857368dcfc8129c7994fbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale38455d25d857368dcfc8129c7994fbe)): ?>
<?php $component = $__componentOriginale38455d25d857368dcfc8129c7994fbe; ?>
<?php unset($__componentOriginale38455d25d857368dcfc8129c7994fbe); ?>
<?php endif; ?><?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/front-page/event/index.blade.php ENDPATH**/ ?>