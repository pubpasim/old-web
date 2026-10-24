@props(['action', 'confirm' => 'Hapus data ?', 'formClass' => null])
{{-- Deleting must not be a GET link: it needs the CSRF token and the DELETE verb. --}}
<form method="POST" action="{{ $action }}" style="display:inline"@if($formClass) class="{{ $formClass }}"@endif @if($confirm) onsubmit="return confirm(@js($confirm))"@endif>
    @csrf
    @method('DELETE')
    <button type="submit" {{ $attributes }}>{{ $slot }}</button>
</form>