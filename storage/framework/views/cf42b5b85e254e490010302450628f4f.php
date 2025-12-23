<?php if (isset($component)) { $__componentOriginal9f1bd0e1d04155988af00158efd48dd8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f1bd0e1d04155988af00158efd48dd8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-page.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('back-page.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?>  <?php echo e($title); ?>  <?php $__env->endSlot(); ?>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

        <div class="p-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="relative w-full max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-body" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input id="searchUsers" type="text" placeholder="Search"
                        class="block w-full ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs">
                </div>
            </div>

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="shrink-0 flex items-center text-body bg-neutral-secondary-medium border border-default-medium px-3 py-2 rounded-base hover:bg-neutral-tertiary-medium hover:text-heading text-sm">
                Filter
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>
        </div>

        <table class="w-full text-sm text-left text-body">
            <thead class="bg-neutral-secondary-medium border-b border-default-medium">
                <tr>
                    <th class="px-6 py-3 font-medium text-center">No</th>
                    <th class="px-6 py-3 font-medium">Nama</th>
                    <th class="px-6 py-3 font-medium">Email</th>
                    <th class="px-6 py-3 font-medium">Nomor Telepon</th>
                    <th class="px-6 py-3 font-medium">Tanggal Lahir</th>
                    <th class="px-6 py-3 font-medium">Profile Photo</th>
                    <th class="px-6 py-3 font-medium">Role</th>
                    <th class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $users ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="px-6 py-4 text-center"><?php echo e($index + 1); ?></td>
                        <td class="px-6 py-4"><?php echo e($user->name); ?></td>
                        <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                        <td class="px-6 py-4"><?php echo e($user->phone ?? '-'); ?></td>
                        <td class="px-6 py-4"><?php echo e(optional($user->date_of_birth)->format('d/m/Y') ?? '-'); ?></td>
                        <td class="px-6 py-4"><?php echo e($user->profile_photo_path ?? '-'); ?></td>
                        <td class="px-6 py-4"><?php echo e($user->role ?? 'User'); ?></td>

                        <!-- Aksi -->
                        <td class="px-6 py-4 text-center">
                            <a href="<?php echo e(route('dashboard.users.edit', $user->id)); ?>"
                                class="text-brand font-medium hover:underline mr-4">Update</a>

                            <form action="<?php echo e(route('dashboard.users.destroy', $user->id)); ?>" method="POST"
                                class="inline" onsubmit="return confirm('Yakin hapus?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center">Tidak ada data pengguna.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if($users->hasPages()): ?>
                <div class="flex flex-1 justify-between sm:justify-end gap-2">
                    <?php if($users->onFirstPage()): ?>
                    <button
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Previous
                    </button>
                    <?php else: ?>
                    <a href="<?php echo e($users->previousPageUrl()); ?>"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Previous
                    </a>
                    <?php endif; ?>
                    <div class="hidden md:flex gap-1">
                        <?php $__currentLoopData = $users->getUrlRange (1, $users->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $users->currentPage()): ?>
                            <a href="<?php echo e($url); ?>"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-lg"><?php echo e($page); ?></a>
                        <?php else: ?>
                            <a href="<?php echo e($url); ?>"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"><?php echo e($page); ?></a>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($users->hasMorePages()): ?>
                    <a href="<?php echo e($users->nextPageUrl()); ?>"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Next
                    </a>
                    <?php else: ?>
                    <button
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Next
                    </button>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f1bd0e1d04155988af00158efd48dd8)): ?>
<?php $attributes = $__attributesOriginal9f1bd0e1d04155988af00158efd48dd8; ?>
<?php unset($__attributesOriginal9f1bd0e1d04155988af00158efd48dd8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f1bd0e1d04155988af00158efd48dd8)): ?>
<?php $component = $__componentOriginal9f1bd0e1d04155988af00158efd48dd8; ?>
<?php unset($__componentOriginal9f1bd0e1d04155988af00158efd48dd8); ?>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        (function(){
            function debounce(fn, delay){
                let t;
                return function(){
                    const args = arguments;
                    clearTimeout(t);
                    t = setTimeout(function(){ fn.apply(null, args); }, delay);
                }
            }

            const input = document.getElementById('searchUsers');
            if(!input) return;
            const table = document.querySelector('table');
            if(!table) return;
            const tbody = table.querySelector('tbody');

            const fetchUrl = '<?php echo e(route('dashboard.users.search')); ?>';

            const onSearch = debounce(function(e){
                const q = (e.target.value || '').trim();
                const url = fetchUrl + '?q=' + encodeURIComponent(q);
                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(r => r.json())
                    .then(data => {
                        if(tbody && data.html !== undefined){
                            tbody.innerHTML = data.html;
                        }
                    }).catch(()=>{});
            }, 250);

            input.addEventListener('input', onSearch);
        })();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\iafat\Herd\Acarra\resources\views/dashboard/Admin/users.blade.php ENDPATH**/ ?>