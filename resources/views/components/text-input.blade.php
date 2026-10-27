<div class="relative w-full">

  @if ($formRef)
    <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-2"
      @click="$refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="h-4 w-4 text-slate-500">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  @endif

  <input x-ref="input-{{ $name }}" type="{{ $type }}"
    placeholder="{{ $placeholder }}"
    name="{{ $name }}" value="{{ $value }}" id="{{ $name }}"
    class="w-full min-w-0 rounded-lg bg-gray-100 px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:bg-white focus:ring-2 focus:ring-blue-400" />

  @error($name)
    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
  @enderror

</div>