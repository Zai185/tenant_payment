<div x-show="dialogOpen" class="w-screen fixed top-0 left-0 flex items-center justify-center h-screen z-[9999] bg-black/30">
    <div
        role="alertdialog"
        aria-describedby="alert-dialog-description"
        aria-labelledby="alert-dialog-title"
        class="flex w-full max-w-lg flex-col gap-2 rounded-xl border bg-surface p-6 shadow-lg">
        {{$slot}}
    </div>
</div>