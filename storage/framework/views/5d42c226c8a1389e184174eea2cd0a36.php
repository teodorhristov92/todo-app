

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'outline',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'variant' => 'outline',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$classes = Flux::classes('shrink-0')
    ->add(match($variant) {
        'outline' => '[:where(&)]:size-6',
        'solid' => '[:where(&)]:size-6',
        'mini' => '[:where(&)]:size-5',
        'micro' => '[:where(&)]:size-4',
    });
?>

<?php switch ($variant): case ('outline'): ?>
<svg <?php echo e($attributes->class($classes)); ?> data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v7.5m2.25-6.466a9.016 9.016 0 0 0-3.461-.203c-.536.072-.974.478-1.021 1.017a4.559 4.559 0 0 0-.018.402c0 .464.336.844.775.994l2.95 1.012c.44.15.775.53.775.994 0 .136-.006.27-.018.402-.047.539-.485.945-1.021 1.017a9.077 9.077 0 0 1-3.461-.203M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
</svg>

        <?php break; ?>

    <?php case ('solid'): ?>
<svg <?php echo e($attributes->class($classes)); ?> data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M3.75 3.375c0-1.036.84-1.875 1.875-1.875H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375Zm10.5 1.875a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25ZM12 10.5a.75.75 0 0 1 .75.75v.028a9.727 9.727 0 0 1 1.687.28.75.75 0 1 1-.374 1.452 8.207 8.207 0 0 0-1.313-.226v1.68l.969.332c.67.23 1.281.85 1.281 1.704 0 .158-.007.314-.02.468-.083.931-.83 1.582-1.669 1.695a9.776 9.776 0 0 1-.561.059v.028a.75.75 0 0 1-1.5 0v-.029a9.724 9.724 0 0 1-1.687-.278.75.75 0 0 1 .374-1.453c.425.11.864.186 1.313.226v-1.68l-.968-.332C9.612 14.974 9 14.354 9 13.5c0-.158.007-.314.02-.468.083-.931.831-1.582 1.67-1.694.185-.025.372-.045.56-.06v-.028a.75.75 0 0 1 .75-.75Zm-1.11 2.324c.119-.016.239-.03.36-.04v1.166l-.482-.165c-.208-.072-.268-.211-.268-.285 0-.113.005-.225.015-.336.013-.146.14-.309.374-.34Zm1.86 4.392V16.05l.482.165c.208.072.268.211.268.285 0 .113-.005.225-.015.336-.012.146-.14.309-.374.34-.12.016-.24.03-.361.04Z" clip-rule="evenodd"/>
</svg>

        <?php break; ?>

    <?php case ('mini'): ?>
<svg <?php echo e($attributes->class($classes)); ?> data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M4.5 2A1.5 1.5 0 0 0 3 3.5v13A1.5 1.5 0 0 0 4.5 18h11a1.5 1.5 0 0 0 1.5-1.5V7.621a1.5 1.5 0 0 0-.44-1.06l-4.12-4.122A1.5 1.5 0 0 0 11.378 2H4.5Zm6.25 3.75a.75.75 0 0 0-1.5 0v.272c-.418.024-.831.069-1.238.132-.962.15-1.807.882-1.95 1.928-.04.3-.062.607-.062.918 0 1.044.83 1.759 1.708 1.898l1.542.243v2.334a11.214 11.214 0 0 1-2.297-.392.75.75 0 0 0-.405 1.444c.867.243 1.772.397 2.702.451v.272a.75.75 0 0 0 1.5 0v-.272c.419-.024.832-.069 1.239-.132.961-.15 1.807-.882 1.95-1.928.04-.3.061-.607.061-.918 0-1.044-.83-1.759-1.708-1.898L10.75 9.86V7.525c.792.052 1.56.185 2.297.392a.75.75 0 0 0 .406-1.444 12.723 12.723 0 0 0-2.703-.451V5.75ZM8.244 7.636c.33-.052.666-.09 1.006-.111v2.097l-1.308-.206C7.635 9.367 7.5 9.156 7.5 9c0-.243.017-.482.049-.716.042-.309.305-.587.695-.648Zm2.506 5.84v-2.098l1.308.206c.307.049.442.26.442.416 0 .243-.016.482-.048.716-.042.309-.306.587-.695.648-.331.052-.667.09-1.007.111Z" clip-rule="evenodd"/>
</svg>

        <?php break; ?>

    <?php case ('micro'): ?>
<svg <?php echo e($attributes->class($classes)); ?> data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M6.621 6.584c.208-.026.418-.046.629-.06v1.034l-.598-.138a.227.227 0 0 1-.116-.065.094.094 0 0 1-.028-.06 5.345 5.345 0 0 1 .002-.616.082.082 0 0 1 .025-.055.144.144 0 0 1 .086-.04ZM8.75 10.475V9.443l.594.137a.227.227 0 0 1 .116.065.094.094 0 0 1 .028.06 5.355 5.355 0 0 1-.002.616.082.082 0 0 1-.025.055.144.144 0 0 1-.086.04c-.207.026-.415.045-.625.06Z"/>
  <path fill-rule="evenodd" d="M2.5 3.5A1.5 1.5 0 0 1 4 2h4.879a1.5 1.5 0 0 1 1.06.44l3.122 3.12a1.5 1.5 0 0 1 .439 1.061V12.5A1.5 1.5 0 0 1 12 14H4a1.5 1.5 0 0 1-1.5-1.5v-9Zm6.25 1.25a.75.75 0 0 0-1.5 0v.272c-.273.016-.543.04-.81.073-.748.09-1.38.689-1.428 1.494a6.836 6.836 0 0 0-.002.789c.044.785.635 1.348 1.305 1.503l.935.216v1.379a11.27 11.27 0 0 1-1.36-.173.75.75 0 1 0-.28 1.474c.536.102 1.084.17 1.64.202v.271a.75.75 0 0 0 1.5 0v-.272c.271-.016.54-.04.807-.073.747-.09 1.378-.689 1.427-1.494a6.843 6.843 0 0 0 .002-.789c-.044-.785-.635-1.348-1.305-1.503l-.931-.215v-1.38c.46.03.913.089 1.356.173a.75.75 0 0 0 .28-1.474 12.767 12.767 0 0 0-1.636-.201V4.75Z" clip-rule="evenodd"/>
</svg>

        <?php break; ?>

<?php endswitch; ?>
<?php /**PATH C:\laragon\www\todo-app\vendor\livewire\flux\stubs\resources\views\flux\icon\document-currency-dollar.blade.php ENDPATH**/ ?>