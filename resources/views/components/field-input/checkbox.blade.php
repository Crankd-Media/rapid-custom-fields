<div class="mt-4 flex items-center justify-between gap-8">
	<p @click="field.value = field.value ? false : true"
		class="text-sm text-gray-700"
		x-text="field.title">CheckBox</p>
	<button @click="field.value = field.value ? false : true"
		x-bind:class="field.value == true ? 'bg-indigo-600' : 'bg-gray-200'"
		class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
		role="switch"
		type="button"
		tabindex="0"
		aria-checked="false"
		data-headlessui-state="">
		<span class="sr-only">Use setting</span>
		<span aria-hidden="true"
			x-bind:class="field.value == true ? 'translate-x-5' : 'translate-x-0'"
			class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
	</button>
</div>
