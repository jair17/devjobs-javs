<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-200 dark:bg-indigo-800 border border-transparent rounded-md font-semibold text-xs text-white dark:text-indigo-200 uppercase tracking-widest hover:bg-white dark:hover:bg-indigo-700 focus:bg-white dark:focus:bg-indigo-700 active:bg-indigo-300 dark:active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
