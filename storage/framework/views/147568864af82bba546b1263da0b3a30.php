

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
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 11.625h4.5m-4.5 2.25h4.5m2.121 1.527c-1.171 1.464-3.07 1.464-4.242 0-1.172-1.465-1.172-3.84 0-5.304 1.171-1.464 3.07-1.464 4.242 0M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
</svg>

        <?php break; ?>

    <?php case ('solid'): ?>
<svg <?php echo e($attributes->class($classes)); ?> data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M3.75 3.375c0-1.036.84-1.875 1.875-1.875H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375Zm7.464 9.442c.459-.573 1.019-.817 1.536-.817.517 0 1.077.244 1.536.817a.75.75 0 1 0 1.171-.937c-.713-.892-1.689-1.38-2.707-1.38-1.018 0-1.994.488-2.707 1.38a4.61 4.61 0 0 0-.705 1.245H8.25a.75.75 0 0 0 0 1.5h.763c-.017.25-.017.5 0 .75H8.25a.75.75 0 0 0 0 1.5h1.088c.17.449.406.87.705 1.245.713.892 1.689 1.38 2.707 1.38 1.018 0 1.994-.488 2.707-1.38a.75.75 0 0 0-1.171-.937c-.459.573-1.019.817-1.536.817-.517 0-1.077-.244-1.536-.817-.078-.098-.15-.2-.215-.308h1.751a.75.75 0 0 0 0-1.5h-2.232a3.965 3.965 0 0 1 0-.75h2.232a.75.75 0 0 0 0-1.5H11c.065-.107.136-.21.214-.308Z" clip-rule="evenodd"/>
  <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z"/>
</svg>

        <?php break; ?>

    <?php case ('mini'): ?>
<svg <?php echo e($attributes->class($classes)); ?> data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M4.5 2A1.5 1.5 0 0 0 3 3.5v13A1.5 1.5 0 0 0 4.5 18h11a1.5 1.5 0 0 0 1.5-1.5V7.621a1.5 1.5 0 0 0-.44-1.06l-4.12-4.122A1.5 1.5 0 0 0 11.378 2H4.5Zm4.298 6.45c.512-.67 1.135-.95 1.702-.95s1.19.28 1.702.95a.75.75 0 0 0 1.192-.91C12.637 6.55 11.596 6 10.5 6s-2.137.55-2.894 1.54A5.205 5.205 0 0 0 6.83 9H5.75a.75.75 0 0 0 0 1.5h.77a6.333 6.333 0 0 0 0 1h-.77a.75.75 0 0 0 0 1.5h1.08c.183.528.442 1.023.776 1.46.757.99 1.798 1.54 2.894 1.54s2.137-.55 2.894-1.54a.75.75 0 0 0-1.192-.91c-.512.67-1.135.95-1.702.95s-1.19-.28-1.702-.95a3.505 3.505 0 0 1-.343-.55h1.795a.75.75 0 0 0 0-1.5H8.026a4.835 4.835 0 0 1 0-1h2.224a.75.75 0 0 0 0-1.5H8.455c.098-.195.212-.38.343-.55Z" clip-rule="evenodd"/>
</svg>

        <?php break; ?>

    <?php case ('micro'): ?>
<svg <?php echo e($attributes->class($classes)); ?> data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M2.5 3.5A1.5 1.5 0 0 1 4 2h4.879a1.5 1.5 0 0 1 1.06.44l3.122 3.12a1.5 1.5 0 0 1 .439 1.061V12.5A1.5 1.5 0 0 1 12 14H4a1.5 1.5 0 0 1-1.5-1.5v-9Zm4.552 2.734c.354-.59.72-.734.948-.734.228 0 .594.145.948.734a.75.75 0 1 0 1.286-.772C9.71 4.588 8.924 4 8 4c-.924 0-1.71.588-2.234 1.462-.192.32-.346.67-.464 1.038H4.75a.75.75 0 0 0 0 1.5h.268a7.003 7.003 0 0 0 0 1H4.75a.75.75 0 0 0 0 1.5h.552c.118.367.272.717.464 1.037C6.29 12.412 7.076 13 8 13c.924 0 1.71-.588 2.234-1.463a.75.75 0 0 0-1.286-.771c-.354.59-.72.734-.948.734-.228 0-.594-.145-.948-.734a3.078 3.078 0 0 1-.142-.266h.34a.75.75 0 0 0 0-1.5h-.727a5.496 5.496 0 0 1 0-1h.727a.75.75 0 0 0 0-1.5h-.34a3.08 3.08 0 0 1 .142-.266Z" clip-rule="evenodd"/>
</svg>

        <?php break; ?>

<?php endswitch; ?>
<?php /**PATH C:\laragon\www\todo-app\vendor\livewire\flux\stubs\resources\views\flux\icon\document-currency-euro.blade.php ENDPATH**/ ?>