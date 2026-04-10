<style>
.toast-container {
    position: fixed;
    top: 100px;
    right: 20px;
    z-index: 100000002;
    display: flex;
    flex-direction: column;
    gap: 10px;
    pointer-events: none;
}

.toast {
    pointer-events: all;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 20px;
    border-radius: 12px;
    min-width: 320px;
    max-width: 420px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    font-family: 'VisbyBold', sans-serif;
    font-size: 14px;
    animation: toast-in 0.4s ease-out forwards;
    position: relative;
}

.toast.toast-out {
    animation: toast-out 0.3s ease-in forwards;
}

.toast-success {
    background: #22c55e;
    color: #fff;
}

.toast-error {
    background: #ef4444;
    color: #fff;
}

.toast-warning {
    background: #f39200;
    color: #fff;
}

.toast-info {
    background: #3b82f6;
    color: #fff;
}

.toast-icon {
    width: 24px;
    height: 24px;
    flex-shrink: 0;
}

.toast-message {
    flex: 1;
}

.toast-close {
    background: none;
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0.7;
    transition: opacity 0.2s;
}

.toast-close:hover {
    opacity: 1;
}

@keyframes toast-in {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes toast-out {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(100px);
    }
}

@media (max-width: 768px) {
    .toast-container {
        right: 10px;
        left: 10px;
    }
    .toast {
        min-width: auto;
        max-width: none;
    }
}
</style>

<div class="toast-container" id="toast-container">
@session('success')
<div class="toast toast-success" data-auto-close="5000">
    <svg class="toast-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
        <polyline points="22 4 12 14.01 9 11.01"/>
    </svg>
    <span class="toast-message">{{ $value }}</span>
    <button class="toast-close" onclick="closeToast(this)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>
</div>
@endsession

@session('error')
<div class="toast toast-error" data-auto-close="5000">
    <svg class="toast-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/>
        <line x1="15" y1="9" x2="9" y2="15"/>
        <line x1="9" y1="9" x2="15" y2="15"/>
    </svg>
    <span class="toast-message">{{ $value }}</span>
    <button class="toast-close" onclick="closeToast(this)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>
</div>
@endsession

@session('warning')
<div class="toast toast-warning" data-auto-close="5000">
    <svg class="toast-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
        <line x1="12" y1="9" x2="12" y2="13"/>
        <line x1="12" y1="17" x2="12.01" y2="17"/>
    </svg>
    <span class="toast-message">{{ $value }}</span>
    <button class="toast-close" onclick="closeToast(this)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>
</div>
@endsession

@session('info')
<div class="toast toast-info" data-auto-close="5000">
    <svg class="toast-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/>
        <line x1="12" y1="16" x2="12" y2="12"/>
        <line x1="12" y1="8" x2="12.01" y2="8"/>
    </svg>
    <span class="toast-message">{{ $value }}</span>
    <button class="toast-close" onclick="closeToast(this)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>
</div>
@endsession

@if ($errors->any())
<div class="toast toast-error" data-auto-close="7000">
    <svg class="toast-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/>
        <line x1="15" y1="9" x2="9" y2="15"/>
        <line x1="9" y1="9" x2="15" y2="15"/>
    </svg>
    <span class="toast-message">
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </span>
    <button class="toast-close" onclick="closeToast(this)">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>
</div>
@endif
</div>

<script>
function closeToast(btn) {
    const toast = btn.closest('.toast');
    toast.classList.add('toast-out');
    setTimeout(() => toast.remove(), 300);
}

// Автоматическое закрытие через заданное время
document.querySelectorAll('.toast[data-auto-close]').forEach(toast => {
    const delay = parseInt(toast.dataset.autoClose);
    setTimeout(() => {
        toast.classList.add('toast-out');
        setTimeout(() => toast.remove(), 300);
    }, delay);
});
</script>
