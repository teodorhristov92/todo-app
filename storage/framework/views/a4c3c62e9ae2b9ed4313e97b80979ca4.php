<?php
$classes = Flux::classes()
    ->add('[:where(&)]:min-w-48 p-[.3125rem]')
    ->add('rounded-lg shadow-xs')
    ->add('border border-zinc-200 dark:border-zinc-600')
    ->add('bg-white dark:bg-zinc-700')
    ;
?>

<nav <?php echo e($attributes->class($classes)); ?> popover="manual" data-flux-navmenu>
    <?php echo e($slot); ?>

</nav>
<?php /**PATH C:\laragon\www\todo-app\vendor\livewire\flux\stubs\resources\views\flux\navmenu\index.blade.php ENDPATH**/ ?>